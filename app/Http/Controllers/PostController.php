<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $post = Post::orderBy('id', 'desc') -> paginate(20);
        //$post = Post::all();
        //return $post;
        return view('pages.admin.admin', compact('post'));
        
    }

    public function show($post) {
        $post = Post::find($post);

        //return $post;
        return view ('posts.show', compact('post'));
        //return view('show', [
            //'post' => 'postal para hackear el sistemac',
        //]);
    }

    public function createPost() {
        return view ('posts.create');

    }

    public function store(Request $request) {
        //return $request -> all();     //se necesita lo que viene arriba
        //return request() -> all();    //de forma mas directa
        $post = new Post();

        $post -> title = $request -> title;
        $post -> asunto = $request -> asunto;
        $post -> body = $request -> body;
        $post -> save();

        return redirect('/posts');
    }

    public function edit($post) {
        $post = Post::find($post);
        return view ('posts.update', compact('post'));
    }

    public function update(Request $request, $post) {
        $post = Post::find($post);

        $post -> title = $request -> title;
        $post -> asunto = $request -> asunto;
        $post -> body = $request -> body;
        $post -> save();

        //return redirect('/posts'); 

        //return "Actualizacion de datos satisfactoriamente: {$post}";

        return redirect('/posts/' . $post -> id);
    }

    public function deleteForm($post) {
        $post = Post::find($post);
        return view ('posts.delete', compact('post'));
    }

    public function destroy($post) {
        $post = Post::findOrFail($post);
        $post -> delete();

        return redirect('/posts');
        //return "Eliminacion de datos satisfactoriamente: {$post -> id}";
        //return redirect() -> route('posts.user') -> with ('success', 'Datos eliminados correctamente');
    }
}
