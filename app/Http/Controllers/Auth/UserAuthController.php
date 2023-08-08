<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $register_user = new User;
        $register_user->name = $request->name;
        $register_user->email = $request->email;
        $register_user->user_id = 2;
        $register_user->password = Hash::make($request->password);
        $register_user->save();

        $token = $register_user->createToken('API Token')->accessToken;

        return response(['user' => $register_user, 'token' => $token]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required'
        ]);
        $data = $request->all();

        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            auth()->attempt($data);
            $token = auth()->user()->createToken('API Token')->accessToken;
            return response(['user' => auth()->user(), 'token' => $token]);
        }
    }
}
