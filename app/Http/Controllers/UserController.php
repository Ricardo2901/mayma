<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index() {
        $user = User::all();
        //$post = Post::all();
        //return $post;
        return view('pages.admin.users', compact('user'));
        
    }
}
