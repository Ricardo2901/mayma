<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//CONTROLADORES:
use App\Http\Controllers\HomeController;        //Login
use App\Http\Controllers\LoginController;       //Controlador de Login
use App\Http\Controllers\PostController;        //Controlador de Posts
use App\Http\Controllers\AdminController;       //Controlador de Administradores
use App\Http\Controllers\UserController;        //Controlador de Usuarios
use App\Http\Controllers\FileController;        //Controlador de Archivos
use App\Http\Controllers\AllUsersController;    //Controlador de Usuarios: Admnistradores/Usuarios
use App\Http\Controllers\ExcelExportController; //Controlador de Excel
use Illuminate\Support\Facades\Route;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//MODELOS:
use App\Models\User;
use App\Models\Admin;       //Modelo de Administradores
use App\Models\Post;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//GLOBAL:
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



/*Route::get('/login', [HomeController::class, 'index']) -> name('login'); //Ruta para el login

Route::post('/authenticate', [LoginController::class, 'authenticate']) -> name('authenticate'); //Ruta para el login

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');*/

// Rutas protegidas por autenticación
/*Route::middleware('auth')->group(function () {
    Route::get('/admin/administradores', function () {
        return view('admin.dashboard');
    })->name('pages.admin.admin');

    Route::get('/admin/administradores', function () {
        return view('editor.dashboard');
    })->name('pages.admin.editor');

    Route::get('/admin/administradores', function () {
        return view('viewer.dashboard');
    })->name('pages.admin.viewer');
});*/

Route::get('/prueba', function () {
    return view('user');
});



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//PRUEBAS DE FRONTEND:

//Route::get('/admin/perfil', [PostController::class, 'index']) -> name('pages.admin.perfil');

/*Route::get('/admin/administradores', function () {
    return view('pages.admin.admin');
});*/


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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

Route::get('/excel', [ExcelExportController::class, 'export']) -> name('pages.admin.excel');    //Crea el archivo de Excel


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ADMINISTRADOR:
Route::middleware(['auth:admin']) -> group(function  () {

    Route::get('/admin/administradores', [AdminController::class, 'index']) -> name('pages.admin.admin');   //Muestra los datos de los admnistradores

    Route::post('/admin/administradores', [AdminController::class, 'created']) -> name('pages.admin.admin.create');   //Crea un nuevo admnistrador

    Route::put('/admin/administradores/{admin}', [AdminController::class, 'update']) -> name('pages.admin.admin.update');   //Actualiza los datos de los admnistradores

    Route::delete('/admin/administradores/{admin}', [AdminController::class, 'delete']) -> name('pages.admin.admin.delete');   //Muestra el formulario para eliminar un admnistrador

    Route::get('/admin/usuarios', [UserController::class, 'index']) -> name('pages.admin.users');           //Muestra los datos de los usuarios

    Route::post('/admin/usuarios', [UserController::class, 'created']) -> name('pages.admin.users.create');   //Crea un nuevo usuario

    Route::put('/admin/usuarios/{user}', [UserController::class, 'updateAdmin']) -> name('pages.admin.users.update');   //Actualiza los datos de los usuarios

    Route::delete('/admin/usuarios/{user}', [UserController::class, 'delete']) -> name('pages.admin.users.delete');   //Muestra el formulario para eliminar un usuario

    Route::get('/admin/configuracion', [AdminController::class, 'config']) -> name('pages.admin.settings');     //Muestra la configuracion del administrador

    Route::get('/admin/perfil', [AdminController::class, 'showProfile']) -> name('pages.admin.perfil');     //Muestra el perfil del administrador

    Route::get('/admin/acerca', [AdminController::class, 'showVersion']) -> name('pages.admin.version');     //Muestra la configuracion del usuario

    Route::get('/admin/all_users', [AllUsersController::class, 'index']) -> name('pages.admin.allusers');  //Muestra el perfil de los usuarios/admnistradores

    Route::get('/admin/excel', [ExcelExportController::class, 'export']) -> name('pages.admin.excel');    //Crea el archivo de Excel

    Route::get('/admin/archivo', [FileController::class, 'indexAdmin']) -> name('pages.admin.files');            //Muestra los archivos guardados en el sistema

    Route::post('/admin/archivo', [FileController::class, 'uploadFile']) -> name('pages.admin.files.created');   //Crea un nuevo archivo

    Route::delete('/admin/archivo/{id}', [FileController::class, 'deleteFile']) -> name('pages.admin.files.delete');   //Elimina un archivo

});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//USUARIOS:
Route::middleware(['auth:web']) -> group(function () {

    Route::get('/user/home', [HomeController::class, 'index']) -> name('pages.users.home');                 //Ruta para el home de los usuarios

    Route::get('/user/archivo', [FileController::class, 'indexUsers']) -> name('pages.users.files');            //Muestra los archivos guardados en el sistema

    Route::post('/user/archivo', [FileController::class, 'uploadFile']) -> name('pages.users.files.created');   //Crea un nuevo archivo

    Route::delete('/user/archivo/{id}', [FileController::class, 'deleteFile']) -> name('pages.users.files.delete');   //Elimina un archivo

    Route::get('/user/perfil', [UserController::class, 'showProfile']) -> name('pages.users.perfil');     //Muestra el perfil del usuario

    Route::get('/user/acerca', [UserController::class, 'showVersion']) -> name('pages.users.version');     //Muestra la configuracion del usuario

    Route::put('/user/{user}', [UserController::class, 'update']) -> name('pages.users.update');   //Actualiza los datos de los usuarios

});

?>
