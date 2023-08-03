<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPUnit\TextUI\Help;

class AuthController extends Controller
{
    function showRegisterForm()
    {
        return view('auth._register');
    }
    function registerUser(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required | max:255',
            'email' => 'required',
            'password' => 'required',

        ]);
        $register_user = new User;
        $register_user->name = $req->name;
        $register_user->email = $req->email;
        $register_user->password = Hash::make($req->password);
        $register_user->save();

        return redirect('/login');
    }

    function showLoginForm()
    {
        return view('auth._login');
    }

    function loginUser(Request $req)
    {
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $remember = $req->has("remember");
        $checkURLIfAdmin = Helper::checkURLIfAdmin();
        $user = User::where('email', $req->email)->first();
        if ($user) {
            $role = $user->userRole;
            if ($role->name == "Admin" && $checkURLIfAdmin) {
                if (Auth::attempt($credentials, $remember)) {
                    $req->session()->regenerate();
                    return redirect()->to('welcome')->with("message", "Successfully Logged in as admin");
                }
            } else if ($role->name == "Customer" && $checkURLIfAdmin == false) {
                if (Auth::attempt($credentials, $remember)) {
                    $req->session()->regenerate();
                    return redirect()->to('welcome')->with("message", "Successfully Logged in as customer");
                }
            } else {
                $message = $checkURLIfAdmin ? 'You are not admin' : 'You are admin login as admin';
                return redirect()->to(url('/login'))->with("message", $message);
            }
        } else {
            return redirect()->to(url('/login'))->with("message", "Wrong credentials");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with("message", "Successfully Logged out");
    }
}
