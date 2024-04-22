<?php

namespace App\Http\Controllers\Setting;

use App\Models\SysRole;
use Illuminate\Http\Request;
use App\Models\SysApplication;
use App\Models\SysPermissions;
use App\Models\SysRolePermissions;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RoleManagementController extends Controller
{

    public function index()
    {
        $data = SysRole::all();
        return view('management-app.role-management.index', compact('data'));
    }

    public function list(Request $request)
    {
        // $result     = SysRole::orderBy('id', 'ASC')->get();
        $query      = DB::table('sys_roles AS a')
            ->select('a.id', 'a.isactive', 'a.name')
            ->skip($request->start)
            ->take($request->length)
            ->orderBy('id', 'asc');

        $result     = $query->get();
        $resCount   = SysRole::all()->count();
        $no         = $request->start;

        foreach ($result as $row) {
            $row->id        = $row->id;
            $row->rownum    = ++$no;
        }
        $response = [
            "draw"              => $request->draw,
            "recordsTotal"      => $resCount,
            "recordsFiltered"   => $resCount,
            "data"              => $result
        ];

        return response()->json($response);
    }

    public function create(Request $request)
    {
        $record = SysRole::batch_permissions($request);
        if ($record) {
            $alert      = "success";
            $message    = "Berhasil menambahkan role!";
            $rc         = "0000";
        } else {
            $alert      = "danger";
            $message    = "Gagal menambahkan role!";
            $rc         = "0066";
        }
        $result = [
            "rc"        => $rc,
            "message"   => $message
        ];

        return response()->json($result);
    }

    public function show(Request $request)
    {
        $record = SysRole::where('id', $request->id)->first();
        return response()->json($record);
    }

    public function edit(Request $request)
    {
        $record             = SysRole::find($request->role_id);

        $record->name       = $request->name;
        $record->isactive   = $request->isactive;

        if ($record->update()) {
            $alert      = "success";
            $message    = "Berhasil mengubah data role!";
            $rc         = "0000";
        } else {
            $alert      = "danger";
            $message    = "Gagal mengubah data role!";
            $rc         = "0066";
        }
        $result = [
            "rc"        => $rc,
            "message"   => $message
        ];
        return response()->json($result);
    }

    public function showPermission($roleId)
    {
        $role   = SysRole::where('id', $roleId)->first();
        return view('management-app.role-management.index', compact('role'));
    }

    public function roleAccessPermission(Request $request)
    {
        if ($request->role_id) {
            $records        = SysRolePermissions::where('role_id', $request->role_id)
                ->orderBy('application_id', 'ASC')
                ->orderBy('permission_id', 'ASC')
                ->get();
            $permissions    = SysPermissions::all();
            $menus          = SysApplication::getAccessMenu($request->role_id, 2);
        } else {
            $records        = [];
            $permissions    = [];
            $menus          = [];
        }
        $response = [
            "permissions"   => $permissions,
            "menus"         => $menus,
            "data"          => $records
        ];

        return response()->json($response);
    }

    public function roleUpdatePermission(Request $request)
    {
        $record = SysRolePermissions::where('id', $request->role_permission_id)->first();
        if ($record) {
            if ($request->parent_id) {
                $parents = SysApplication::where('parent_id', $request->parent_id)->get();
                foreach ($parents as $parent) {
                    if ($parent->type > 0) {
                        $permissions = SysPermissions::all();
                        foreach ($permissions as $permission) {
                            $rolePermission = SysRolePermissions::where([
                                ['application_id', $parent->id],
                                ['role_id', $request->role_id],
                                ['permission_id', $permission->id],
                            ])->first();
                            if ($rolePermission) {
                                $rolePermission->isactive = $request->checked;
                                $rolePermission->save();
                            }
                        }
                    } else {
                        $childs = SysApplication::where('parent_id', $parent->id)->get();
                        if (count($childs) > 0) {
                            $permissions = SysPermissions::all();
                            foreach ($childs as $child) {
                                foreach ($permissions as $permission) {
                                    $rolePermission = SysRolePermissions::where([
                                        ['application_id', $child->id],
                                        ['role_id', $request->role_id],
                                        ['permission_id', $permission->id],
                                    ])->first();
                                    if ($rolePermission) {
                                        $rolePermission->isactive = $request->checked;
                                        $rolePermission->save();
                                    }
                                }
                            }
                        } else {
                            $rolePermission = SysRolePermissions::where([
                                ['application_id', $parent->id],
                                ['role_id', $request->role_id],
                                ['permission_id', 1],
                            ])->first();
                            if ($rolePermission) {
                                $rolePermission->isactive = $request->checked;
                                $rolePermission->save();
                            }
                        }
                    }
                }
            }
            $record->isactive = $request->checked;
            if ($record->save()) {
                $message    = 'Success, berhasil melakukan update permission!';
                $rc         = '0000';
            } else {
                $message    = 'Error, ketika melakukan update permission!';
                $rc         = '0066';
            }
        } else {
            $message    = 'Error, tidak ada permission tersebut!';
            $rc         = '0066';
        }
        $application    = SysApplication::where('id', $record->application_id)->first();
        $permission     = SysPermissions::where('id', $record->permission_id)->first();
        $role           = SysRole::where('id', $record->role_id)->first();
        $result = [
            "rc"            => $rc,
            "message"       => $message,
            "application"   => $application->name,
            "permission"    => $permission->name,
            "role"          => $role->name,
            "condition"     => $record->isactive
        ];
        return response()->json($result);
    }
}
