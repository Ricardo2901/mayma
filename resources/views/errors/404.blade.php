<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404: No Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div style="background-image: url('{{ asset('images/4042.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
        <br><br>
        <div class="mx-auto" style="width: 45%; height: 20%; text-align: center;">
            <h1>Error 404: Pagina No Encontrada</h1>
            <p>La carretera se pierde en el polvoriento desierto, donde el horizonte es incierto y el camino se desvanece. Quizás este no era el sendero correcto. 
                Si deseas continuar, puedes volver al
            <a href="javascript:history.back()" style="color:rgb(59, 66, 77); text-decoration: underline;"> lugar anterior </a> 
            o al
            <a href="{{ url('/') }}" style="color:rgb(60, 75, 97); text-decoration: underline;"> lugar de inicio</a>.</p>
        </div>
    </div>

    <style>
    p {
        line-height: 1.3;
    }
    </style>
</body>
</html>