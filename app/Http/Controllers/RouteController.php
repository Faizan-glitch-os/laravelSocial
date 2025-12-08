<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class RouteController
{
    public function showCorrectHomepage()
    {
        $isLoggedIn = auth()->guard('web')->check();

        if ($isLoggedIn) {
            $posts = auth()->guard('web')->user()->feedPosts()->latest()->simplePaginate(5);
            return view('homepage-loggedin', ['posts' => $posts]);
        } else {
            return view('homepage-loggin');
        }
    }

    public function showAvatarForm()
    {
        return view('avatar-form');
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate(['avatar' => 'required|image|max:5000']);

        $user = auth()->guard('web')->user();

        $fileName = $user->id . '-' . uniqid() . '.jpg';

        $manager = new ImageManager(new Driver());

        $avatar = $manager->read($request->file('avatar'));

        $toJpeg = $avatar->cover(width: 500, height: 500)->toJpeg();

        Storage::disk('public')->put('avatars/' . $fileName, $toJpeg);

        $oldAvatar = $user->avatar;

        $user->avatar = $fileName;
        $user->save();

        if ($oldAvatar != '/default_avatar.png') {
            Storage::disk('public')->delete('avatars/' . $oldAvatar);
        }

        return redirect('/')->with(['message' => 'Avatar Updated Successfully', 'status' => 'success']);
    }
}
