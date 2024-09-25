<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->orderBy('relevance', 'desc')->simplePaginate(30);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function recent()
    {
        $posts = Post::with('user')->latest()->simplePaginate(30);

        return view('posts.index', [
            'posts' => $posts,
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required|min:100|max:65535'
        ]);

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'relevance' => rand(0, 100), // TODO: figure out how to do this
            'user_id' => Auth::id(),
        ]);

        return redirect('/recent');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $likesAmount = 0;

        return view('posts.show', [
            'post' => $post,
            'comments' => $post->comments,
            'likes' => $likesAmount,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
