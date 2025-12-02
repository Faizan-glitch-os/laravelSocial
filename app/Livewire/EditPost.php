<?php

namespace App\Livewire;

use Livewire\Component;

class EditPost extends Component
{
    public $post;
    public $title;
    public $body;

    public function mount()
    {
        $this->title = $this->post->title;
        $this->body = $this->post->body;
    }

    public function editPost()
    {
        $this->authorize('update', $this->post);
        $incomingFields = $this->validate(['title' => 'required', 'body' => 'required']);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $this->post->update($incomingFields);
        session()->flash('message', ['text' => 'Post edited succesfully', 'status' => 'success']);

        return $this->redirect('/post/' . $this->post->id . '/view', navigate: true);
    }
    public function render()
    {
        return view('livewire.edit-post');
    }
}
