<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;


class AdminController extends Controller
{
    public function index() {
        $admin = Admin::all();
        //$post = Post::all();
        //return $post;
        return view('pages.admin.admin', compact('admin'));
        
    }

    public function showProfile() {
        return view('pages.admin.perfil');
    }
}
