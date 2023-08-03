<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IsSystem
{
    public function handle(Request $request, Closure $next)
    {
        $current_route =  $request->route()->getName();
        $permissions = collect(Auth::user()->userRole->permission)->pluck("name")->toArray();
        if (in_array($current_route, $permissions)) {
            return $next($request);
        }
        return redirect(url("/welcome"))->with("message", "You are not authorized");
    }
}
