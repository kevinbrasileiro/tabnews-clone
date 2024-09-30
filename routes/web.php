<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikePostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserInfoController;
use Illuminate\Support\Facades\Route;

// HOME
Route::get('/', [PostController::class, 'index']);
Route::get('/recent', [PostController::class, 'recent']);
Route::get('/search', [SearchController::class, 'search']);

// POST CREATION
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');

// COMMENTS
Route::post('/comments', [CommentController::class, 'store'])->middleware('auth');
Route::post('/comments/reply', [CommentController::class, 'storeReply'])->middleware('auth');

// USER INFO
Route::get('/users/{user:username}', [UserInfoController::class, 'profile']);
Route::get('/users/{user:username}/posts', [UserInfoController::class, 'posts']);
Route::get('/users/{user:username}/comments', [UserInfoController::class, 'comments']);

// POSTS
Route::get('/{user:username}/{post:slug}', [PostController::class, 'show'])->name('uniquePost');
Route::post('/{user:username}/{post:slug}', [LikePostController::class, 'store'])->middleware('auth');
Route::get('/{user:username}/{post:slug}/edit', [PostController::class, 'edit'])
    ->middleware('auth')
    ->can('update', 'post');
Route::patch('/{user:username}/{post:slug}', [PostController::class, 'update'])
    ->middleware('auth')
    ->can('update', 'post');
Route::delete('/{user:username}/{post:slug}', [PostController::class, 'destroy'])
    ->middleware('auth')
    ->can('delete', 'post');

// AUTH
Route::middleware('guest')->group(function() {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});
Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');