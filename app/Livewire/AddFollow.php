<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Follow;
use Livewire\Component;

class AddFollow extends Component
{
    public $userId;

    public function follow()
    {
        if (!auth('web')->check()) abort(403, 'Unauthorized');

        $user = User::where('id', $this->userId)->first();

        $isFollowed = Follow::where([['user_id', '=', auth()->guard('web')->user()->id], ['followed_user_id', '=', $user->id]])->count();

        $follow = new Follow();

        if (auth('web')->user()->id === $user->id) {
            return back()->with(['message' => 'You cannot follow yourserlf', 'status' => 'failed']);
        }

        if ($isFollowed) {
            return back()->with(['message' => 'You have already followed ' . $user->username, 'status' => 'failed']);
        }

        $follow->user_id = auth('web')->user()->id;
        $follow->followed_user_id = $user->id;
        $follow->save();

        session()->flash('message', [
            'text' => 'You are now following ' . $user->username,
            'status' => 'success'
        ]);

        return $this->redirect("/profile/{$this->userId}", navigate: true);
    }
    public function render()
    {
        return view('livewire.add-follow');
    }
}
