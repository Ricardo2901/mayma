<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/posts/{{ $post -> id }}" method="POST">
        
        @csrf   <!-- Token de autenticidad -->
        @method('PUT')  <!-- Uso del metodo para poder actulizar los datos -->

        <label for="">
            Titulo
            <input type="text" name="title" value="{{ $post -> title}}">
        </label>

        <br><br>

        <label for="">
            Asunto
            <input type="text" name="asunto" value="{{ $post -> asunto }}">
        </label>

        <br><br>

        <label for="">
            Cuerpo
            <input type="text" name="body" value="{{ $post -> body}}">
        </label>

        <br>
        <br>

        <button type="submit">Actualizar datos</button>
    </form>

    <a href="/posts/{{ $post -> id}}">Regresar</a>
</body>
</html>