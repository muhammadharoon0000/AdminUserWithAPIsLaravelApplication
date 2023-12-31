<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    function index()
    {
        $user = User::where('user_id', '!=', 1)->get();
        return view('show_all_users', [
            'data' => $user,
            'message' => 'Test'
        ]);
    }
    function showOrEditForm($id = null)
    {
        $roles =  UserRole::pluck("name", "id");
        return view('add_new_user', [
            'user' => $id ? User::find($id) : "",
            'roles' => $roles
        ]);
    }
    function UpdateOrCreate(Request $req, $id = null)
    {
        $user = $id ? User::find($id) : new User;
        if (!$req->password) {
            unset($req['password']);
            unset($req['confirm_password']);
        }
        $validated = $req->validate([
            'name' => 'required | max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
            'password' => 'sometimes | min:6 | required_with:confirm_password | same:confirm_password',
            'confirm_password' => 'sometimes | min:6'
        ]);

        $user->name = ucwords(ucfirst($req->name));
        $user->email = $req->email;
        $user->user_id = $req->role;
        if ($req->password) $user->password = Hash::make($req->password);
        $user->save();

        return redirect()->route('show_all_users')->with('message', 'Successfully Created');
    }

    function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('show_all_users')->with('message', 'Successfully Deleted');
    }

    function showUser($id)
    {
        $data = User::find($id);
        return view('show_single_user')->with('data', $data);
    }
}
