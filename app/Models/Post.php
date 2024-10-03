<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class)->whereNull('comment_id');
    }

    public function allComments(): HasMany {
        return $this->hasMany(Comment::class);
    }

    public function likes(): HasMany {
        return $this->hasMany(LikePost::class);
    }

    public function calculatePostRelevance() {
        $views = PostInteraction::query()->where('post_id', $this->id)->where('type', 1)->count();
        $likes = PostInteraction::query()->where('post_id', $this->id)->where('type', 3)->count();
        $comments = PostInteraction::query()->where('post_id', $this->id)->where('type', 9)->count();

        return $views + $likes * 3 + $comments * 9;
    }
}
