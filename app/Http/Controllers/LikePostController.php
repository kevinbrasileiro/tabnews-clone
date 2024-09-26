<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLikePostRequest;
use App\Models\LikePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikePostController extends Controller
{
    public function store(StoreLikePostRequest $request)
    {
        $request->validate([
            'type' => 'required|numeric|min:-1,max:1',
        ]);

        $like = LikePost::where('user_id', Auth::id())
            ->where('post_id', request('post'))
            ->first();

        if ($like) $like->delete();

        if (!$like || request("type") != $like->type) {
            LikePost::create([
                'type' => request('type'),
                'user_id' => Auth::id(),
                'post_id' => request('post'),
            ]);
        }

        return redirect()->back();
    }
}
