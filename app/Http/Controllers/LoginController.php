<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index()
    {
        return view('login'); // Asegúrate de tener resources/views/login.blade.php
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('web') -> attempt($credentials)) {
            $request->session()->regenerate();

            $admin = Auth::user();
            
            $admin -> timestamps = false; // Desactiva los timestamps para evitar conflictos
            $admin -> is_active = 1; // Marca al administrador como activo
            $admin -> save(); // Guarda los cambios

            return redirect()->route('pages.admin.admin')->with('user', Auth::user());
        }

        return back()->withErrors([
            'email' => 'Usuario y/o contraseña incorrectos.',
        ])->onlyInput('email');
    }

    protected function unauthenticated($request, AuthenticationException $exception) {
        return redirect()->route('login')->with('showLoginModal', true);
    }

    public function logout(Request $request): RedirectResponse
    {
        $admin = Auth::user();

        if ($admin) {
            $admin -> timestamps = false; // Desactiva los timestamps para evitar conflictos
            $admin -> is_active = 0; // Marca al administrador como inactivo
            $admin -> last_login = now(); // Marca la fecha de último inicio de sesión
            $admin -> save(); // Guarda los cambios
        }

        // Cierra la sesión del usuario
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
