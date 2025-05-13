<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="#" type="image/x-icon">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <title>Archivos</title>
</head>
<body>
    @php
        $login = null;

        if (Auth::guard('admin')->check()) {
            $login = Auth::guard('admin')->user();
        } elseif (Auth::guard('web')->check()) {
            $login = Auth::guard('web')->user();
        }
    @endphp

    <x-navbar :login="$login" />
    <br>
    <br>
    <br>
    <!-- Contenido de la página -->
    <h1 class="h1" style="margin-left: 2.5%;">Archivos</h1><br>
    <div class="mx-auto" style="width: 95%;">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarDatos">Agregar Archivo</button><br><br>
        <!-- Tabla de usuarios -->   
        <table id="example" class="table table-striped" style="width:100%;">
            
            <thead>
                <tr>
                    <th>Nombre del Archivo</th>
                    <th>Formato del archivo</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha de Modificación</th>
                    <th>Autor</th>
                    <th><center>Acciones</center></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($file as $files)
                <tr>
                    <td>{{ pathinfo($files -> name, PATHINFO_FILENAME) }}</td>
                    <td>{{ strtoupper($files -> format) }}</td>
                    <td>{{ \Carbon\Carbon::parse($files -> created_at) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($files -> created_at) -> format('H:i') }} hrs.</td>
                    <td>{{ \Carbon\Carbon::parse($files -> updated_at) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($files -> updated_at) -> format('H:i') }} hrs.</td>
                    <td>{{ $files -> nameuser }}</td>
                    <!-- Botones de acción para editar, eliminar y ver datos -->
                    <td><center>
                        @if ($files -> format == 'pdf')
                        <button type="button" class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#eliminarDatospdf{{ $files -> id}}">Eliminar</button> | 
                        <button type="button" class="btn btn-info btn-ver" data-bs-toggle="modal" data-bs-target="#verDatospdf{{ $files -> id }}">Ver</button>
                        @else
                        <button type="button" class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#eliminarDatospdf{{ $files -> id}}">Eliminar</button> | 
                        <button type="button" class="btn btn-info btn-ver" data-bs-toggle="modal" data-bs-target="#verDatos{{ $files -> id }}">Ver</button>
                        @endif
                    </center></td>
                </tr>

                <!-- Modal para ver los datos -->
                <div class="modal fade" id="verDatospdf{{ $files -> id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Acerca del Archivo </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <iframe src="{{ asset('pdfjs/web/viewer.html') }}?file=/{{ $files -> path }}" width="100%" height="700px"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-eliminar" data-bs-dismiss="modal">Cerrar</button>
                                <a href="{{ asset($files -> path) }}" class="btn btn-primary" download="{{ basename($files -> name) }}">Descargar {{ strtoupper($files -> format) }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para eliminar los datos -->
                <div class="modal fade" id="eliminarDatospdf{{ $files -> id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <form action="{{ route('pages.admin.files.delete', $files -> id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Advertencia!!!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Estas seguro de eliminar este archivo?
                                    Esta acción no se puede deshacer.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>

                <!-- Modal para ver los datos en caso de que no sea PDF -->
                <div class="modal fade" id="verDatos{{ $files -> id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Acerca del Archivo </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Este archivo no se puede visualizar desde el sistema, por favor descargalo para poder verlo.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-eliminar" data-bs-dismiss="modal">Cerrar</button>
                                <a href="{{ asset($files -> path) }}" class="btn btn-primary" download="{{ basename($files -> name) }}">Descargar {{ strtoupper($files -> format) }}</a>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Archivo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pages.admin.files') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Button</button>
                            <input name="file" type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload" multple required>
                        </div>
                        <div>
                            <p>Tamaño permitido: 130 MB</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

    <script>
        function descargarPDF() {
            const pdfUrl = PDFViewerApplication.url; // Esto debe contener la URL del PDF cargado
            const a = document.createElement('a');
            a.href = pdfUrl;
            a.download = 'documento.pdf';
            a.click();
        }
    </script>
</body>
</html>