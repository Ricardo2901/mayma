<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('pages.admin.files.created') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombreArchivo">Archivo</label>
            <input type="file" class="form-control" id="nombreArchivo" name="file" placeholder="Nombre del Archivo">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</body>
</html>