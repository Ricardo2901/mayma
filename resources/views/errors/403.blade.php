
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403: Forbbiden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div style="background-image: url('{{ asset('images/4030.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
        <br><br>
        <div class="mx-auto" style="width: 45%; height: 20%; text-align: center;">
            <h1>Error 403: Acceso Prohibido</h1>
            <p>El sendero se encuentra bloqueado por una puerta cerrada, y sin la llave adecuada, no puedes avanzar. 
            Esta zona está fuera de tu alcance. Si crees que esto es un error, asegúrate de tener los permisos adecuados 
            o vuelve a la <a href="javascript:history.back()" style="color:rgb(59, 66, 77); text-decoration: underline;">página anterior.</a><br>
            <a href="{{ url('/') }}" style="color:rgb(60, 75, 97); text-decoration: underline;">página principal</a>.</p>
        </div>
    </div>

    <style>
    p {
        line-height: 1.0;
    }
    </style>
</body>
</html>