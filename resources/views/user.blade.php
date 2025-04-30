<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    @if(Auth::check()) <!-- Verifica si hay un usuario autenticado -->
    <p>Bienvenido, {{ Auth::user()->name }}!</p>
    @else
        <p>No has iniciado sesión.</p>
    @endif
    </div>
</body>
</html>