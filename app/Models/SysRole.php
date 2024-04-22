<?php

namespace App\Models;

use Thrown;
use App\Models\SysApplication;
use App\Models\SysPermissions;
use App\Models\SysRolePermissions;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SysRole extends Model
{
    use HasFactory;
    protected $table = 'sys_roles';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'isactive'];

    public function permissions()
    {
        return $this->hasMany(SysRolePermissions::class, 'role_id', 'id');
    }

    public static function batch_permissions($request)
    {
        DB::beginTransaction();
        try {
            $role = new SysRole();
            $role->name         = ucwords($request->name);
            $role->isactive     = true;
            if (!$role->save()) {
                DB::rollback();
                return false;
            }
            $permissions            = SysPermissions::all();
            $applicationParents    = SysApplication::whereIn('type', [0, 3])
                ->where('parent_id', 0)
                ->get();
            $applicationChilds     = SysApplication::where([
                ['parent_id', '<>', 0]
            ])->get();
            foreach ($applicationParents as $applicationParent) {
                $rolePermission = new SysRolePermissions();
                $rolePermission->role_id        = $role->id;
                $rolePermission->application_id = $applicationParent->id;
                $rolePermission->permission_id  = 1;
                if (!$rolePermission->save()) {
                    DB::rollback();
                    return false;
                }
            }
            foreach ($permissions as $permission) {
                foreach ($applicationChilds as $applicationChild) {
                    $rolePermission = new SysRolePermissions();
                    $rolePermission->role_id        = $role->id;
                    $rolePermission->application_id = $applicationChild->id;
                    $rolePermission->permission_id  = $permission->id;
                    if (!$rolePermission->save()) {
                        DB::rollback();
                        return false;
                    }
                }
            }
            DB::commit();
            return true;
        } catch (Thrown $e) {
            DB::rollback();
            return false;
        }
    }
}
