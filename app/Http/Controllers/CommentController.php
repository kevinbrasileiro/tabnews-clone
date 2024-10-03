<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\PostInteraction;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $request->validate([
            'body' => 'required|max:65535'
        ]);

        Comment::create([
            'body' => request('body'),
            'user_id' => Auth::id(),
            'post_id' => request('post')
        ]);

        PostInteraction::createInteraction(9, request('post'));

        return redirect()->back();
    }

    public function storeReply(StoreCommentRequest $request)
    {
        $request->validate([
            'body' => 'required|max:65535'
        ]);

        Comment::create([
            'body' => request('body'),
            'comment_id' => request('comment'),
            'user_id' => Auth::id(),
            'post_id' => request('post')
        ]);

        PostInteraction::createInteraction(9, request('post'));

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
