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

// Route::get('/resultados?search={search}&', 'ArticleController@searchName');

Route::get('/resultados_api/{param}', 'ArticleController@searchname');

Route::get('/resultados_nomenclature_api/{param}', 'ArticleController@searchnomenclature');

// Route::get('/resultados?search={param1}&cat={param2}', 'ArticleController@searchapi');
// api/resultados?search={param1}&cat={param2}

// Route::get('/resultados/{nombre}/{categoria}/{categoria2}', 'ArticleController@searchapi');
Route::get('/resultados', 'ArticleController@searchapi');
// api/resultados?search={param1}&cat={param2}
