<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Like;

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
        'image1' => ['required','file', 'image', 'max:2048', 'dimensions:ratio=1/1'],
        'image2' => ['nullable', 'file', 'image', 'max:2048', 'dimensions:ratio=1/1'],
        'image3' => ['nullable', 'file', 'image', 'max:2048', 'dimensions:ratio=1/1'],
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
        'dimensions' => 'La imagen debe ser cuadrada.'
      ];

      $this->validate($request, $rules, $messages);

      $articulo= new Article;

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

      $sinAcentoA = str_replace("á", "a", $request->name);
      $sinAcentoE = str_replace("é", "e", $sinAcentoA);
      $sinAcentoI = str_replace("í", "i", $sinAcentoE);
      $sinAcentoO = str_replace("ó", "o", $sinAcentoI);
      $sinAcentoU = str_replace("ú", "u", $sinAcentoO);
      $sinDieresis = str_replace("ü", "u", $sinAcentoU);

      $articulo->name = strtoupper($sinDieresis);

      // $articulo->name = strtoupper($request->name);
      $articulo->nomenclature = $request->nomenclature;
      $articulo->category_id = $request->category_id;
      $articulo->description = $request->description;
      $articulo->image1 = $nombreArchivo1;
      $articulo->image2 = $nombreArchivo2;
      $articulo->image3 = $nombreArchivo3;
      $articulo->user_id = Auth::user()->id;

      $articulo->save();

      // LIKE FANTASMA
      // HECHO SOLAMENTE PARA DARLE DINAMISMO A LA PRESENTACION DEL PROYECTO
      if(Auth::user()->id != 1 && Auth::user()->id !=2 && Auth::user()->id !=3){
      $like= new Like;

      $esteArticulo = Article::all()->last();
      $esteArticuloId = $esteArticulo->id;

      $liker = rand(1,3);

      $like->article_id = $esteArticuloId;
      $like->user_likeador_id = $liker;

      $like->save();
      }
      // FIN LIKE FANTASMA

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
      $likes = Like::all();
      // dd($likes);

      $articulo = Article::find($id);
      // dd($articulo);
      $descripcion = explode("\n",$articulo->description);
        return view("/articulo", compact('likes', 'articulo', 'descripcion'));
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
        'image1' => ['file', 'image', 'max:2048', 'dimensions:ratio=1/1'],
        'image2' => ['nullable', 'file', 'image', 'max:2048', 'dimensions:ratio=1/1'],
        'image3' => ['nullable', 'file', 'image', 'max:2048', 'dimensions:ratio=1/1'],
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
        'dimensions' => 'La imagen debe ser cuadrada.'
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

      $sinAcentoA = str_replace("á", "a", $request->name);
      $sinAcentoE = str_replace("é", "e", $sinAcentoA);
      $sinAcentoI = str_replace("í", "i", $sinAcentoE);
      $sinAcentoO = str_replace("ó", "o", $sinAcentoI);
      $sinAcentoU = str_replace("ú", "u", $sinAcentoO);
      $sinDieresis = str_replace("ü", "u", $sinAcentoU);

      $articulo->name = strtoupper($sinDieresis);
      // $articulo->name = strtoupper($request->name);
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
    public function destroy($id)
    {

        $borrarArticulo = Article::find($id);
        $borrarArticulo->delete();

        $borrarLikes = Like::where('article_id', '=', $id)
        ->get();

        foreach ($borrarLikes as $key => $value) {
          $value->delete();
        }

        return redirect("/editar_mis_articulos");
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

    // Route::get('/whilist', 'ArticleController@showMywishlist')->middleware('auth');
    public function showMywishlist()
    {
      $queLikee = Like::where('user_likeador_id', '=', Auth::User()->id)
      ->get();
      return view("/wishlist", compact('queLikee'));
    }

    // Route::get('/usuario/{id}', 'ArticleController@showUsersArticles')->middleware('auth');
    public function showUsersArticles($id)
    {
      $user = User::find($id);
      // dd($id, $user);

      $articulos = Article::where('user_id', '=', $id)
      ->orderBy('updated_at')
      ->get();

      // dd($articulos);

      return view("/usuario", compact('user', 'articulos'));
    }

    //BARRA DE BUSQUEDA resultados
    // Route::get('/resultados', 'ArticleController@search'); //con middleware?
    public function search()
    {
      $param = $_GET['search'];
      $resultados = Article::where('name', 'like', "%$param%")
      ->orWhere('nomenclature', 'like', "%$param%")
      ->orderBy('name', 'ASC')
      ->get();
      // ->paginate(6);
      // $resultados->withPath("resultados?search=$param");

      return view("/resultados", compact('resultados', 'param'));
    }



    //BARRA DE BUSQUEDA preview
    // http://localhost:8000/api/resultados_api/d
    // Route::get('/resultados_api/{param}', 'ArticleController@searchname');
    public function searchname($param)
    {
      $resultados = Article::where('name', 'like', "$param%")
      ->orWhere('nomenclature', 'like', "$param%")
      ->orderBy('name', 'ASC')
      ->get();
      // ->paginate(6);
      // $resultados->withPath("resultados?search=$param");

      return $resultados;
    }
    // Route::get('/resultados_nomenclature_api/{param}', 'ArticleController@searchnomenclature');
    public function searchnomenclature($param)
    {
      $resultados = Article::where('nomenclature', 'like', "%$param%")
      ->orderBy('nomenclature', 'ASC')
      ->get();
      // ->paginate(6);
      // $resultados->withPath("resultados?search=$param");

      return $resultados;
    }


    // FILTROS DEL BUSCADOR

    // fetch("api/resultados?name=" + nombre + "&nomenclature=" + nCientifico + "&planta=" + cat1 +  "&esqueje=" + cat2 + "&semillas=" + cat3 + "&producto=" + cat4 + "&servicio=" + cat5)

    // localhost:8000/api/resultados?name=p&nomenclature=p&planta=1&esqueje=2&semillas=false&producto=false&servicio=false

    public function searchapi()
    {
      // dd($_GET);
      $name = $_GET['name']; //si no quiere buscar en name poner false en el query
      $nomenclature = $_GET['nomenclature']; //si no quiere buscar en nomenclature poner false en el query
      $planta = $_GET['planta']; //si no quiere buscar en planta poner false en el query, SINO planta=1
      $esqueje = $_GET['esqueje'];
      $semillas = $_GET['semillas'];
      $producto = $_GET['producto'];
      $servicio = $_GET['servicio'];

      $resultados = Article::where(function ($query) {
          $query->where('name', 'like', '%' . $_GET['name'] . '%')
                ->orWhere('nomenclature', 'like', '%' . $_GET['nomenclature'] . '%');
      })
      ->where(function ($query) {
          $query->where('category_id', '=', $_GET['planta'])
                ->orWhere('category_id', '=', $_GET['esqueje'])
                ->orWhere('category_id', '=', $_GET['semillas'])
                ->orWhere('category_id', '=', $_GET['producto'])
                ->orWhere('category_id', '=', $_GET['servicio']);
      })

      ->orderBy('name', 'ASC')
      ->get();
      // ->paginate(6);
      // $resultados->withPath("resultados?search=$param");

      return $resultados;
    }

    // FILTRO BUSCADOR USUARIO
    // Route::get('/resultados_user', 'ArticleController@searchuser');
    // http://localhost:8000/api/resultados_user?user=fani

    public function searchuser()
    {
      // dd($_GET);
      $user = $_GET['user']; //si no quiere buscar en name poner false en el query

      $resultados = User::where('username', 'like', '%' . $_GET['user'] . '%')
      ->orderBy('name', 'ASC')
      ->get();
      // ->paginate(6);
      // $resultados->withPath("resultados?search=$param");

      return $resultados;
    }
}
