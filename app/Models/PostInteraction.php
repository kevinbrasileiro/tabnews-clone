<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PostInteraction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function createInteraction(int $type, $postId) {
        if (
            Auth::user() && !PostInteraction::query()
                ->where('user_id', Auth::id())
                ->where('post_id', $postId)
                ->where('type', $type)->count()
            ) {
            PostInteraction::create([
                'type' => $type,
                'user_id' => Auth::id(),
                'post_id' => $postId,
            ]);
        }
    }
}
