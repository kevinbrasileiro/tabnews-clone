<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);
Route::get('/recent', [PostController::class, 'recent']);

Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');;
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');

Route::get('/posts/{post}', [PostController::class, 'show']);

//  Route::get('/{user}');
//  Route::get('/{user}/posts');
//  Route::get('/{user}/comments');

Route::middleware('guest')->group(function() {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    
    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');