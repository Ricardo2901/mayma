<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1 class="text-3xl font-bold underline">Lista de Posts</h1>
    <a href="{{ route('posts.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear</a>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Contenido</th>
                <th>Asunto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($post as $posts)
                <tr>
                    <td>{{ $posts -> id }}</td>
                    <td>{{ $posts -> title }}</td>
                    <td>{{ $posts -> body }}</td>
                    <td>{{ $posts -> asunto }}</td>
                    <td><a href="/posts/{{ $posts -> id}}/edit">Editar</a></td>
                    <td><a href="/posts/{{ $posts -> id}}/remove">Eliminar</a></td>
                    <td><a href="/posts/{{ $posts -> id}}">Ver</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $post -> links() }}
</body>
</html>