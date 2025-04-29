<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; // Modelo de Administradores
use Illuminate\Support\Facades\Auth; // Clase para manejar la autenticación
use Illuminate\Support\Facades\Hash; // Clase para encriptar la contraseña

class LoginController extends Controller
{
    // Método para manejar el login
    public function login(Request $request) {
        // Validar las credenciales del usuario
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Si las credenciales son correctas, obtenemos el usuario autenticado
            $user = Auth::user();

            // Redirigir según el rol del usuario
            if ($user->rol == 'Administrador Nv.1') {
                return redirect() -> route('pages.admin.admin'); // Redirige al dashboard de admin
            
            } elseif ($user->rol == 'Administrador Nv.2') {
                return redirect() -> route('pages.admin.editor'); // Redirige al dashboard de editor
            
            } elseif ($user->rol == 'Administrador Nv.3') {
                return redirect() -> route('pages.admin.viewer'); // Redirige al dashboard de editor
            
            } else {
                return redirect('/login'); // Redirige a la página de inicio del usuario normal
            }
        } else {
            // Si las credenciales no son correctas
            return back()->withErrors([
                'email' => 'Estas credenciales no coinciden con nuestros registros.',
            ]);
        }
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidar sesión y regenerar token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
