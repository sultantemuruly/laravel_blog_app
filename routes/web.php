<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $post = [];
    if (auth()->check()) {
        $post = auth()->user()->posts()->latest()->get();
    }
    return view('home', ['posts' => $post]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::post('/create-post', [PostController::class, 'createPost'])->middleware('auth');

Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen'])->middleware('auth');
Route::put('/edit-post/{post}', [PostController::class, 'updatePost'])->middleware('auth');
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost'])->middleware('auth');
