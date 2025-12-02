<?php

namespace App\Livewire;

use Livewire\Component;

class DeletePost extends Component
{
    public $post;

    public function deletePost()
    {
        $this->authorize('delete', $this->post);
        $this->post->delete();

        session()->flash('message', ['text' => 'Post deleted', 'status' => 'success']);
        return $this->redirect('/profile/' . auth('web')->user()->id, navigate: true);
    }

    public function render()
    {
        return view('livewire.delete-post');
    }
}
