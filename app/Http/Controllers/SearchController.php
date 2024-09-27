<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search() {
        $posts = Post::with('user')->withCount('comments')->where('title', 'LIKE', '%'.request('query').'%')->latest()->simplePaginate(30);

        return view('posts.results', [
            'posts' => $posts,
            'query' => request('query'),
        ]);
    }
}
