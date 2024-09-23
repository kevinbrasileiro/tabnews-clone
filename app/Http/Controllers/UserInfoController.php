<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
    public function profile(User $user) {
        return view('profile.info', [
            'user' => $user,
        ]);
    }

    public function posts(User $user) {

        $posts = Post::with('user')->where('user_id', $user->id)->latest()->simplePaginate(30);

        return view('profile.posts', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function comments(User $user) {

        $comments = Comment::with('user', 'post')->where('user_id', $user->id)->latest()->simplePaginate(30);

        return view('profile.comments', [
            'user' => $user,
            'comments' => $comments,
        ]);
    }
}
