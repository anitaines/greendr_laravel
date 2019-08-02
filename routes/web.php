<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'ArticleController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/que_es_como_funciona', 'TipController@que_es_como_funciona');

Route::get('/que_es_greendr', 'TipController@que_es_greendr');

Route::get('/como_funciona', 'TipController@como_funciona');

Route::get('/control_panel', 'UserController@index')->middleware('auth');

Route::get('/perfil', 'UserController@show')->middleware('auth');

Route::put('/perfil', 'UserController@update')->middleware('auth');

Route::get('/index', 'ArticleController@index');

Route::get('/articulo/{id}', 'ArticleController@show')->middleware('auth');

Route::post('/articulo/{id}', 'LikeController@store')->middleware('auth');

Route::get('/editar_mis_articulos', 'ArticleController@showMyArticles')->middleware('auth');

Route::get('/mis_likers', 'UserController@misLikers')->middleware('auth');

Route::get('/matches', 'UserController@matches')->middleware('auth');

Route::get('/wishlist', 'ArticleController@showMywishlist')->middleware('auth');

Route::get('/usuario/{id}', 'ArticleController@showUsersArticles')->middleware('auth');

Route::get('/formulario_subida', 'ArticleController@create')->middleware('auth');

Route::post('/formulario_subida', 'ArticleController@store')->middleware('auth');

Route::get('/editar_articulo/{id}', 'ArticleController@edit')->middleware('auth');

Route::put('/editar_articulo/{id}', 'ArticleController@update')->middleware('auth');

Route::get('/eliminar/{id}', 'ArticleController@destroy')->middleware('auth');

Route::get('/eliminar_like/{id}', 'LikeController@destroy')->middleware('auth');

Route::get('/resultados', 'ArticleController@search'); //con middleware?
