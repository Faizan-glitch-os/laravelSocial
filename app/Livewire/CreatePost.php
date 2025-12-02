<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    public $title;
    public $body;

    public function createPost()
    {
        if (!auth('web')->check()) abort(403, 'Unauthorized');

        $userPost = $this->validate(['title' => 'required', 'body' => 'required']);
        $userPost['title'] = strip_tags($userPost['title']);
        $userPost['body'] = strip_tags($userPost['body']);
        $userPost['user_id'] = auth()->guard('web')->user()->id;

        $newPost = Post::create($userPost);

        session()->flash(
            'message',
            [
                'text' => 'Post created Succesfully',
                'status' => 'success'
            ]
        );

        return $this->redirect('/post/' . $newPost->id . '/view', navigate: true);
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
