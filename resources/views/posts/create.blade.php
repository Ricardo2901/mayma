<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Aqui se generan los datos hacia la base de datos:</h1>
    <form action="/posts" method="POST">
        @csrf   <!-- Token de autenticidad-->

        <label for="">
            Titulo
            <input type="text" name="title">
        </label>

        <br><br>

        <label for="">
            Asunto
            <input type="text" name="asunto">
        </label>

        <br><br>

        <label for="">
            Cuerpo
            <input type="text" name="body">
        </label>

        <br>
        <br>

        <button type="submit">Subir datos<button>
    </form>
</body>
</html>