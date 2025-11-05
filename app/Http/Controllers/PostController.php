<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController
{
    public function showCreatePost()
    {
        return view('create-post');
    }

    public function createPost(Request $request)
    {
        $userPost = $request->validate(['title' => 'required', 'body' => 'required']);
        $userPost['title'] = strip_tags($userPost['title']);
        $userPost['body'] = strip_tags($userPost['body']);
        $userPost['user_id'] = auth()->guard('web')->id();

        Post::create($userPost);

        return redirect('/')->with(['message' => 'Post created Successfully', 'status' => 'success']);
    }
}
