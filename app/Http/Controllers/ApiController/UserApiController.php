<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    function index()
    {
        $users = User::where('user_id', '!=', 1)->get();
        return response()->json(['data' => $users]);
    }

    function show($id)
    {
        $user = User::find($id);
        return $user ? User::find($id)->first() : ["msg" => "User Not Found"];
    }

    function insert(Request $req)
    {
        return $req;
    }

    function delete($id)
    {
        $user = User::find($id);
        return $user ? User::find($id)->first() : ["msg" => "User Not Found"];
    }
}
