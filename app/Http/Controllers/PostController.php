<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\LikePost;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->withCount('comments')->orderBy('relevance', 'desc')->simplePaginate(30);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function recent()
    {
        $posts = Post::with('user')->withCount('comments')->latest()->simplePaginate(30);

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
        $request->merge([
            'title' => Str::slug(request('title')),
        ]);
        $request->validate([
            'title' => ['required', 
                Rule::unique('posts', 'slug')->where('posts.user_id', Auth::id())
            ],
            'body' => 'required|min:1|max:65535'
        ]);

        $post = Post::create([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'body' => request('body'),
            'relevance' => rand(0, 100), // TODO: figure out how to do this
            'user_id' => Auth::id(),
        ]);

        LikePost::create([
            'type' => 1,
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ]);

        return redirect('/recent');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Post $post)
    {

        $upVotes = LikePost::query()->where('type', '1')->where('post_id', $post->id)->count();
        $downVotes = LikePost::query()->where('type', '-1')->where('post_id', $post->id)->count();

        $userHasLiked = LikePost::where('user_id', Auth::id())->where('post_id', $post->id)->first();

        return view('posts.show', [
            'post' => $post,
            'comments' => $post->comments,
            'likes' => $upVotes - $downVotes,
            'userHasLiked' => $userHasLiked->type ?? 0,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, User $user, Post $post)
    {
        $request->merge([
            'title' => Str::slug(request('title')),
        ]);
        $request->validate([
            'title' => ['required', 
                Rule::unique('posts', 'slug')->where('posts.user_id', Auth::id())->ignore($post->id)
            ],
            'body' => 'required|min:1|max:65535'
        ]);

        $post->update([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'body' => request('body'),
        ]);
        
        return redirect()->route('uniquePost', [
            'user' => $post->user,
            'post' => $post,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Post $post)
    {
        $post->delete();

        return redirect('/');
    }
}
