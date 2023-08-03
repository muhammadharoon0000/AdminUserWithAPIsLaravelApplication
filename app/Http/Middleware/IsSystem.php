<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IsSystem
{
    public function handle(Request $request, Closure $next, $role = null)
    {
        $current_user_role = Auth::user()->userRole->name;
        $current_route =  $request->route()->uri();

        $permissions = $role ? collect(User::where('name', $role)->first()->userRole->permission)->pluck("name")->toArray() : collect(Auth::user()->userRole->permission)->pluck("name")->toArray();

        $roleExist = UserRole::where('name', $role)->first();

        if ($role && $roleExist) {
            if ($role == $current_user_role && in_array($current_route, $permissions)) {
                return $next($request);
            }
        } else if (in_array($current_route, $permissions)) {
            return $next($request);
        }
        return redirect(url("/welcome"))->with("message", "You are not authorized");
    }
}
