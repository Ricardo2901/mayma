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
    <form action="/posts">
        <h3>Estas seguro de elimminar estos datos</h3>
        <button type="submit"></button>
    </form>
</body>
</html>