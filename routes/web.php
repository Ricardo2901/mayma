<?php

use App\Http\Controllers\HomeController;        //Login
use App\Http\Controllers\PostController;        //Controlador de Posts
use App\Http\Controllers\AdminController;       //Controlador de Administradores
use App\Http\Controllers\UserController;        //Controlador de Usuarios
use App\Http\Controllers\FileController;        //Controlador de Archivos
use App\Http\Controllers\AllUsersController;    //Controlador de Usuarios: Admnistradores/Usuarios
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

//GLOBAL:
Route::get('/login', function () {
    return view('login');
});

Route::get('/prueba', function () {
    return view('user');
});

Route::get('/admin/version', function () {
    return view('pages.admin.acerca');
});



//PRUEBAS DE FRONTEND:

//Route::get('/admin/perfil', [PostController::class, 'index']) -> name('pages.admin.perfil');

/*Route::get('/admin/administradores', function () {
    return view('pages.admin.admin');
});*/



//PRUEBAS DE BACKEND:
Route::get('/', [HomeController::class, 'index']) -> name ('home');

//Route::get('/home', [HomeController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']) -> name('posts.index');

//Route::get('/posts/create', [PostController::class, 'createPost']);
Route::get('/create/posts', [PostController::class, 'createPost']) -> name('posts.create');

//Route::post('/posts', [PostController::class, 'store']);
Route::post('/posts', [PostController::class, 'store']) -> name('posts.store');

Route::get('/posts/{post}', [PostController::class, 'show']);

Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

Route::put('/posts/{post}', [PostController::class, 'update']);

Route::get('/posts/{post}/remove', [PostController::class, 'deleteForm']);

Route::delete('/posts/{post}', [PostController::class, 'destroy']);


//ADMINISTRADOR:
Route::get('/admin/administradores', [AdminController::class, 'index']) -> name('pages.admin.admin');   //Muestra los datos de los admnistradores

Route::put('/admin/administradores/{admin}', [AdminController::class, 'update']) -> name('pages.admin.update');   //Actualiza los datos de los admnistradores

Route::get('/admin/usuarios', [UserController::class, 'index']) -> name('pages.admin.users');           //Muestra los datos de los usuarios

Route::get('/admin/configuracion', [AdminController::class, 'config']) -> name('pages.admin.settings');     //Muestra la configuracion del administrador

Route::get('/admin/perfil', [AdminController::class, 'showProfile']) -> name('pages.admin.perfil');     //Muestra el perfil del administrador

Route::get('/admin/all_users', [AllUsersController::class, 'index']) -> name('pages.admin.allusers');  //Muestra el perfil de los usuarios/admnistradores

Route::get('/admin/archivo', [FileController::class, 'index']) -> name('pages.admin.files');            //Muestra los archivos guardados en el sistema

//USUARIOS:
?>
