<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController
{
    public function showCreatePost()
    {
        return view('create-post');
    }

    public function viewPost(Post $post)
    {
        $post['body'] = strip_tags(Str::markdown($post['body']), '<p><h1><h2><h3><h4><ul><li><ol><strong><em>');
        return view('single-post', ['post' => $post]);
    }

    public function showEditPost(Post $post)
    {

        return view('edit-post', ['post' => $post]);
    }

    public function editPost(Request $request, Post $post)
    {
        $edittedPost = $request->validate(['title' => 'required', 'body' => 'required']);
        $edittedPost['title'] = strip_tags($edittedPost['title']);
        $edittedPost['body'] = strip_tags($edittedPost['body']);

        $post->update($edittedPost);

        return redirect('/post/' . $post->id . '/view')->with(['message' => 'Post edited', 'status' => 'success']);
    }

    public function createPost(Request $request)
    {
        $userPost = $request->validate(['title' => 'required', 'body' => 'required']);
        $userPost['title'] = strip_tags($userPost['title']);
        $userPost['body'] = strip_tags($userPost['body']);
        $userPost['user_id'] = auth()->guard('web')->user()->id;

        $newPost = Post::create($userPost);

        return redirect('/post/' . $newPost->id . '/view')->with(['message' => 'Post created Successfully', 'status' => 'success']);
    }

    public function deletePost(Post $post)
    {
        $post->delete();

        return redirect('/')->with(['message' => 'Post deleted', 'status' => 'success']);
    }
}
