<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public function userFollowers()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userFollowing()
    {
        return $this->belongsTo(User::class, 'followed_user_id');
    }
}
