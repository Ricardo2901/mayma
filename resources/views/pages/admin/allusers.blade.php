<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <title>Todos los Usuarios</title>
</head>
<body>
    <x-navbar></x-navbar>
    <br>
    <br>
    <br>
    <!-- Contenido de la página -->
    <h1 class="h1" style="margin-left: 2.5%;">Todos los Usuarios</h1><br>
    <div class="mx-auto" style="width: 95%;">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarDatos">Agregar Usuario</button><br><br>
        <!-- Tabla de usuarios -->   
        <table id="example" class="table table-striped" style="width:100%;">
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Nombre de Usuario</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Ultima vez</th>
                    <th>Estatus</th>
                    <th><center>Acciones</center></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allUser as $allUsers)
                <tr>
                    <td>{{ $allUsers -> avatar}}</td>
                    <td>{{ $allUsers -> username }}</td>
                    <td>{{ $allUsers -> name }}</td>
                    <td>{{ $allUsers -> email }}</td>
                    <td>{{ $allUsers -> last_login }}</td>
                    <td>{{ $allUsers -> is_active == 1 ? 'Activo' : 'Inactivo' }}</td>
                    <!-- Botones de acción para editar, eliminar y ver datos -->
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
                            ...
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
    </div>
    <!-- Modal para eliminar los datos -->
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
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para agregar datos -->
    <div class="modal fade" id="agregarDatos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Datos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>En proceso...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

    <!-- Interruptor del modo oscuro/claro -->
    <x-colortheme></x-colortheme>

    <!-- Scripts para el funcionamiento de la tabla y de las animaciones -->
    <x-script></x-script>

    <!-- Activar tabla / Funcionamientos de la tabla -->
    <script>
    $(document).ready(function () {
        $('#example').DataTable({
            responsive: true,
            dom: '<"row mb-3"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                '<"row"<"col-sm-12"tr>>' +
                '<"row mt-3"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
    </script>
</body>
</html>