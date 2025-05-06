<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use App\Models\File; // Modelo de Archivos

class FileController extends Controller
{
    public function index() {
        $file = File::all(); // Obtiene todos los archivos

        return view('pages.admin.files', compact('file'));
    }

    public function uploadFile(Request $request) {
        $request->validate([
            'file' => 'required|file|max:133120', // Máximo 130 MB (en KB)
        ]);
    
        if ($request->hasFile('file')) {
            $archivo = $request->file('file');
    
            $nombreOriginal = $archivo->getClientOriginalName(); // Obtiene el nombre original del archivo
            $formatoArchivo = $archivo->getClientOriginalExtension(); // Obtiene el tipo MIME del archivo
    
            $ruta = $archivo->store('files', 'public'); // Guarda en storage/app/public/files
    
            // Determinar el usuario autenticado, ya sea 'admin' o 'user'
            if (Auth::guard('admin')->check()) {
                $user = Auth::guard('admin')->user();  // Si es un administrador
            } elseif (Auth::guard('web')->check()) {
                $user = Auth::guard('web')->user();    // Si es un usuario normal
            } else {
                // Si no está autenticado en ningún guard, puedes redirigirlo o manejar el error
                return redirect()->route('login')->with('error', 'No se ha encontrado un usuario autenticado.');
            }
    
            // Crear el archivo asociado al usuario
            File::create([
                'name' => $nombreOriginal,
                'path' => 'storage/' . $ruta, // Para mostrar desde Blade con asset()
                'format' => $formatoArchivo, // Guardamos el formato del archivo
                'size' => round($archivo->getSize() / (1024 * 1024), 2) . ' MB', // Guardamos el tamaño del archivo en MB
                'username' => $user->username, // Asociamos el archivo al nombre de usuario
                'nameuser' => $user->name, // Asociamos el archivo al nombre del usuario
                'user_email' => $user->email, // Asociamos el archivo al email del usuario
            ]);
    
            // Retornar los datos del archivo o redirigir a la página correspondiente
            return redirect()->route('pages.admin.files');
        }
    }
    
}
