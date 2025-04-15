<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar los datos</title>
</head>
<body>
    <a href="/posts/{{ $post -> id }}">
        Regresar
    </a>
    <form action="/posts/{{$post -> id}}" method="POST">
        @csrf   <!-- Token de autenticidad -->
        @method('DELETE')  <!-- Uso del metodo para poder actulizar los datos -->
        <h3>Estas seguro de eliminar estos datos</h3>
        <input type="hidden" name="title" value="{{ $post -> title }}">
        <button type="submit">Eliminar datos</button>
    </form>

    

</body>
</html>