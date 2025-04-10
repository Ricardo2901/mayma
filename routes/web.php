<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {
    $id = 1;
    $title = "Title 4";

    $post =  Post::where('title', $title) -> get();

    $post -> delete();

    //return $post; 
});
?>
