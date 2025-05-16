<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Admin; // Modelo de Administradores
use Illuminate\Support\Facades\Hash; // Clase para encriptar la contraseña
use Illuminate\Support\Str; // Clase para generar cadenas aleatorias


class AdminController extends Controller
{
    // Método para mostrar la vista de administradores
    public function index() {
        $admin = Admin::all(); // Obtiene todos los administradores

        return view('pages.admin.admin', compact('admin'));
        
    }

    // Método para mostrar la vista de crear administrador
    public function created(Request $request) {
        $admin = new Admin();

        //$admin -> id = $request -> id; // Agrega el ID automaticamente. Favor de no descomentar
        $admin -> username = $request -> username; // Agrega el nombre de usuario
        $admin -> name = $request -> name; // Agrega el nombre
        $admin -> email = $request -> email; // Agrega el email
        $admin -> password = Hash::make($request -> password); // Crea y Encripta la contraseña
        $admin -> email_verified_at = now(); // Marca el email como verificado con fecha actual
        $admin -> rol = $request -> rol; // Agrega el rol
        $admin -> created_at = now(); // Marca la fecha de creación
        $admin -> updated_at = now(); // Marca la fecha de actualización
        $admin -> remember_token = Str::random(10); // Agrega el token de recordatorio
        $admin -> avatar = 'images/default_profile.jpg'; // Agrega la imagen de perfil por defecto
        $admin -> is_active = 0; // Marca al administrador como inactivo
        $admin -> last_login = null; // Marca al administrador como no verificado

        $admin -> save();

        Storage::disk('public')->makeDirectory('files/admins/' . $admin->username);
        Storage::disk('public')->makeDirectory('files/admins/' . $admin->username . '/avatar');

        return redirect() -> route('pages.admin.admin');
    }

    // Método para mostrar la vista de actualizar usuario
    public function update(Request $request, $admin) {
        $admin = Admin::find($admin);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->updated_at = now();

        if ($request->has('email_verified_at')) {
            $admin->email_verified_at = now();
        }

        $admin->save();

        // ✅ Manejo de imagen de perfil
        if ($request->hasFile('avatar')) {
            // Crear carpeta si no existe
            Storage::disk('public')->makeDirectory('files/admins/' . $admin->username . '/avatar');

            $archivo = $request->file('avatar');
            $nombre = 'avatar_' . time() . '.' . $archivo->getClientOriginalExtension();

            // Guardar imagen en la carpeta correcta
            $ruta = $archivo->storeAs('files/admins/' . $admin->username . '/avatar', $nombre, 'public');

            // Borrar avatar anterior si existe y no es el default
            if ($admin->avatar && $admin->avatar !== 'images/default_profile.jpg') {
                // Eliminar 'storage/' para obtener la ruta relativa dentro del disco
                $archivoAnterior = str_replace('storage/', '', $admin->avatar);
                Storage::disk('public')->delete($archivoAnterior);
            }

            // Guardar ruta del nuevo avatar en base de datos
            $admin->avatar = 'storage/' . $ruta;
            $admin->save();
        }

        return redirect()->route('pages.admin.perfil');
    }

    // Método para mostrar la vista de actualizar administrador
    public function updateAdmin(Request $request, $admin) {
        $admin = Admin::find($admin);

        $admin -> username = $request -> username; // Cambia el nombre de usuario
        $admin -> name = $request -> name; // Cambia el nombre
        $admin -> email = $request -> email; // Cambia el email
        $admin -> password = Hash::make($request -> password); // Encripta la contraseña
        $admin -> updated_at = now(); // Actualiza la fecha de actualización
        
        if ($request -> has('email_verified_at')) {
            $admin -> email_verified_at = now(); // Lo marca como verificado con fecha actual
        }

        $admin -> rol = $request -> rol; // Cambia el rol
        $admin -> save(); // Guarda los cambios

        return redirect() -> route('pages.admin.admin');
    }

    // Método para mostrar la vista de eliminar administrador
    public function delete($admin) {
        $admin = Admin::findOrFail($admin); // Busca el administrador por ID
        $admin -> delete(); // Elimina el administrador

        return redirect() -> route('pages.admin.admin');
    }

    public function deleteAdmin($admin) {
        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user();
    
            $admin->timestamps = false;
            $admin->is_active = 0;
            $admin->last_login = now();
            $admin->save();
    
            Auth::guard('admin')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            //Elimina el usuario
            $admin -> delete();
    
        } elseif (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
    
            $user->timestamps = false;
            $user->is_active = 0;
            $user->last_login = now();
            $user->save();
    
            Auth::guard('web')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            //Elimina el usuario
            $user -> delete();
        }

        return redirect('/login');
    }

    public function showProfile() {
        return view('pages.admin.perfil');
    }

    public function config() {
        return view('pages.admin.configure');
    }

    public function showVersion() {
        return view('pages.admin.acerca');
    }
}
