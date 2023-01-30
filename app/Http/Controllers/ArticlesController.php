<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        $articles = Articles::where('user_id' , auth()->user()->id)->orderBy('id' , 'desc')->paginate(5); //devolvera todos los articles que sean del user_id que este logueado
        return view('MisArticulos' , compact('articles'));

    }


    public function index2(){
        $articles = Articles::with('user')->orderBy('id' , 'desc')->paginate(5);
        return view('dashboard' , compact('articles'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('articulos.create');

        




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([

            'nombre' => ['required' , 'string' , 'min:3' , 'unique:articles,nombre'],
            'descripcion' => ['required' , 'string' , 'min:4'],
            'decimal' => ['required' , 'numeric' , ],
            'imagen'=> ['required' , 'image' , 'max:2048'],
            'stock' => ['required' , 'numeric' , 'min:0']

        ]);


        $img =  $request->imagen->store('articulos'); //Lo guardo en articulos porque es el lugar donde guardo las iamgenes de los articulos



        Articles::create([
            'nombre' =>$request->nombre,
            'slug' => Str::slug($request->nombre),
            'descripcion' =>$request->descripcion,
            'decimal' =>$request->decimal,
            'stock' => $request->stock,
            'imagen' => $img,
            'user_id' =>auth()->user()->id
        ]);


        return redirect()->route('MisArticulos')->with('mensaje', 'Articulo Creado');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $article)
    {
        //
        return view('articulos.mostrar' , compact('article'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $article)
    {
        //
        return view('articulos.edit' , compact('article'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $article)
    {
        //

        $request->validate([

            'nombre' => ['required' , 'string' , 'min:3' , 'unique:articles,nombre,'.$article->id],
            'descripcion' => ['required' , 'string' , 'min:4'],
            'decimal' => ['required' , 'numeric' , ],
            'imagen'=> ['nullable' , 'image' , 'max:2048'],
            'stock' => ['required' , 'numeric' , 'min:0']

        ]);


        $img = ($request->imagen) ? $request->imagen->store('articulos') : $article->imagen;

        //ME guardo en una variable la imagen antigua
        $img1 = $article->imagen;


        $article->update([
            'nombre' => $request->nombre,
            'slug' => Str::slug($request->nombre),
            'descripcion' => $request->descripcion,
            'decimal' => $request->decimal,
            'imagen' => $img,
            'stock' => $request->stock,
            'user_id' => auth()->user()->id
        ]);


        if($request->imagen){
            Storage::delete($img1);
        }


        return redirect()->route('MisArticulos')->with('mensaje' , 'Post Editado');






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $article)
    {
        //

        Storage::delete($article->imagen);

        $article->delete();
        return redirect()->route('MisArticulos')->with('mensaje' , 'Articulo Eliminado');






    }
}
