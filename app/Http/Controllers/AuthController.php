<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AuthController
{
    private function sharedData($user)
    {

        $postsCount = $user->userPosts()->get()->count();
        $followers = $user->followers()->get()->count();
        $following = $user->following()->get()->count();
        $isFollowed = Follow::where([['user_id', '=', auth('web')->user()->id], ['followed_user_id', '=', $user->id]])->count();

        View::share('sharedData', [
            'user' => $user,
            'postsCount' => $postsCount,
            'isFollowed' => $isFollowed,
            'followers' => $followers,
            'following' => $following
        ]);
    }

    public function showProfile(User $user)
    {
        $posts = $user->userPosts()->latest()->get();
        $this->sharedData($user);

        return view('profile-posts', ['posts' => $posts]);
    }

    public function showFollowers(User $user)
    {
        $this->sharedData($user);
        $followers = $user->followers()->latest()->get();

        return view('profile-followers', ['followers' => $followers]);
    }

    public function showFollowing(User $user)
    {
        $this->sharedData($user);
        $following = $user->following()->latest()->get();

        return view('profile-following', ['following' => $following]);
    }

    public function register(Request $request)
    {
        $userData = $request->validate([
            'username' => ['required', 'min:3', 'max:55', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', Password::min(8)]
        ]);
        User::create($userData);

        return redirect('/')->with(['message' => 'Successfully Registered', 'status' => 'success']);
    }

    public function login(Request $request)
    {
        $userData = $request->validate(['loginemail' => 'required|email', 'loginpassword' => 'required']);

        $isLoggedIn = auth()->guard('web')->attempt(['email' => $userData['loginemail'], 'password' => $userData['loginpassword']]);

        if ($isLoggedIn) {
            $request->session()->regenerate();
            return redirect('/')->with(['message' => 'Successfully Logged In', 'status' => 'success']);
        } else {
            return redirect('/')->with(['message' => 'Failed to Logged In', 'status' => 'failed']);
        }
    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect('/')->with(['message' => 'Successfully Logged Out', 'status' => 'success']);
    }
}
