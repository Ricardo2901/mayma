<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="background-image: url('{{ asset('images/notFound2.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
        <br><br>
        <div class="mx-auto" style="width: 45%; height: 20%; text-align: center;">
            <h1>Error 404: Pagina No Encontrada</h1>
            <p>Lo sentimos, la página que estás buscando no existe o ha sido movida.
            Por favor, verifica la URL o vuelve a la <a href="javascript:history.back()" style="color:rgb(59, 66, 77); text-decoration: underline;">página anterior</a> 
            o a la 
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