<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Http\Requests\SavePostRequest;

class PostController extends Controller
{

    public function __construct()
{
    $this->middleware('auth', ['except' => ['index', 'show']]);
}


    public function index()
    {
        $posts = Post::get();

        return view('posts.index', ['posts' => $posts]);
    }

    /*
    Esta funcion hace manualmente que resivamos el id de un post de variable
    y luego con findOrFail hacemos que si lo encuentre lo muestre pero sino
    manda un error 404

    public function show($post)
    {
        return Post::findOrFail($post);
    }
    */

    /*Aqui lo haremos con la simplicidad de laravel indicando que resivimos un dato
    tipo post*/

    public function show(Post $post)
    {
        return view('posts.show', ['post'=>$post]);
    }

    public function create()
    {
        return view('posts.create', ['post' => new Post]);
    }

    public function store(SavePostRequest $request)
    {

        /* Esta forma es lo mismo que el create
        $post = new Post;
        $post->title = $request->input('title');
        $post->save();
        */

        Post::Create($request->validated());

        //mensaje de sesion
        //session()->flash('status', 'Post Creado exitosamente c:');

        //Las dos hacen lo mismo, redireccionar a posts.index pero una es mas corta
        //return redirect()->route('posts.index');
        return to_route('posts.index')->with('status', 'Post Creado exitosamente c:');
    }

    public function edit(Post $post){
        return view('posts.edit', ['post' => $post]);
    }

    public function update(SavePostRequest $request , Post $post){

        /* Esto es lo mismo que el update
        $post->title = $request->input('title');
        $post->save();
        */

        $post->update($request->validated());

        /* Aqui se mandaba un menasje de sesion pero es lo mismo que poner el metodo
        with ya que se utiliza para mandar mensagues de sesion
        session()->flash('status', 'Post actualizado.');
        */

        return to_route('posts.show', $post)->with('status', 'PostActulizado');
    }

    public function destroy(Post $post){
        $post->delete();

        return to_route('posts.index')->with('status', 'Post Eliminado');
    }

    //Esta linea generaria las 7 routas del crud
    //Route::resource('posts', PostController::class);
}
