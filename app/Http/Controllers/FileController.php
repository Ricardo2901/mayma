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

            File::create([
                'name' => $nombreOriginal,
                'path' => 'storage/' . $ruta, // Para mostrar desde Blade con asset()
                'format' => $formatoArchivo, // Guardamos el formato del archivo
                'size' => round($archivo->getSize() / (1024 * 1024), 2) . ' MB', // Guardamos el tamaño del archivo en MB
                'username' => Auth::user() -> username, // Asociamos el archivo al ID del usuario autenticado
                'nameuser' => Auth::user() -> name, // Asociamos el archivo al ID del usuario autenticado
                'user_email' => Auth::user() -> email, // Asociamos el archivo al ID del usuario autenticado
            ]);

            // Retornar los datos del archivo
            return redirect() -> route('pages.admin.files');
        }
    }
}
