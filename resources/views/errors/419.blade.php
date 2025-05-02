<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404: No Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div style="background-image: url('{{ asset('images/4042.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
        <br><br>
        <div class="mx-auto" style="width: 45%; height: 20%; text-align: center;">
            <h1>Error 419: Sesión Expirada</h1>
            <p>Parece que no has interactuado con el sitio durante un tiempo, y por razones de seguridad tu sesión se ha cerrado.
            Por favor,
            <a href="{{ url('/login') }}" style="color:rgb(60, 75, 97); text-decoration: underline;"> incia sesión </a>
            nuevamente para continuar. </p>
        </div>
    </div>

    <style>
    p {
        line-height: 1.0;
    }
    </style>
</body>
</html>