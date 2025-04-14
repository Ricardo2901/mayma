<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Aqui se mostraran los posts:
        @foreach ($post as $posts)
            <li>
                <a href="/posts/{{ $posts -> id}}">
                    {{$posts -> title}}
                </a>
            </li>
        @endforeach
    </h1>
</body>
</html>