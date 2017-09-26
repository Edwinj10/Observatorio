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


Route::get('/', 'FrontController@index');
Auth::routes();
Route::resource('tipo', 'TipoIndicadorController');
Route::resource('indicador', 'IndicadorController');
Route::resource('noticias', 'NoticiasController');
Route::resource('usuarios', 'USController');
Route::resource('boletin', 'BoletinController');
Route::resource('graficos', 'GraficoController');
Route::resource('informe', 'IndicadorPrecioController');
Route::resource('tesis', 'TesisController');
Route::resource('carreras', 'carrerasController');
Route::resource('mail', 'MailController');
Route::resource('institucion', 'InstitucionController');
Route::resource('comentarios', 'ComentarioController');
// BackController
Route::get('tesisporcarreras/{id}', 'BackController@tesis');
Route::get('indicadoresid/{id}','BackController@mostrar');
Route::get('mostrar/{id1}/{id2}', 'BackController@show');
Route::get('listartesis', 'BackController@index');
Route::get('listado/{id}', 'BackController@indicadores_detalles');
// FrontController
Route::get('administracion', 'FrontController@administracion');
Route::get('noticia', 'FrontController@noticia');
Route::get('noticia_tipo/{origen}', 'FrontController@noticia_tipo');
Route::get('busqueda','FrontController@busqueda');
Route::get('instituciones/{id1}/{id2}', 'FrontController@detalles_indicadores');
// llamar todos los indicadores
Route::get('indicadores/{id1}', 'FrontController@indicadores');
Route::get('instituciones', 'FrontController@instituciones');
// exporatr indicadores a excxel
Route::get('exportar/{id}/excel', 'ExportarController@indicadores');
Route::get('exportarindicadores/{id}/excel', 'ExportarController@indicadores_precios');
Route::get('descargar/{id}/excel', 'ExportarController@indicadores_fechas');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/{slug?}', 'FrontController@index');
