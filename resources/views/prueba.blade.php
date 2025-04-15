<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //Uso de las librerias
        /*use Illuminate\Support\Facades\Route;
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
        /*$post = Post::find(1);
        return $post -> is_active;
        echo $post -> is_active;
        return $post -> published_at -> format('d/m/Y');
        //echo $post -> published_at -> diffForHumans();*/

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ?>


</body>
</html> -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tailwind desde CDN</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-blue-600">¡Hola desde Tailwind CDN!</h1>
        <p class="mt-2 text-gray-700">Esto está funcionando sin instalación local.</p>
    </div>
</body>
</html>
