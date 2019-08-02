<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        //Route::post('/articulo/{id}', 'LikeController@store')->middleware('auth');
        $rules = [
          ];
        $messages = [
        ];

        $this->validate($request, $rules, $messages);

        $like= new Like; //crear instancia de la clase.
        //Asignar datos al objeto.

        $like->article_id = $request->article_id;
        $like->user_likeador_id = $request->user_likeador_id;

        //Guardar el objeto en db. Revisar que el modelo tenga $guarded o $fillable
        $like->save(); //save() también sirve para hacer actualización.

        return redirect("/articulo/$id");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
     // Route::get('/eliminar_like/{id}', 'LikeController@destroy')->middleware('auth');
     // estoy llegando con el ID de la PLANTA
    public function destroy($id)
    {

      $borrarLike = Like::where('article_id', '=', $id)
      ->where('user_likeador_id', '=', Auth::User()->id)
      ->get();

      foreach ($borrarLike as $key => $value) {
        $value->delete();
      }

      return redirect("/articulo/$id");
    }
}
