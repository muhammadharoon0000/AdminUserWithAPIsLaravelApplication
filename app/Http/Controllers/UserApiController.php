<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    function index()
    {
        return User::all();
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
