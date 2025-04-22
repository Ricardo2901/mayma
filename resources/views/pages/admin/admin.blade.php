<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <x-navbar></x-navbar>
    <br>
    <br>
    <br>
    <h1 class="h1" style="margin-left: 2.5%;">Administradores</h1>
    <br>
    <table class="table table-bordered mx-auto" style="width: 95%;">
        <thead>
            <tr>
                <th scope="col">Usuario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
                <th scope="col">Estado</th>
                <th scope="col"><center>Acciones</center></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admin as $admins)
                <tr>
                    <td>{{ $admins -> username }}</td>
                    <td>{{ $admins -> name }}</td>
                    <td>{{ $admins -> email }}</td>
                    <td>{{ $admins -> role }}</td>
                    <td>{{ $admins -> is_active == 1 ? 'Activo' : 'Inactivo' }}</td>
                    <td><center>
                        <button type="button" class="btn btn-warning btn-editar" data-bs-toggle="modal" data-bs-target="#editarDatos">Editar</button> | 
                        <button type="button" class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#eliminarDatos">Eliminar</button> | 
                        <button type="button" class="btn btn-info btn-ver" data-bs-toggle="modal" data-bs-target="#verDatos">Ver</button>
                    </center></td>
                </tr>
            @endforeach
        </tbody>
        <!-- Modal para editar los datos -->
        <div class="modal fade" id="editarDatos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Datos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        En progreso ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-eliminar" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary btn-azul">Actualizar Datos</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para ver los datos -->
        <div class="modal fade" id="verDatos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Acerca de... </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-eliminar" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="eliminarDatos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Advertencia!!!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estas seguro de eliminar estos datos?
                    Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <x-colortheme></x-colortheme>
    <x-script></x-script>
</body>
</html>