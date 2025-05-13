<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
        return redirect()->route('pages.admin.perfil');
        }

        if (Auth::guard('web')->check()) {
            return redirect()->route('pages.users.perfil');
        }

        return view('login'); // Mostrar login solo si no hay sesión activa
    }

    public function authenticate(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        // Intentar login con el guard 'web' (usuarios normales)
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
    
            $user = Auth::guard('web')->user();
    
            $user->timestamps = false;  // Desactiva los timestamps para evitar conflictos
            $user->is_active = 1;       // Marca al usuario como activo
            $user->save();              // Guarda los cambios
    
            // Redirige al perfil del usuario
            return redirect()->route('pages.users.perfil')->with('login', $user);
    
        // Intentar login con el guard 'admin' (administradores)
        } elseif (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
    
            $admin = Auth::guard('admin')->user();
    
            $admin->timestamps = false;  // Desactiva los timestamps para evitar conflictos
            $admin->is_active = 1;       // Marca al administrador como activo
            $admin->save();              // Guarda los cambios
    
            // Redirige al perfil del administrador
            return redirect()->route('pages.admin.perfil')->with('login', $admin);
    
        } else {
            // En caso de fallar la autenticación
            return back()->withErrors([
                'email' => 'Usuario y/o contraseña incorrectos.',
            ])->onlyInput('email');
        }
    }

    protected function unauthenticated($request, AuthenticationException $exception) {
        return redirect()->route('login')->with('showLoginModal', true);
    }

    public function logout(Request $request): RedirectResponse
    {
        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user();
    
            $admin->timestamps = false;
            $admin->is_active = 0;
            $admin->last_login = now();
            $admin->save();
    
            Auth::guard('admin')->logout();
    
        } elseif (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
    
            $user->timestamps = false;
            $user->is_active = 0;
            $user->last_login = now();
            $user->save();
    
            Auth::guard('web')->logout();
        }
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
