<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Article;
use App\User;
use App\Rules\ValidatePassword;
use Illuminate\Validation\Rule;
use App\Like;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user();

      // estos son MIS articulos (para el carrousel del control panel)
      $articulos = Article::all()->filter(function ($articulo) {
      // dd($articulo);
      return $articulo->user_id == Auth::user()->id;
      })->sortBy('updated_at');
      $primerSlide = $articulos->pop();
      // dd($primerSlide, $articulos);

      // VER TODAS LAS PLANTAS QUE QUIERO / LAS PLANTAS QUE LIKEE / MI WISHLIST (2do carrousel del control panel):
      // dd($user->articuloLikeado);
      // $articulosLikeados = $user->articuloLikeado; //TRAE TAMBIEN LOS ARTICULOS QUE DESLIKEE :(
      // // dd($articulosLikeados);
      // $primerSlideWishlist = $articulosLikeados->pop();

      $queLikee = Like::where('user_likeador_id', '=', Auth::User()->id)
      ->get();
      // dd($queLikee);
      $primerSlideQueLikee = $queLikee->pop();



      // VER QUIEN ME LIKEO (y QUE ME LIKEO)
      // $likes = Like::all();
      // dd($likes->first()->dameElUser->name, $likes->first()->dameElArticulo->name);
      $likes = Like::all()->filter(function ($like) {
      // dd($like);
      return $like->dameElArticulo->user_id == Auth::user()->id;
      })->sortBy('updated_at');
      // dd($likes->first()->dameElUser->name, $likes->first()->dameElArticulo->name);
      // dd($likes);


      //BUSCANDO LOS MATCHS: PLAN F - original plan

      $arrayMatchFullF = [];

      // 1ero: traer Mis likes
      $misLikes = Like::all()->filter(function ($like) {
      // dd($like);
      return $like->dameElArticulo->user_id == Auth::user()->id;
      })->sortBy('updated_at');
      // dd($misLikes);

      // 2do: Si usuario que me likeó tiene artículos
      $articulosLikerArray = [];
      foreach ($misLikes as $key => $value) {
        // if ($value->dameElUser->id)
        $articulosLikerArray[] = Article::where('user_id', '=', $value->user_likeador_id)->get();
      }
      // dd($articulosLiker);
      // dd($articulosLikerArray);

      // 3ero: Si sus artículos tienen like
      $likersDelLiker = [];
      foreach ($articulosLikerArray as $key => $value) {
        foreach ($value as $key => $value2) {
          $likersDelLiker[] = Like::where('article_id', '=', $value2->id)->get();
        }
      }
      // dd($likersDelLiker);

      // 4to: Si alguno de los likes es mío
      $miLadoDelMatch = [];
      foreach ($likersDelLiker as $key => $value) {
        foreach ($value as $value2) {
          // dd($value2);
          if($value2->user_likeador_id == Auth::user()->id){
            $miLadoDelMatch[] = $value2;
          }
        }
      }
      // dd($miLadoDelMatch);


      // 5to: entonces match (parte A: empezando a completar el array de matchs)

      foreach ($miLadoDelMatch as $key => $value) {

        // $arrayMatchFullF[] = [
        //   "user1" => $value->dameElArticulo->usuario->username, //quien subió
        //   "articulo2" => [], //el article que quiero
        //   "userYo2" => $value->dameElUser->username, //quién likeó o sea yo que estoy logueada
        //   "articuloWished1" => $value->dameElArticulo->name //el artículo likeado por user1
        // ];
        // TRAYENDO OBJETOS EN LUGAR DE NOMBRES:
        $arrayMatchFullF[] = [
          "user1" => $value->dameElArticulo->usuario, //quien subió
          "articulo2" => [], //el article que quiero
          "userYo2" => $value->dameElUser, //quién likeó o sea yo que estoy logueada
          "articuloWished1" => $value->dameElArticulo //el artículo likeado por user1
        ];

      }
      // dd($arrayMatchFullF);

      // 6to: entonces match (parte B: el array de matchs con articulo matcheado)

      foreach ($misLikes as $key => $value) {

        for ($i=0; $i < count($arrayMatchFullF); $i++) {

        if($value->dameElUser->username == $arrayMatchFullF[$i]["user1"]->username){
          // $arrayMatchFullF[$i]["articulo2"][] = $value->dameElArticulo->name;
          // TRAYENDO OBJETOS EN LUGAR DE NOMBRES:
          $arrayMatchFullF[$i]["articulo2"][] = $value->dameElArticulo;
        }
      }
      }
      // dd($arrayMatchFullF);
      // dd($arrayMatchFullF[0]["articulo2"]);

      //7mo: depurando los matchs (si hay likeado más de un artículo del mismo usuario)

      // https://stackoverflow.com/questions/307674/how-to-remove-duplicate-values-from-a-multi-dimensional-array-in-php

      // $arrayDepurado = array_unique($arrayMatchFullF, SORT_REGULAR); //ESTA OPCION IBA BIEN PERO

      // https://www.php.net/manual/en/function.array-unique.php
      // Note that array_unique() is not intended to work on multi dimensional arrays.
      // dd($arrayDepurado);
      // dd($arrayMatchFullF);

      $matchFinal = array_intersect_key($arrayMatchFullF, array_unique(array_map('serialize', $arrayMatchFullF) ) );

      //8vo: reindexando el array numericamente
      $matchFinal = array_values($matchFinal);
      
      // dd($matchFinal);
      // dd($matchFinal[0]["articulo2"]);


      // ojo $articulos incompletos adrede, le falta el primerSlide
      return view("/control_panel", compact('user', 'articulos', 'primerSlide', 'primerSlideQueLikee', 'queLikee', 'likes', 'matchFinal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $user = Auth::user();

      return view("/perfil", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
    // public function update(Request $request, $id)
    {
      // dd($request);
      // dd($id);
      $user = Auth::user();

      $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
        // 'username' => ['required', 'alpha_dash', 'string', 'max:255', 'unique:users'],
        'avatar' => ['file', 'image', 'max:2048', 'dimensions:ratio=1/1'],
        'password' => ['nullable','string', 'min:5', 'confirmed'],
        'oldPassword' => ['required', new ValidatePassword],
      ];

      $messages = [
        'required' => 'El :attribute debe estar completo.',
        'string' => 'El :attribute no debe tener caracteres especiales.STRING',
        'alpha' => 'El :attribute no debe tener números ni caracteres especiales.ALPHA',
        'max' => 'El :attribute debe tener :max caracteres como máximo',
        'min' => 'El :attribute debe tener :min caracteres como mínimo.',
        'email' => 'El :attribute debe ser un email.',
        'unique' => 'El :attribute ya se encuentra registrado.',
        'alpha_dash' => 'El :attribute no debe contener espacios.',
        'confirmed' => 'Las contraseñas no coinciden',
        'file' =>  'Error en la carga del archivo. Por favor volver a subir.',
        'image' => 'El archivo de la imagen solo puede ser jpeg, png o bmp.',
        'avatar.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
        'dimensions' => 'La imagen debe ser cuadrada.'
      ];

      $this->validate($request, $rules, $messages);
      // @@dd($messages);

      if ($request->avatar) {
        $ruta = $request->avatar->store("public/avatares");
        $nombreArchivo = basename($ruta);
      }else {
        $nombreArchivo = $user->avatar;
      }

      if ($request->password) {
        $passwordVigente = Hash::make($request->password);
      }else {
        $passwordVigente = $user->password;
      }

      $user->name = $request->name;
      $user->email = $request->email;
      $user->avatar = $nombreArchivo;
      $user->password = $passwordVigente;

      // @@dd($user);

      $user->save();

      return redirect("/control_panel");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Route::get('/mis_likers', 'UserController@misLikers')->middleware('auth');
    public function misLikers()
    {
      // VER QUIEN ME LIKEO (y QUE ME LIKEO)
      $likes = Like::all()->filter(function ($like) {
      return $like->dameElArticulo->user_id == Auth::user()->id;
      })->sortBy('updated_at');

      return view("/misLikers", compact('likes'));
    }

    // Route::get('/matches', 'UserController@matches')->middleware('auth');
    public function matches()
    {
      $arrayMatchFullF = [];

      // 1ero: traer Mis likes
      $misLikes = Like::all()->filter(function ($like) {
      return $like->dameElArticulo->user_id == Auth::user()->id;
      })->sortBy('updated_at');

      // 2do: Si usuario que me likeó tiene artículos
      $articulosLikerArray = [];
      foreach ($misLikes as $key => $value) {
        $articulosLikerArray[] = Article::where('user_id', '=', $value->user_likeador_id)->get();
      }

      // 3ero: Si sus artículos tienen like
      $likersDelLiker = [];
      foreach ($articulosLikerArray as $key => $value) {
        foreach ($value as $key => $value2) {
          $likersDelLiker[] = Like::where('article_id', '=', $value2->id)->get();
        }
      }

      // 4to: Si alguno de los likes es mío
      $miLadoDelMatch = [];
      foreach ($likersDelLiker as $key => $value) {
        foreach ($value as $value2) {
          // dd($value2);
          if($value2->user_likeador_id == Auth::user()->id){
            $miLadoDelMatch[] = $value2;
          }
        }
      }

      // 5to: entonces match (parte A: empezando a completar el array de matchs)

      foreach ($miLadoDelMatch as $key => $value) {

        // $arrayMatchFullF[] = [
        //   "user1" => $value->dameElArticulo->usuario->username, //quien subió
        //   "articulo2" => [], //el article que quiero
        //   "userYo2" => $value->dameElUser->username, //quién likeó o sea yo que estoy logueada
        //   "articuloWished1" => $value->dameElArticulo->name //el artículo likeado por user1
        // ];
        // TRAYENDO OBJETOS EN LUGAR DE NOMBRES:
        $arrayMatchFullF[] = [
          "user1" => $value->dameElArticulo->usuario, //quien subió
          "articulo2" => [], //el article que quiero
          "userYo2" => $value->dameElUser, //quién likeó o sea yo que estoy logueada
          "articuloWished1" => $value->dameElArticulo //el artículo likeado por user1
        ];

      }

      // 6to: entonces match (parte B: el array de matchs con articulo matcheado)

      foreach ($misLikes as $key => $value) {

        for ($i=0; $i < count($arrayMatchFullF); $i++) {

        if($value->dameElUser->username == $arrayMatchFullF[$i]["user1"]->username){
          // $arrayMatchFullF[$i]["articulo2"][] = $value->dameElArticulo->name;
          // TRAYENDO OBJETOS EN LUGAR DE NOMBRES:
          $arrayMatchFullF[$i]["articulo2"][] = $value->dameElArticulo;
        }
      }
      }


      //7mo: depurando los matchs (si hay likeado más de un artículo del mismo usuario)
      $matchFinal = array_intersect_key($arrayMatchFullF, array_unique(array_map('serialize', $arrayMatchFullF) ) );

      //8vo: reindexando el array numericamente
      $matchFinal = array_values($matchFinal);

      // dd($arrayMatchFullF, $matchFinal);

      return view("/matches", compact('matchFinal'));
    }
}
