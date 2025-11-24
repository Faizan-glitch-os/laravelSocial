<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'body', 'user_id'];

    public function userBelongs()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'body' => $this->body
        ];
    }
}
