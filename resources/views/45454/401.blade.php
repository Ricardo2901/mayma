<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401: Access Denied</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div style="background-image: url('{{ asset('images/4011.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
        <br><br>
        <div class="ms-0" style="width: 45%; height: 20%; text-align: center; color: #fff; background-position: rigth;">
            <h1>Error 401: Acceso no Autorizado</h1>
            <p>"Has llegado a la entrada de un refugio escondido en el bosque, pero no tienes la llave correcta."</p>
            <p>Para acceder a esta zona, necesitas estar autenticado.
            Es posible que tu sesión haya expirado, o que simplemente no hayas iniciado sesión aún. Por favor, 
            <a href="{{ url('/') }}" style="color: #fff; text-decoration: underline;">inicia sesion</a> para continuar.</p>
        </div>
    </div>

    <style>
    p {
        line-height: 1.3;
    }
    </style>

</body>
</html>