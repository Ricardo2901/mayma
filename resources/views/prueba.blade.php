<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //Uso de las librerias
        use Illuminate\Support\Facades\Route;
        use App\Models\User;
        use App\Models\Post;

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Ver los datos
        //$post = new Post;
        //$post = Post::find(1);
        //$post -> get();

        //echo $post;

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Letra de los datos insertados o del texto
        //$post = new Post;
        //$post -> title = strtoupper('TITULO DE PRUEBA');  //Datos en Mayuscula
        //$post -> title = strtolower('titulo de prueba');  //Datos en minuscula
        //$post -> title = ucwords('Titulo De Prueba');     //Datos Capitilizados
        //$post -> title = ucfirst('Titulo de prueba');     //Datos en Primer letra en Mayuscula
        //$post -> body = 'Contenido';
        //$post -> asunto = 'Asunto';

        //return $post;
        
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Crear, Actualizar, Eliminar datos
        /*$id = 1;
        $title = "Title 4";
    
        $post = Post::where('title', $title);  //Para ciertos datos
        $post = Post::find(1);  //Para un dato especifico
    
        $post -> update();  //Actualizar datos
        $post -> delete();  //Eliminar datos
        $post -> save();    //Guardar datos */

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $post = Post::find(1);
        return $post -> is_active;
        echo $post -> is_active;
        return $post -> published_at -> format('d/m/Y');
        //echo $post -> published_at -> diffForHumans();

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////

    ?>

    <p>{{ $post -> is_active}}</p>
    <p>{{ $post -> published_at -> format('d/m/Y') }}</p>
</body>
</html>