<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class UploadAvatar extends Component
{
    use WithFileUploads;

    public $avatar;

    public function uploadAvatar()
    {
        if (!auth('web')->check()) abort(403, 'unAuthorized');

        $this->validate(['avatar' => 'required|image']);

        $user = auth()->guard('web')->user();

        $fileName = $user->id . '-' . uniqid() . '.jpg';

        $manager = new ImageManager(new Driver());

        $avatar = $manager->read($this->avatar);

        $toJpeg = $avatar->cover(width: 500, height: 500)->toJpeg();

        Storage::disk('public')->put('avatars/' . $fileName, $toJpeg);

        $oldAvatar = $user->avatar;

        $user->avatar = $fileName;
        $user->save();

        if ($oldAvatar != '/default_avatar.png') {
            Storage::disk('public')->delete('avatars/' . $oldAvatar);
        }

        session()->flash('message', [
            'text' => 'Avatar updated successfully',
            'status' => 'success'
        ]);

        return $this->redirect("/profile/$user->id", navigate: true);
    }

    public function render()
    {
        return view('livewire.upload-avatar');
    }
}
