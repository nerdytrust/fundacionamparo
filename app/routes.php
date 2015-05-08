<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get( '/', 'HomeController@index' );
Route::get( 'home', 'HomeController@home' );
Route::get( 'registro', 'HomeController@registro' );

## Menú
Route::get( 'becas', [ 'uses' => 'BecasController@index', 'as' => 'get.becas' ] );
Route::get( 'fundacion', [ 'uses' => 'FundacionController@index', 'as' => 'get.fundacion' ] );
Route::get( 'como-ayudar', [ 'uses' => 'AyudarController@index', 'as' => 'get.como-ayudar'] );
Route::get( 'apoyamos-tu-causa', [ 'uses' => 'ApoyarCausaController@index', 'as' => 'get.apoyamos-tu-causa' ] );
Route::get( 'causas-vivas', [ 'uses' => 'CausasVivasController@index', 'as' => 'get.causas-vivas' ] );
Route::get( 'noticias', [ 'uses' => 'NoticiasController@index', 'as' => 'get.noticias' ] );
Route::get( 'faqs', [ 'uses' => 'FaqsController@index', 'as' => 'get.faqs' ] );
Route::get( 'donadores', [ 'uses' => 'DonadoresController@index', 'as' => 'get.donadores' ] );
Route::get( 'contacto', [ 'uses' => 'ContactoController@index', 'as' => 'get.contacto' ] );
Route::get( 'muro-exito', [ 'uses' => 'MuroExitoController@index', 'as' => 'get.muro-exito' ] );
Route::get( 'voluntarios', [ 'uses' => 'VoluntariosController@index', 'as' => 'get.voluntarios' ] );

## Vistas del interior de LA FUNDACIÓN
Route::get( 'historia', [ 'uses' => 'FundacionController@historia', 'as' => 'get.historia' ] );
Route::get( 'aportaciones', [ 'uses' => 'FundacionController@aportaciones', 'as' => 'get.aportaciones' ] );
Route::get( 'membresias', [ 'uses' => 'FundacionController@membresias', 'as' => 'get.membresias' ] );
Route::get( 'consideraciones', [ 'uses' => 'FundacionController@consideraciones', 'as' => 'get.consideraciones' ] );
Route::get( 'educacion', [ 'uses' => 'FundacionController@educacion', 'as' => 'get.educacion' ] );
Route::get( 'salud', [ 'uses' => 'FundacionController@salud', 'as' => 'get.salud' ] );
Route::get( 'deporte', [ 'uses' => 'FundacionController@deporte', 'as' => 'get.deporte' ] );
Route::get( 'cultura', [ 'uses' => 'FundacionController@cultura', 'as' => 'get.cultura' ] );
Route::get( 'restauracion', [ 'uses' => 'FundacionController@restauracion', 'as' => 'get.restauracion' ] );
Route::get( 'asistenciales', [ 'uses' => 'FundacionController@asistenciales', 'as' => 'get.asistenciales' ] );

## Vistas de los modales o flotantes
Route::get( 'donar', [ 'uses' => 'CoversController@donar', 'as' => 'get.donar' ] );
Route::get( 'donar-causas', [ 'uses' => 'CoversController@donarCausas', 'as' => 'get.donar-causas' ] );
Route::get( 'impulsar', [ 'uses' => 'CoversController@impulsar', 'as' => 'get.impulsar' ] );
Route::get( 'voluntario', [ 'uses' => 'CoversController@voluntario', 'as' => 'get.voluntario' ] );
Route::get( 'voluntario-2', [ 'uses' => 'CoversController@voluntarioNext', 'as' => 'get.voluntario-2' ] );
Route::get( 'ficha-donador', [ 'uses' => 'CoversController@fichaDonador', 'as' => 'get.ficha-donador' ] );
Route::get( 'ficha-impulsor', [ 'uses' => 'CoversController@fichaImpulsor', 'as' => 'get.ficha-impulsor' ] );
Route::get( 'ficha-voluntario', [ 'uses' => 'CoversController@fichaVoluntario', 'as' => 'get.ficha-voluntario' ] );
Route::get( 'ficha-causas', [ 'uses' => 'CoversController@fichaCausas', 'as' => 'get.ficha-causas' ] );
Route::get( 'ficha-noticias', [ 'uses' => 'CoversController@fichaNoticias', 'as' => 'get.ficha-noticias' ] );


Route::get( 'path_video/{id}', 'StoragePathController@videoStorage' );
Route::get( 'path_image/{id}/{size}', 'StoragePathController@imgStorage' );

##Login con Facebook

