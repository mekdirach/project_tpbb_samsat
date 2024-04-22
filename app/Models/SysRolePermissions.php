<?php

namespace App\Models;

use App\Models\SysRole;
use App\Models\SysApplication;
use App\Models\SysPermissions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SysRolePermissions extends Model
{
    protected $table = 'sys_role_permissions';
    use HasFactory;

public function application(){
        return $this->belongsTo(SysApplication::class, 'application_id', 'id');
    }

    public function permission(){
        return $this->belongsTo(SysPermissions::class, 'permission_id', 'id');
    }

    public function role(){
        return $this->belongsTo(SysRole::class, 'role_id', 'id');
    }
}
