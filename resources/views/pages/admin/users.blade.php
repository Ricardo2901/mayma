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

    <title>Lista de Usuarios</title>
</head>
<body>
    <x-navbar></x-navbar>
    <br>
    <br>
    <br>
    <!-- Contenido de la página -->
    <h1 class="h1" style="margin-left: 2.5%;">Lista de Usuarios</h1><br>
    <div class="mx-auto" style="width: 95%;">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarDatos">Agregar Usuario</button><br><br>
        <!-- Tabla de usuarios -->   
        <table id="example" class="table table-striped" style="width:100%;">
            <thead>
                <tr>
                    <th><center>Avatar</center></th>
                    <th>Nombre de Usuario</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Ultima vez</th>
                    <th>Estatus</th>
                    <th><center>Acciones</center></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $users)
                <tr>
                    <td><center>
                        <img src="{{ asset($users -> avatar) }}" alt="Avatar" class="rounded-circle" width="40" height="40"> <!-- Avatar del usuario -->
                    </center></td>
                    <td>{{ $users -> username }}</td>
                    <td>{{ $users -> name }}</td>
                    <td>{{ $users -> email }}</td>

                    @if($users -> last_login == null) <!-- Si no hay fecha de que horas cerro sesion -->
                        <td>Sin Acceder</td>
                    @else <!-- Si hay fecha de que horas cerro sesion -->
                        <td>{{ \Carbon\Carbon::parse($users -> last_login) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($users -> last_login) -> format('H:i') }} hrs.</td>
                    @endif

                    <td>{{ $users -> is_active == 1 ? 'Activo' : 'Inactivo' }}</td>
                    <!-- Botones de acción para editar, eliminar y ver datos -->
                    <td><center>
                        <button type="button" class="btn btn-warning btn-editar" data-bs-toggle="modal" data-bs-target="#editarDatos{{ $users -> id}}">Editar</button> | 
                        <button type="button" class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#eliminarDatos{{ $users -> id}}">Eliminar</button> | 
                        <button type="button" class="btn btn-info btn-ver" data-bs-toggle="modal" data-bs-target="#verDatos{{ $users -> id}}">Ver</button>
                    </center></td>
                </tr>

                <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                <!-- Modal para editar los datos -->
                <div class="modal fade" id="editarDatos{{ $users -> id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <form action=" {{ route('pages.admin.users.update', $users -> id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Datos</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label fsor="inputPassword5" class="form-label">Usuario</label>
                                    <input name="username" class="form-control" value="{{ $users -> username }}" type="text" placeholder="Default input" aria-label="default input example">
                                    <label for="inputPassword5" class="form-label">Nombre</label>
                                    <input name="name" class="form-control" value="{{ $users -> name }}" type="text" placeholder="Default input" aria-label="default input example">
                                    <label for="inputPassword5" class="form-label">Contraseña</label>
                                    <input name="password" class="form-control" value="******" type="text" placeholder="Default input" aria-label="default input example">
                                    <label for="inputPassword5" class="form-label">Correo</label>
                                    <input name="email" class="form-control" value="{{ $users -> email }}" type="text" placeholder="Default input" aria-label="default input example">
                                    <label for="inputPassword5" class="form-label">Rol</label>
                                    @if($users -> rol == 'Usuario Nv.1') <!-- Si el usuario es Usuario Nivel 1 -->
                                        <select name="rol" class="form-select" aria-label="Default select example">
                                            <option selected>{{ $users -> rol}}</option>
                                            <option value="Usuario Nv.2">Usuario Nv.2</option>
                                        </select>
                                    @elseif($users -> rol == 'Usuario Nv.2') <!-- Si el usuario es un Usuario de Nivel 2 -->
                                        <select name="rol" class="form-select" aria-label="Default select example">
                                            <option selected>{{ $users -> rol}}</option>
                                            <option value="Usuario Nv.2">Usuario Nv.1</option>
                                        </select>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-eliminar" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary btn-azul">Actualizar Datos</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                <!-- Modal para ver los datos -->
                <div class="modal fade" id="verDatos{{ $users -> id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Acerca de... </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label for="inputPassword5" class="form-label">Usuario</label>
                                <input class="form-control" value="{{ $users -> username }}" type="text" placeholder="Default input" aria-label="default input example" disabled>
                                <label for="inputPassword5" class="form-label">Nombre</label>
                                <input class="form-control" value="{{ $users -> name }}" type="text" placeholder="Default input" aria-label="default input example" disabled>
                                <label for="inputPassword5" class="form-label">Correo</label>
                                <input class="form-control" value="{{ $users -> email }}" type="text" placeholder="Default input" aria-label="default input example" disabled>
                                <label for="inputPassword5" class="form-label">Fecha de Creacion</label>
                                <input class="form-control" value="{{ \Carbon\Carbon::parse($users -> created_at) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($users -> created_at) -> format('H:i') }} hrs." type="text" placeholder="Default input" aria-label="default input example" disabled>
                                <label for="inputPassword5" class="form-label">Fecha de Actualizacion</label>
                                <input class="form-control" value="{{ \Carbon\Carbon::parse($users -> updated_at) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($users -> updated_at) -> format('H:i') }} hrs." type="text" placeholder="Default input" aria-label="default input example" disabled>
                                <label for="inputPassword5" class="form-label">Ultima Vez</label>
                                @if($users -> last_login == null) <!-- Si el usuario no ha accedido -->
                                    <input class="form-control" value="No ha accedido" type="text" placeholder="Default input" aria-label="default input example" disabled>
                                @else <!-- Si el usuario ha accedido -->
                                    <input class="form-control" value="{{ \Carbon\Carbon::parse($allUsers -> last_login) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($allUsers -> last_login) -> format('H:i') }} hrs." type="text" placeholder="Default input" aria-label="default input example" disabled>
                                @endif
                                <label for="inputPassword5" class="form-label">En Linea...</label>
                                <input class="form-control" value="{{ $users -> is_active == 1 ? 'Activo' : 'Inactivo' }}" type="text" placeholder="Default input" aria-label="default input example" disabled>
                                <label for="inputPassword5" class="form-label">Rol</label>
                                <input class="form-control" value="{{ $users -> rol}}" type="text" placeholder="Default input" aria-label="default input example" disabled>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-eliminar" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                <!-- Modal para eliminar los datos -->
                <div class="modal fade" id="eliminarDatos{{ $users -> id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('pages.admin.users.delete', $users -> id) }}" method="POST">
                                @csrf   <!-- Token de autenticidad -->
                                @method('DELETE')  <!-- Uso del metodo para poder actulizar los datos -->
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
                                    <button type="submit" class="btn btn-danger">Eliminar Datos</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach 
            </tbody>
        </table>
    </div>

    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
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