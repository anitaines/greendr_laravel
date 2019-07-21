<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $articulos = Article::all()->shuffle();
    // dd($articulos);

    return view("/index", compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('formulario_subida');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
        'name' => ['required', 'string', 'max:255'],
        'nomenclature' => ['required', 'string', 'max:255'],
        'category_id' => ['required', 'integer'],
        'description' => ['required', 'string', 'max:255'],
        'image1' => ['required','file', 'image', 'max:2048'],
        'image2' => ['nullable', 'file', 'image', 'max:2048'],
        'image3' => ['nullable', 'file', 'image', 'max:2048'],
        ];
      $messages = [
        'required' => 'El campo :attribute debe estar completo.',
        'string' => 'El campo :attribute no debe tener caracteres especiales.STRING',
        'max' => 'El campo :attribute debe tener :max caracteres como máximo',
        'file' =>  'Error en la carga del archivo. Por favor volver a subir.',
        'image' => 'El archivo de la imagen solo puede ser jpeg, png o bmp.',
        'image1.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
        'image2.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
        'image3.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
      ];

      $this->validate($request, $rules, $messages);

      $articulo= new Article; //crear instancia de la clase.
      //Asignar datos al objeto.

      $ruta1 = $request->image1->store("public/articulos");
      $nombreArchivo1 = basename($ruta1);

      if ($request->image2) {
        $ruta2 = $request->image2->store("public/articulos");
        $nombreArchivo2 = basename($ruta2);
      }else {
        $nombreArchivo2 = null;
      }

      if ($request->image3) {
        $ruta3 = $request->image3->store("public/articulos");
        $nombreArchivo3 = basename($ruta3);
      }else {
        $nombreArchivo3 = null;
      }

      $articulo->name = strtoupper($request->name);
      $articulo->nomenclature = $request->nomenclature;
      $articulo->category_id = $request->category_id;
      $articulo->description = $request->description;
      $articulo->image1 = $nombreArchivo1;
      $articulo->image2 = $nombreArchivo2;
      $articulo->image3 = $nombreArchivo3;
      $articulo->user_id = Auth::user()->id;


      //Guardar el objeto en db. Revisar que el modelo tenga $guarded o $fillable
      $articulo->save(); //save() también sirve para hacer actualización.

      return redirect('/editar_mis_articulos');

      // dd($request, $articulo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $articulo = Article::find($id);
      // dd($articulo);
      $descripcion = explode("\n",$articulo->description);
        return view("/articulo", compact('articulo', 'descripcion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    // public function edit(Article $article)
    {
        ///editar_articulo/{id}
      $articulo = Article::find($id);
      return view("/editar_articulo", compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
// dd($id);
      $rules = [
        'name' => ['required', 'string', 'max:255'],
        'nomenclature' => ['required', 'string', 'max:255'],
        'category_id' => ['required', 'integer'],
        'description' => ['required', 'string', 'max:255'],
        'image1' => ['file', 'image', 'max:2048'],
        'image2' => ['nullable', 'file', 'image', 'max:2048'],
        'image3' => ['nullable', 'file', 'image', 'max:2048'],
        ];
      $messages = [
        'required' => 'El campo :attribute debe estar completo.',
        'string' => 'El campo :attribute no debe tener caracteres especiales.STRING',
        'max' => 'El campo :attribute debe tener :max caracteres como máximo',
        'file' =>  'Error en la carga del archivo. Por favor volver a subir.',
        'image' => 'El archivo de la imagen solo puede ser jpeg, png o bmp.',
        'image1.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
        'image2.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
        'image3.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
      ];

      $this->validate($request, $rules, $messages);

      $articulo = Article::find($id);

      // dd($request,$article);

      if ($request->image1) {
        $ruta1 = $request->image1->store("public/articulos");
        $nombreArchivo1 = basename($ruta1);
      }else {
        $nombreArchivo1 = $articulo->image1;
      }

      if ($request->image2) {
        $ruta2 = $request->image2->store("public/articulos");
        $nombreArchivo2 = basename($ruta2);
      }elseif($request->delete_image_2 == "yes"){
        $nombreArchivo2 = null;
      } else {
        $nombreArchivo2 = $articulo->image2;
      }

      if ($request->image3) {
        $ruta3 = $request->image3->store("public/articulos");
        $nombreArchivo3 = basename($ruta3);
      }elseif($request->delete_image_3 == "yes"){
        $nombreArchivo3 = null;
      } else {
        $nombreArchivo3 = $articulo->image3;
      }

      $articulo->name = strtoupper($request->name);
      $articulo->nomenclature = $request->nomenclature;
      $articulo->category_id = $request->category_id;
      $articulo->description = $request->description;
      $articulo->image1 = $nombreArchivo1;
      $articulo->image2 = $nombreArchivo2;
      $articulo->image3 = $nombreArchivo3;
      // $articulo->user_id = Auth::user()->id;


      //Guardar el objeto en db. Revisar que el modelo tenga $guarded o $fillable
      $articulo->save(); //save() también sirve para hacer actualización.

      return redirect("/articulo/$id");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }

    public function showMyArticles()
    {
      // dd(Auth::user()->id);
      $articulos = Article::all()->filter(function ($articulo) {
        // dd($articulo);
      return $articulo->user_id == Auth::user()->id;
      })->sortBy('updated_at');
      // dd($articulos);
      return view("/editar_mis_articulos", compact('user', 'articulos'));
    }

    // Route::get('/usuario/{id}', 'ArticleController@showUsersArticles')->middleware('auth');
    public function showUsersArticles($id)
    {
      $user = User::find($id);
      // dd($id, $user);

      // $articulos = Article::all()->filter(function ($articulo) {
      //   // dd($articulo);
      // return $articulo->user_id == $id;
      // })->sortBy('updated_at');

      $articulos = Article::where('user_id', '=', $id)
      ->orderBy('updated_at')
      ->get();

      // dd($articulos);

      return view("/usuario", compact('user', 'articulos'));
    }
}
