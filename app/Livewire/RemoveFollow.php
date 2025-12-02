<?php

namespace App\Livewire;

use App\Models\Follow;
use App\Models\User;
use Livewire\Component;

class RemoveFollow extends Component
{
    public $userId;

    public function unFollow()
    {
        $user = User::where('id', $this->userId)->first();

        Follow::where([
            ['user_id', '=', auth()->guard('web')->user()->id],
            ['followed_user_id', '=', $user->id]
        ])->delete();

        session()->flash('message', [
            'text' => 'You unfollowed ' . $user->username,
            'status' => 'success'
        ]);

        return $this->redirect("/profile/{$user->id}", navigate: true);
    }

    public function render()
    {
        return view('livewire.remove-follow');
    }
}
