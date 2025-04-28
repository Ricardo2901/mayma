<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; // Modelo de Administradores
use Illuminate\Support\Facades\Hash; // Clase para encriptar la contraseña


class AdminController extends Controller
{
    
    public function index() {
        $admin = Admin::all();
        //$post = Post::all();
        //return $post;
        return view('pages.admin.admin', compact('admin'));
        
    }

    public function update(Request $request, $admin) {
        $admin = Admin::find($admin);

        $admin -> username = $request -> username;
        $admin -> name = $request -> name;
        $admin -> email = $request -> email;
        $admin -> password = Hash::make($request -> password);
        $admin -> updated_at = now(); // Actualiza la fecha de actualización
        
        if ($request -> has('email_verified_at')) {
            $admin -> email_verified_at = now(); // Lo marca como verificado con fecha actual
        }

        $admin -> rol = $request -> rol;
        $admin -> save();

        //return redirect('/posts'); 

        //return "Actualizacion de datos satisfactoriamente: {$post}";

        return redirect() -> route('pages.admin.admin');
    }

    public function showProfile() {
        return view('pages.admin.perfil');
    }

    public function config() {
        return view('pages.admin.configure');
    }
}
