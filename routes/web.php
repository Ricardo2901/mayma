<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/posts', [PostController::class, 'index']);

Route::get('/create/posts', [PostController::class, 'createPost']);

Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{post}', [PostController::class, 'show']);

Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

Route::put('/posts/{post}', [PostController::class, 'update']);

Route::get('/posts/{post}/remove', [PostController::class, 'deleteForm']);

Route::delete('/posts/{post}', [PostController::class, 'destroy']);

//Route::get('/users', [PostController::class, 'index']);
/*
Route::get('/post/{post}', [PostController::class, 'sh']);
*/
?>
