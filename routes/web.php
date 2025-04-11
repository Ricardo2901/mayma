<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

Route::get('/', [HomeController::class, 'index']);

Route::get('/posts', [PostController::class, 'post']);

Route::get('/showpost/{post}', [PostController::class, 'show'])
/*
Route::get('/posts/create', [PostController::class, 'create']);

Route::get('/post/{post}', [PostController::class, 'sh']);
*/
?>
