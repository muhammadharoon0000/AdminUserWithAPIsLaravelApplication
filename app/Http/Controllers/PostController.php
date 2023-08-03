<?php

namespace App\Http\Controllers;

use App\Models\BlogUser;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function addPost(Request $req){
        $currentUser = BlogUser::find($req["id"]);
        $newPost = new Post;
        $newPost["title"] = $req["title"];
        $newPost["content"] = $req["content"];
        $newPost["user_id"] = $req["id"];
        $newPost->save();
        // $currentUser->posts()->save($newPost);
        return redirect()->back()->with("message", "Post Successfully Added");
    }
}
