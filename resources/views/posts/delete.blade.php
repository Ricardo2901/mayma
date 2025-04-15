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

    <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden;">
        <iframe 
            src="https://www.youtube.com/embed/kTHNpusq654" 
            frameborder="0" 
            allowfullscreen 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            style="position:absolute; top:0; left:0; width:100%; height:100%;">
        </iframe>
    </div>

</body>
</html>