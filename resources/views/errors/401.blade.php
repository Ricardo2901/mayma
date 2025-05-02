<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="background-image: url('{{ asset('images/4010.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
        <br><br>
        <div class="mx-auto" style="width: 45%; height: 20%; text-align: center;">
            <h1>Error 401: Acceso no Autorizado</h1>
            <p>"Has llegado a la entrada de un refugio escondido en el bosque, pero no tienes la llave correcta."</p>
            <p>Para acceder a esta zona, necesitas estar autenticado.
            Es posible que tu sesión haya expirado, o que simplemente no hayas iniciado sesión aún. Por favor, 
            <a href="{{ url('/') }}" style="color:rgb(60, 75, 97); text-decoration: underline;">inicia sesion</a> para continuar.</p>
        </div>
    </div>

    <style>
    p {
        line-height: 1.0;
    }
    </style>

</body>
</html>