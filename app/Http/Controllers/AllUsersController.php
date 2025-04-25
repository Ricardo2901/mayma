<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

class AllUsersController extends Controller
{
    public function index()
    {
        $user = User::all();
        $admin = Admin::all();

        $allUser = $user -> concat($admin);
        return view('pages.admin.allusers', compact('allUser'));
    }
}
