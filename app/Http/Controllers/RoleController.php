<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\UserRole;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function addRoleForm()
    {
        $permissions = Permission::pluck("name", "id");
        return view("role.add_role_form", [
            'permissions' => $permissions
        ]);
    }

    function addRole(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required',
        ]);
        $user = ucfirst($req->role);
        if (UserRole::where('name', $user)->exists()) {
            return redirect()->back()->with("error", "User already exist");
        }
        $new_user_role = new UserRole;
        $new_user_role->name = $req->role;
        $new_user_role->save();

        $user_role = UserRole::where('name', $user)->first();
        $user_role->permission()->sync($req->permissions);
        return redirect()->back()->with("message", "Successfully Added");
    }
}
