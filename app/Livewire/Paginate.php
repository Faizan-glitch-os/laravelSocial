<?php

namespace App\Livewire;

use App\Models\Follow;
use Livewire\Component;
use Livewire\WithPagination;

class Paginate extends Component
{
    use WithPagination;

    public string $type;
    public array $sharedData = [];

    public function mount()
    {
        $user = auth('web')->user();

        $postsCount = $user->userPosts()->get()->count();
        $followers = $user->followers()->get()->count();
        $following = $user->following()->get()->count();
        $isFollowed = Follow::where([['user_id', '=', auth('web')->user()->id], ['followed_user_id', '=', $user->id]])->count();

        $this->sharedData = [
            'user' => $user,
            'postsCount' => $postsCount,
            'isFollowed' => $isFollowed,
            'followers' => $followers,
            'following' => $following
        ];
    }

    public function render()
    {
        $user = $this->sharedData['user'];
        switch ($this->type) {
            case 'posts':
                $data = $user->userPosts()->latest()->paginate(5);
                $view = 'livewire.posts-paginate';
                break;

            case 'following':
                $data = $user->following()->latest()->paginate(5);
                $view = 'livewire.following-paginate';
                break;

            case 'followers':
                $data = $user->followers()->latest()->paginate(5);
                $view = 'livewire.followers-paginate';
                break;

            default:
                abort(404, 'Invalid pagination type');
        }

        return view($view, [$this->type => $data]);
    }
}
