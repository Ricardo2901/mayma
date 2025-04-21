<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

//GLOBAL:
Route::get('/login', function () {
    return view('login');
});

Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('/version', function () {
    return view('pages.admin.acerca');
});


//PRUEBAS DE BACKEND:
Route::get('/', [HomeController::class, 'index']) -> name ('home');

//Route::get('/home', [HomeController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']) -> name('posts.index');

//Route::get('/posts/create', [PostController::class, 'createPost']);
Route::get('/create/posts', [PostController::class, 'createPost']) -> name('posts.create');

//Route::post('/posts', [PostController::class, 'store']);
Route::post('/posts', [PostController::class, 'store']) -> name('posts.store');

Route::get('/posts/{post}', [PostController::class, 'show']);

Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

Route::put('/posts/{post}', [PostController::class, 'update']);

Route::get('/posts/{post}/remove', [PostController::class, 'deleteForm']);

Route::delete('/posts/{post}', [PostController::class, 'destroy']);

//ADMINISTRADOR:

//USUARIOS:
?>
