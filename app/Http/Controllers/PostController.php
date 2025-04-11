<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post() {
        return view('index');
    }

    public function show($post) {
        return view('show', [
            'post' => 'postal para hackear el sistema',
        ]);
    }

    public function createPost() {

    }
}
