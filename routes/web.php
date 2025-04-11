<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {
    //return view('prueba');
    $post = Post::find(1);
    //return $post -> created_at -> diffForHumans();

    return $post -> is_active;
});
?>
