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

    <title>Inicio</title>
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
    @if (Auth::guard('admin')->check())
    <div style="margin: 0 auto; width: 82.5%;">
        <h1>Bienvend@: {{ Auth::guard() -> user() -> name }}</h1>
    </div>
    <br>

    <!----------------------------------------------------------------------------------------------------------------------------->
    <!-- Archivos subidos por este usuario -->

    <div class="card mb-3" style="margin: 0 auto; width: 82.5%;">
        <div class="card-body">
            <h4 class="card-title" style="text-align: center" >Archivos subidos por este usuario</h4><br>
            <!-- Archivos Subidos Esta Semana -->
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <!-- Archivos Subidos los ultimos 7 dias -->
                <div class="col d-flex">
                    <div class="card h-100 w-100">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">Archivos Subidos los Últimos 7 dias: {{ $fileCountLast7Days }}</h5><br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Fecha de Subida</th>
                                        <th scope="col">Tipo de Archivo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fileTotalLast7Days as $file)
                                        @if ($fileCountLast7Days == 0)
                                            <tr>
                                                <td colspan="3">No hay archivos subidos en los últimos 7 días.</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $file -> name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($file -> created_at) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($file -> created_at) -> format('H:i') }} hrs.</td>
                                                <td>{{ strtoupper($file -> format)}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Archivos Subidos los Últimos 30 dias -->
                <div class="col d-flex">
                    <div class="card h-100 w-100">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">Archivos Subidos los Últimos 30 dias: {{ $fileCountLast30Days }}</h5><br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Fecha de Subida</th>
                                        <th scope="col">Tipo de Archivo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fileTotalLast30Days as $file)
                                        @if ($fileCountLast30Days == 0)
                                            <tr>
                                                <td colspan="3">No hay archivos subidos en los últimos 30 días.</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $file -> name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($file -> created_at) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($file -> created_at) -> format('H:i') }} hrs.</td>
                                                <td>{{ strtoupper($file -> format)}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <!----------------------------------------------------------------------------------------------------------------------------->
    <!-- Archivos subidos por todos los usuarios -->

    <div class="card mb-3" style="margin: 0 auto; width: 82.5%;">
        <div class="card-body">
            <h4 class="card-title" style="text-align: center" >Archivos subidos por los Usuarios/Administradores</h4><br>
            <!-- Archivos Subidos Esta Semana -->
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <!-- Archivos Subidos los ultimos 7 dias -->
                <div class="col d-flex">
                    <div class="card h-100 w-100">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">Archivos Subidos los Últimos 7 dias: {{ $fileCountLast7DaysTotal }}</h5><br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Fecha de Subida</th>
                                        <th scope="col">Usuario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fileTotalLast7DaysTotal as $file)
                                        @if ($fileCountLast7DaysTotal == 0)
                                            <tr>
                                                <td colspan="3">No hay archivos subidos en los últimos 7 días.</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $file -> name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($file -> created_at) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($file -> created_at) -> format('H:i') }} hrs.</td>
                                                <td>{{ $file -> nameuser }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Archivos Subidos los Últimos 30 dias -->
                <div class="col d-flex">
                    <div class="card h-100 w-100">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">Archivos Subidos los Últimos 30 dias: {{ $fileCountLast30DaysTotal }}</h5><br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Fecha de Subida</th>
                                        <th scope="col">Usuario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fileTotalLast30DaysTotal as $file)
                                        @if ($fileCountLast30DaysTotal == 0)
                                            <tr>
                                                <td colspan="3">No hay archivos subidos en los últimos 30 días.</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $file -> name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($file -> created_at) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($file -> created_at) -> format('H:i') }} hrs.</td>
                                                <td>{{ $file -> nameuser }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!----------------------------------------------------------------------------------------------------------------------------->
    <!-- Usuarios Activos en este momento -->

    <div class="card mb-3" style="margin: 0 auto; width: 82.5%;">
        <div class="card-body">
            <h4 class="card-title" style="text-align: center" >Usuarios/Administradores Activos: {{ $allUserCountActive }}</h4><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nombre del Usuario</th>
                        <th scope="col">Email</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allUserTotalActive as $allUserActive)
                        @if ($allUserCountActive == 0)
                            <tr>
                                <td colspan="4">No hay usuarios activos en este momento.</td>
                            </tr>
                        @else
                            <tr>
                                <td>{{ $allUserActive -> name }}</td>
                                <td>{{ $allUserActive -> email }}</td>
                                @if ($allUserActive -> is_active == 1)
                                    <td>Activo</td>
                                @endif
                                <td>{{ $allUserActive -> rol }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!----------------------------------------------------------------------------------------------------------------------------->
    <!-- Usuarios que accedieron en un tiempo pasado -->

    <div class="card mb-3" style="margin: 0 auto; width: 82.5%;">
        <div class="card-body">
            <h4 class="card-title" style="text-align: center" >Ultima vez de los usuarios</h4><br>
            <!-- Usuarios activos las ultimas 24 horas -->
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col d-flex">
                    <div class="card h-100 w-100">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">Usuarios que accedieron las ultimas 24 horas: {{ $allUserLastLoginCount }}</h5><br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Última vez</th>
                                        <th scope="col">Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allUserLastLoginTotal as $file)
                                            <tr>
                                                <td>{{ $file -> name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($file -> last_login) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($file -> last_login) -> format('H:i') }} hrs.</td>
                                                <td>{{ $file -> rol}}</td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Usuarios activos los ultimos 7 dias -->
                <div class="col d-flex">
                    <div class="card h-100 w-100">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">Usuarios activos los ultimos 7 dias: {{ $allUserLastLoginCount7Days }}</h5><br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Última vez</th>
                                        <th scope="col">Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allUserLastLoginTotal7Days as $file)
                                        @if ($allUserLastLoginCount7Days == 0)
                                            <tr>
                                                <td colspan="3">No hay usuarios activos en los últimos 7 días.</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $file -> name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($file -> last_login) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($file -> last_login) -> format('H:i') }} hrs.</td>
                                                <td>{{ $file -> rol }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Usuarios activos los ultimos 30 dias -->
                <div class="col d-flex">
                    <div class="card h-100 w-100">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">Usuarios activos los ultimos 30 dias: {{ $allUserLastLoginCount30Days }}</h5><br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Última vez</th>
                                        <th scope="col">Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allUserLastLoginTotal30Days as $file)
                                        @if ($allUserLastLoginCount30Days == 0)
                                            <tr>
                                                <td colspan="3">No hay usuarios activos en los últimos 30 días.</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $file -> name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($file -> last_login) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($file -> last_login) -> format('H:i') }} hrs.</td>
                                                <td>{{ $file -> rol }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Usuarios activos hace una hora -->
                <div class="col d-flex">
                    <div class="card h-100 w-100">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">Usuarios activos hace una hora: {{ $allUserLastLoginCount1Hour }}</h5><br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Última vez</th>
                                        <th scope="col">Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allUserLastLoginTotal1Hour as $file)
                                        @if ($allUserLastLoginCount1Hour == 0)
                                            <tr>
                                                <td colspan="3">No hay usuarios activos en la última hora.</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $file -> name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($file -> last_login) -> format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($file -> last_login) -> format('H:i') }} hrs.</td>
                                                <td>{{ $file -> rol }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Interruptor del modo oscuro/claro -->
    <x-colortheme></x-colortheme>

    <!-- Scripts para el funcionamiento de la tabla y de las animaciones -->
    <x-script></x-script>
</body>
</html>