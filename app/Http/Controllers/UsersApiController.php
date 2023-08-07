<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersApiController extends Controller
{
    public function index()
    {
        $users = User::where('user_id', '!=', 1)->get();
        return response()->json(['data' => $users]);
    }
    public function create()
    {
        $roles =  UserRole::pluck("name", "id");
        return response()->json(['roles' => $roles]);
    }
    public function store(Request $request)
    {
        $newUser = new User;
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->user_id = $request->user_id;
        $newUser->password = Hash::make($request->password);
        $newUser->save();
        return response()->json(["message" => "Success"]);
    }
    public function show($id)
    {
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles =  UserRole::pluck("name", "id");
        return response()->json(["user" => $user, "roles" => $roles]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->user_id = $request->user_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(["message" => "Successfully Updated"]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json("User Deleted");
    }
}
