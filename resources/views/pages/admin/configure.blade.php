
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuracion</title>
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

    h1 {
        margin-left: 100px; /* Quita el centrado */
    }
</style>


    
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div>
        <x-navbar>
            <!-- Aquí puedes agregar contenido adicional dentro del componente de la barra de navegación -->
        </x-navbar>
        
    </div>
    <br>
    <br>
    <br>
    <h1>Configuración</h1>
    <ul class="centrar">
        <li><span class="label">📛 Cuenta de Usuario</span></li>
        <li><span class="label">📦 Apariencia:</span></li>
        <li><span class="label">📝 Notificaciones:</span></li>
        <li><span class="label">👤 Almacenamiento:</span></li>
        <li><span class="label">📄 Funciones del Sistema:</span></li>
        <li><span class="label">🛠 Acerca de la Aplicación:</span></li>
    </ul>
    <br><br>
    <x-colortheme>
            <!-- Este es el interior del componente de cambio de tema -->
    </x-colortheme>
    <x-completeFooter></x-completeFooter>
    <x-script></x-script>
</body>
</html>
