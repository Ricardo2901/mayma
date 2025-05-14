<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use App\Models\File; // Modelo de Archivos

class FileController extends Controller
{
    public function indexAdmin() {
        $file = File::all(); // Obtiene todos los archivos

        return view('pages.admin.files', compact('file'));
    }

    public function indexUsers() {
        $file = File::all(); // Obtiene todos los archivos

        return view('pages.user.files', compact('file'));
    }

    public function uploadFile(Request $request) {
        $request->validate([
            'file' => 'required|file|max:133120', // Máximo 130 MB
        ]);

        if (!$request->hasFile('file')) {
            return redirect()->back()->with('error', 'No se encontró ningún archivo.');
        }

        $archivo = $request->file('file');
        $nombreOriginal = $archivo->getClientOriginalName();
        $formatoArchivo = $archivo->getClientOriginalExtension();

        // Determinar el usuario autenticado
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $ruta = $archivo->store('files/admins/' . $user->username, 'public');
        } elseif (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            $ruta = $archivo->store('files/users/' . $user->username, 'public');
        } else {
            return redirect()->route('login')->with('error', 'No se ha encontrado un usuario autenticado.');
        }

        // Guardar el archivo en carpeta personalizada del usuario
        

        File::create([
            'name' => $nombreOriginal,
            'path' => 'storage/' . $ruta,
            'format' => $formatoArchivo,
            'size' => round($archivo->getSize() / (1024 * 1024), 2) . ' MB',
            'username' => $user->username,
            'nameuser' => $user->name,
            'user_email' => $user->email,
        ]);

        // Redirigir a la vista correspondiente
        return Auth::guard('admin')->check()
            ? redirect()->route('pages.admin.files')
            : redirect()->route('pages.users.files');
    }


    public function deleteFile($id) {
        $archivo = File::findOrFail($id);
        $rutaArchivo = str_replace('storage/', '', $archivo->path); // Eliminar 'storage/' para obtener la ruta correcta

        if (Storage::disk('public')->exists($rutaArchivo)) {
            Storage::disk('public')->delete($rutaArchivo); // Elimina el archivo del almacenamiento
        }

        $archivo->delete(); // Elimina el registro de la base de datos

        return Auth::guard('admin')->check()
            ? redirect()->route('pages.admin.files')
            : redirect()->route('pages.users.files');
    }

    public function showPDF($id) {
        $archivo = File::findOrFail($id);

        $cleanPath = str_replace('/storage', '', $archivo->path);
        $pdfUrl = asset('storage/' . $cleanPath);

        return view('pages.admin.viewer', compact('pdfUrl'));
    }
    
}
