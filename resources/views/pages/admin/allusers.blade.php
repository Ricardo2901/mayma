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
                    <th>Estatus</th>
                    <th>Ultima vez</th>
                    <th>En Linea...</th>
                    <th><center>Acciones</center></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allUser as $allUsers)
                <tr>
                    <td>{{ $allUsers -> avatar}}</td>
                    <td>{{ $allUsers -> username }}</td>
                    <td>{{ $allUsers -> name }}</td>
                    <td>{{ $allUsers -> rol }}</td>
                    <td>{{ $allUsers -> last_login }}</td>
                    <td>{{ $allUsers -> is_active == 1 ? 'Activo' : 'Inactivo' }}</td>
                    <!-- Botones de acción para editar, eliminar y ver datos -->
                    <td><center>
                        @if($allUsers -> type_user == 'admin')
                            <button type="button" class="btn btn-warning btn-editar" data-bs-toggle="modal" data-bs-target="#editarDatos{{ $allUsers -> rol }}{{ $allUsers -> id}}">Editar</button> | 
                            <button type="button" class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#eliminarDatos{{ $allUsers -> rol }}{{ $allUsers -> id}}">Eliminar</button> |
                        
                        @else
                            <button type="button" class="btn btn-warning btn-editar" data-bs-toggle="modal" data-bs-target="#editarDatos{{ $allUsers -> rol }}{{ $allUsers -> id}}">Editar</button> | 
                            <button type="button" class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#eliminarDatos{{ $allUsers -> rol }}{{ $allUsers -> id}}">Eliminar</button> | 
                        
                        @endif    
                            <button type="button" class="btn btn-info btn-ver" data-bs-toggle="modal" data-bs-target="#verDatos{{  $allUsers -> username }}">Ver</button>
                    </center></td>
                </tr>

                <!-- Modal para ver los datos -->
                <div class="modal fade" id="verDatos{{ $allUsers -> username }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Acerca de... </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label for="inputPassword5" class="form-label">Usuario</label>
                                <input class="form-control" value="{{ $allUsers -> username }}" type="text" placeholder="Default input" aria-label="default input example" disabled>
                                <label for="inputPassword5" class="form-label">Nombre</label>
                                <input class="form-control" value="{{ $allUsers -> name }}" type="text" placeholder="Default input" aria-label="default input example" disabled>
                                <label for="inputPassword5" class="form-label">Correo</label>
                                <input class="form-control" value="{{ $allUsers -> email }}" type="text" placeholder="Default input" aria-label="default input example" disabled>
                                <label for="inputPassword5" class="form-label">Fecha de Creacion</label>
                                <input class="form-control" value="{{ \Carbon\Carbon::parse($allUsers -> created_at) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($allUsers -> created_at) -> format('H:i') }}" type="text" placeholder="Default input" aria-label="default input example" disabled>
                                <label for="inputPassword5" class="form-label">Fecha de Actualizacion</label>
                                <input class="form-control" value="{{ \Carbon\Carbon::parse($allUsers -> created_at) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($allUsers -> created_at) -> format('H:i') }}" type="text" placeholder="Default input" aria-label="default input example" disabled>
                                <label for="inputPassword5" class="form-label">Ultima Vez</label>
                                <input class="form-control" value="{{ $allUsers -> last_login}}" type="text" placeholder="Default input" aria-label="default input example" disabled>
                                <label for="inputPassword5" class="form-label">En Linea...</label>
                                <input class="form-control" value="{{ $allUsers -> is_active == 1 ? 'Activo' : 'Inactivo' }}" type="text" placeholder="Default input" aria-label="default input example" disabled>
                                <label for="inputPassword5" class="form-label">Rol</label>
                                <input class="form-control" value="{{ $allUsers -> rol}}" type="text" placeholder="Default input" aria-label="default input example" disabled>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-eliminar" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                <!-- Modales en caso de que sea Administrador -->
                <!-- Modal para editar los datos -->
                <div class="modal fade" id="editarDatos{{ $allUsers -> rol}}{{ $allUsers -> id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Acceso Restringido</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Esta funcion esta restringida. Por favor, ir al apartado para hacer alguna actualizacion de datos.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-eliminar" data-bs-dismiss="modal">Cerrar</button>
                                @if($allUsers -> type_user == 'admin')
                                    <form action="{{ route('pages.admin.admin') }}" method="GET">
                                        <button type="submit" class="btn btn-success">Administradores</button>
                                    </form>
                                @elseif($allUsers -> type_user == 'user')
                                    <form action="{{ route('pages.admin.users') }}" method="GET">
                                        <button type="submit" class="btn btn-primary">Usuarios</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para eliminar los datos -->
                <div class="modal fade" id="eliminarDatos{{ $allUsers -> rol }}{{ $allUsers -> id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Acceso Restringido</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Esta funcion esta restringida. Por favor, ir al apartado para eliminar estos datos.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-eliminar" data-bs-dismiss="modal">Cerrar</button>
                                @if($allUsers -> type_user == 'admin')
                                    <form action="{{ route('pages.admin.admin') }}" method="GET">
                                        <button type="submit" class="btn btn-success">Administradores</button>
                                    </form>
                                @elseif($allUsers -> type_user == 'user')
                                    <form action="{{ route('pages.admin.users') }}" method="GET">
                                        <button type="submit" class="btn btn-primary">Usuarios</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach 
            </tbody>  
        </table>
    </div>
    
    <!-- Modal para agregar datos -->
    <div class="modal fade" id="agregarDatos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Acceso Restringido</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Esta funcion esta restringida. Por favor, ir al apartado para agregar un usuario.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Admnistradores</button>
                    <button type="button" class="btn btn-primary">Usuarios</button>
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