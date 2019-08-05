<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

;
// BARRA DE BUSQUEDA
Route::get('/resultados_api/{param}', 'ArticleController@searchname');

// FILTROS BUSCADOR
Route::get('/resultados', 'ArticleController@searchapi');

// FILTRO BUSCADOR USUARIO
Route::get('/resultados_user', 'ArticleController@searchuser');
