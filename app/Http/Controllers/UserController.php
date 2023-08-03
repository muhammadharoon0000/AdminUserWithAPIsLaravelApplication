<?php

namespace App\Http\Controllers;

use App\Models\BlogUser;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{

    function index()
    {
        $user = BlogUser::all();
        // return view('showAllUsers', compact("data"));
        // return view('showAllUsers')->with('data',$user);
        return view('show_all_users', [
            'data' => $user,
            'message' => 'Test'
        ]);
    }

    function showForm()
    {
        return view('add_new_user', [
            'message' => 'asdad'
        ]);
    }

    function create(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required | max:255',
            'email' => 'required',
            'password' => 'required',
        ]);

        $users = new BlogUser;
        $users->name = $req->name;
        $users->email = $req->email;
        $users->password = Hash::make($req->password);
        $users->save();

        return redirect()->route('show_all_users')->with('message', 'Successfully Created');
    }

    function edit($id)
    {
        $data = BlogUser::find($id);
        if ($data == null) {
            return "User Not Found";
        }
        return view('edit_user_form', compact('data'));
    }

    function update(Request $req, $id)
    {
        $user = BlogUser::find($id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->save();

        return redirect()->route('show_all_users')->with('message', 'Successfully Updated');
    }

    function delete($id)
    {
        $user = BlogUser::find($id);
        $user->delete();
        return redirect()->route('show_all_users')->with('message', 'Successfully Deleted');
    }

    function showUser($id)
    {
        $data = BlogUser::find($id);
        return view('show_single_user')->with('data', $data);
    }
}
