<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Modelo de Usuarios
use Illuminate\Support\Facades\Hash; // Clase para encriptar la contraseña
use Illuminate\Support\Str; // Clase para generar cadenas aleatorias


class UserController extends Controller
{
    // Método para mostrar la vista de administradores
    public function index() {
        $user = User::all(); // Obtiene todos los administradores

        return view('pages.admin.users', compact('user'));
        
    }

    // Método para mostrar la vista de crear administrador
    public function created(Request $request) {
        $user = new User();

        //$admin -> id = $request -> id; // Agrega el ID automaticamente. Favor de no descomentar
        $user -> username = $request -> username; // Agrega el nombre de usuario
        $user -> name = $request -> name; // Agrega el nombre
        $user -> email = $request -> email; // Agrega el email
        $user -> password = Hash::make($request -> password); // Crea y Encripta la contraseña
        $user -> email_verified_at = now(); // Marca el email como verificado con fecha actual
        $user -> rol = $request -> rol; // Agrega el rol
        $user -> created_at = now(); // Marca la fecha de creación
        $user -> updated_at = now(); // Marca la fecha de actualización
        $user -> remember_token = Str::random(10); // Agrega el token de recordatorio
        $user -> avatar = 'images/default_profile.jpg'; // Agrega la imagen de perfil por defecto
        $user -> is_active = 0; // Marca al administrador como inactivo
        $user -> last_login = null; // Marca al administrador como no verificado

        $user -> save();

        return redirect() -> route('pages.admin.users');
    }

    // Método para mostrar la vista de actualizar administrador
    public function update(Request $request, $user) {
        $user = User::find($user);

        $user -> username = $request -> username; // Cambia el nombre de usuario
        $user -> name = $request -> name; // Cambia el nombre
        $user -> email = $request -> email; // Cambia el email
        $user -> password = Hash::make($request -> password); // Encripta la contraseña
        $user -> updated_at = now(); // Actualiza la fecha de actualización
        
        if ($request -> has('email_verified_at')) {
            $user -> email_verified_at = now(); // Lo marca como verificado con fecha actual
        }

        $user -> rol = $request -> rol; // Cambia el rol
        $user -> save(); // Guarda los cambios

        return redirect() -> route('pages.admin.users');
    }

    // Método para mostrar la vista de eliminar administrador
    public function delete($admin) {
        $user = User::findOrFail($admin); // Busca el administrador por ID
        $user -> delete(); // Elimina el administrador

        return redirect() -> route('pages.admin.users');
    }
}
