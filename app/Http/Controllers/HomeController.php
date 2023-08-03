<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\UserRole;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function showUserAndPermissions()
    {
        $user_roles = UserRole::where('is_system', false)->get();
        return view('home_page')->with([
            'user_roles' => $user_roles
        ]);
    }
}
