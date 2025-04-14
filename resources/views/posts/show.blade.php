<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/posts/">Regrasar al index</a>
    <h1>Titulo: {{ $post -> title }}</h1>
    <p>
        <b>Asunto: </b> {{ $post -> asunto}}
    </p>
    <p>{{ $post -> body }}</p>

    <a href="/posts/{{ $post -> id }}/edit">
        Editar el perfil
    </a>
    <br><br>
    <a href="/posts{{ $post -> id }}/remove">
        Eliminar estos datos
    </a>
</body>
</html>