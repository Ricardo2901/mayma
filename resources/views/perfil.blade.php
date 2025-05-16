
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
    .centrar {
        max-width: 600px;
        margin-left: 100px; /* Quita el centrado */
        padding: 20px;
        list-style: none;
        background-color: none;
        border-radius: 8px;
        /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
        font-family: sans-serif;
    }

    .centrar li {
        margin-bottom: 10px;
        line-height: 1.6;
    }

    .label {
        font-weight: bold;
    }

    .a {
        color: #007bff;
        text-decoration: none;
    }

    .a:hover {
        text-decoration: underline;
    }

    .h1 {
        margin-left: 100px; /* Quita el centrado */
    }
</style>


    
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div>
        @php
            $login = null;

            if (Auth::guard('admin')->check()) {
                $login = Auth::guard('admin')->user();
            } elseif (Auth::guard('web')->check()) {
                $login = Auth::guard('web')->user();
            }
        @endphp

        <x-navbar :login="$login" />
        <x-colortheme>
            <!-- Este es el interior del componente de cambio de tema -->
        </x-colortheme>
    </div>
    <br>
    <br>
    <br>
    <h1 class="h1">Acerca del Usuario</h1>
    @if (Auth::guard('web')->check())
    <ul class="centrar">
        <li><img src="{{ asset(Auth::user() -> avatar) }}" alt="Avatar" class="rounded-circle" width="310" height="310"> <!-- Avatar del usuario --></li>
        <br>
        <li><span class="label">Correo:</span> {{ Auth::guard('web') -> user() -> email }}</li>
        <li><span class="label">Nombre:</span> {{ Auth::guard('web') -> user() -> name }}</li>
        <li><span class="label">Nombre de Usuario:</span> {{ Auth::guard('web') -> user() -> username }}</li>
        <li><span class="label">Fecha de creacion:</span> {{ \Carbon\Carbon::parse(Auth::guard('web') -> user() -> created_at) -> format('d / m / Y') }} a las {{ \Carbon\Carbon::parse(Auth::guard('web') -> user() -> created_at) -> format('H:i') }} hrs.</li>
        <li><span class="label">Fecha de actualizacion:</span> {{ \Carbon\Carbon::parse(Auth::guard('web') -> user() -> updated_at) -> format('d / m / Y') }} a las {{ \Carbon\Carbon::parse(Auth::guard('web') -> user() -> updated_at) -> format('H:i') }} hrs.</li>
        <li><span class="label">Rol:</span> {{ Auth::guard('web') -> user() -> rol }}</li>
        <li><span class="label">Estado:</span> {{ Auth::guard('web') -> user() -> is_active == 1 ? 'En Linea' : 'Inactivo'}}</li>       
        <br>
        <br>
        <button type="button" class="btn btn-warning btn-editar" data-bs-toggle="modal" data-bs-target="#editarPerfil">Editar Perfil</button> | 
        <button type="button" class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#eliminarPerfil">Eliminar Perfil</button>
    </ul>

    @elseif (Auth::guard('admin')->check())
    <ul class="centrar">
        <li><img src="{{ asset(Auth::guard('admin') -> user() -> avatar) }}" alt="Avatar" class="rounded-circle" width="310" height="310"> <!-- Avatar del usuario --></li>
        <br>
        <li><span class="label">Correo:</span> {{ Auth::guard('admin') -> user() -> email }}</li>
        <li><span class="label">Nombre:</span> {{ Auth::guard('admin') -> user() -> name }}</li>
        <li><span class="label">Nombre de Usuario:</span> {{ Auth::guard('admin') -> user() -> username }}</li>
        <li><span class="label">Fecha de creacion:</span> {{ \Carbon\Carbon::parse(Auth::guard('admin') -> user() -> created_at) -> format('d / m / Y') }} a las {{ \Carbon\Carbon::parse(Auth::guard('admin') -> user() -> created_at) -> format('H:i') }} hrs.</li>
        <li><span class="label">Fecha de actualizacion:</span> {{ \Carbon\Carbon::parse(Auth::guard('admin') -> user() -> updated_at) -> format('d / m / Y') }} a las {{ \Carbon\Carbon::parse(Auth::guard('admin') -> user() -> updated_at) -> format('H:i') }} hrs.</li>
        <li><span class="label">Rol:</span> {{ Auth::guard('admin') -> user() -> rol }}</li>
        <li><span class="label">Estado:</span> {{ Auth::guard('admin') -> user() -> is_active == 1 ? 'En Linea' : 'Inactivo'}}</li>       
        <br>
        <br>
        <button type="button" class="btn btn-warning btn-editar" data-bs-toggle="modal" data-bs-target="#editarPerfil">Editar Perfil</button> | 
        <button type="button" class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#eliminarPerfil">Eliminar Perfil</button>
    </ul>

    @endif

    <!-- Modal para actualizar los datos -->
    <div class="modal fade" id="editarPerfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Datos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-eliminar" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary btn-azul">Actualizar Datos</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal para eliminar los datos -->
    <div class="modal fade" id="eliminarPerfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Advertencia!!!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estas seguro de eliminar tus datos?
                        Esta acción no se puede deshacer. Volveras a la pagina de inicio.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br><br>
    <x-basicFooter></x-basicFooter>
    <x-script></x-script>

</body>
</html>
