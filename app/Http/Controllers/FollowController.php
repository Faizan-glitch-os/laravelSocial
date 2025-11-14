<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController
{
    public function follow(User $user)
    {

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

        return back()->with(['message' => 'You are following ' . $user->username, 'status' => 'success']);
    }

    public function unfollow(User $user)
    {
        Follow::where([['user_id', '=', auth()->guard('web')->user()->id], ['followed_user_id', '=', $user->id]])->delete();

        return back()->with(['message' => 'You unfollowed ' . $user->username, 'status' => 'success']);
    }
}
