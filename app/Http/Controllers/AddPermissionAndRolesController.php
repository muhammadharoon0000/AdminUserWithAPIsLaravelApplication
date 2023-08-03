<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\UserRole;
use Illuminate\Http\Request;

class AddPermissionAndRolesController extends Controller
{
    function addPermissionAndRoleForm()
    {
        $permissions = Permission::pluck("name", "id");
        $roles = UserRole::pluck("name", "id");

        return view('add_permission_roles', [
            "permissions" =>  $permissions,
            "roles" => $roles,
        ]);
    }

    function add(Request $req)
    {
        $permission_data = $req->permissions;
        $user_role = UserRole::find($req->role);
        $user_role->permission()->attach($permission_data);
        return redirect()->back();
    }
    function editUserRolePermission($id)
    {
        $selected_role_user = UserRole::find($id);
        $selected_permissions = collect($selected_role_user->permission)
            ->pluck("name", "id")->toArray();
        $role_users = UserRole::pluck("name", "id");
        $permissions = Permission::pluck("name", "id");

        return view('edit_permission_role', [
            "role_users" => $role_users,
            "permissions" => $permissions,
            "selected_permissions" => $selected_permissions,
            "selected_role_user" => $selected_role_user
        ]);
    }

    function updateUserRolePermission(Request $req)
    {
        $role_user = UserRole::find($req->role);
        $permissions = $req->permissions;
        $role_user->permission()->sync($permissions);
        return redirect()->back();
    }
}
