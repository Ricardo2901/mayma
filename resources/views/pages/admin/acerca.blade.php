
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
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
        <x-colortheme>
            <!-- Este es el interior del componente de cambio de tema -->
        </x-colortheme>
    </div>
    <br>
    <br>
    <br>
    <h1>Acerca de la Aplicación</h1>
    <ul class="centrar">
        <li><span class="label">📛 Nombre:</span> Gestor de Archivos</li>
        <li><span class="label">📦 Versión:</span> v1.0.0</li>
        <li><span class="label">📝 Descripción:</span> Aplicación para gestionar archivos.</li>
        <li><span class="label">👤 Autor:</span> Ricardo Blanco</li>
        <li><span class="label">📄 Licencia:</span> MIT</li>
        <li><span class="label">🛠 Tecnologías:</span> Laravel, MySQL, Bootstrap</li>
        <li><span class="label">🔐 Seguridad:</span> Autenticación con Laravel Breeze, protección CSRF y validación de formularios.</li>
        <li><span class="label">📚 Documentación:</span> <a class="a" href="/docs" target="_blank">Ver documentación</a></li>
        <li><span class="label">🙋 Usado por:</span> Actual Usuario</li>
    </ul>
    <br><br>
    <x-footer></x-footer>
    <x-script></x-script>
</body>
</html>
