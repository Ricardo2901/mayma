<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllUsersController extends Controller
{
    public function index()
    {
        return view('pages.admin.allusers');
    }
}
