<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LikePost extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function posts(): BelongsToMany  {
        return $this->belongsToMany(Post::class);
    }
}
