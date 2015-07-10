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

Route::get( '/', 'HomeController@home' );
Route::get( 'login', 'HomeController@index' );
Route::get( 'salir', 'HomeController@salir' );
Route::get( 'logout', 'HomeController@logout' );
Route::get( 'registro', 'HomeController@registro' );
Route::get( 'recuperar-password', 'HomeController@forgotPassword' );

## Menú
Route::get( 'becas', [ 'uses' => 'BecasController@index', 'as' => 'get.becas' ] );
Route::get( 'fundacion', [ 'uses' => 'FundacionController@index', 'as' => 'get.fundacion' ] );
Route::get( 'como-ayudar', [ 'uses' => 'AyudarController@index', 'as' => 'get.como-ayudar'] );
Route::get( 'apoyamos-tu-causa', [ 'uses' => 'ApoyarCausaController@index', 'as' => 'get.apoyamos-tu-causa' ] );
Route::get( 'causas-vivas', [ 'uses' => 'CausasVivasController@index', 'as' => 'get.causas-vivas' ] );
Route::get( 'noticias', [ 'uses' => 'NoticiasController@index', 'as' => 'get.noticias' ] );
Route::get( 'carga-noticias/{limit}/{offset}/', [ 'uses' => 'NoticiasController@carga_noticias', 'as' => 'get.noticias' ] )->where( array('limit' => '[0-9]+', 'offset' => '[0-9]+'));
Route::get( 'carga-noticias-resultado/{limit}/{offset}/{s}', [ 'uses' => 'NoticiasController@carga_noticias_resultado', 'as' => 'get.noticias' ] )->where( array('limit' => '[0-9]+', 'offset' => '[0-9]+', 's' => '[a-zA-Z0-9]+'));
Route::get( 'faqs', [ 'uses' => 'FaqsController@index', 'as' => 'get.faqs' ] );
Route::get( 'donadores', [ 'uses' => 'DonadoresController@index', 'as' => 'get.donadores' ] );
Route::get( 'donadores/{filtro}', [ 'uses' => 'DonadoresController@index', 'as' => 'get.donadores' ] )->where( 'filtro', '[a-zA-Z]+' );
Route::get( 'contacto', [ 'uses' => 'ContactoController@index', 'as' => 'get.contacto' ] );
Route::get( 'muro-exito', [ 'uses' => 'MuroExitoController@index', 'as' => 'get.muro-exito' ] );
Route::get( 'voluntarios', [ 'uses' => 'VoluntariosController@index', 'as' => 'get.voluntarios' ] );
Route::get( 'politicas-de-privacidad', [ 'uses' => 'HomeController@privacidad', 'as' => 'get.aviso-privacidad' ] );
Route::get( 'resultados/', [ 'uses' => 'HomeController@search', 'as' => 'get.resultados' ] )->where( 's', '[a-zA-Z0-9]+');

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
Route::get( 'donar/paso-2', [ 'uses' => 'CoversController@donarStepTwo', 'as' => 'get.donar/paso-2' ] );
Route::get( 'donar/pago-tarjeta', [ 'uses' => 'CoversController@donarTarjeta', 'as' => 'get.donar/pago-tarjeta' ] );
Route::get( 'donar/pago-oxxo', [ 'uses' => 'CoversController@donarOxxo', 'as' => 'get.donar/pago-oxxo' ] );
Route::get( 'donar/pago-spei', [ 'uses' => 'CoversController@donarSpei', 'as' => 'get.donar/pago-spei' ] );
Route::get( 'donar/pago-paypal', [ 'uses' => 'CoversController@donarPaypal', 'as' => 'get.donar/pago-paypal' ] );
Route::get( 'donar/save-paypal', [ 'uses' => 'CoversController@saveDonacionPaypal', 'as' => 'get.donar/save-paypal' ] );
Route::get( 'donar/pago-error', [ 'uses' => 'CoversController@donarPaypalerror', 'as' => 'get.donar/pago-error' ] );
Route::get( 'gracias', [ 'uses' => 'CoversController@donarThanks', 'as' => 'get.gracias' ] );
Route::get( 'gracias-3', [ 'uses' => 'CoversController@impulsarGracias', 'as' => 'get.gracias-3' ] );
Route::get( 'donar-causa', [ 'uses' => 'CoversController@donarCausas', 'as' => 'get.donar-causa' ] );
Route::get( 'donar-causa/{id}', [ 'uses' => 'CoversController@donarCausas', 'as' => 'get.donar-causa' ] )->where( 'id', '[0-9]+' );
Route::get( 'impulsar', [ 'uses' => 'CoversController@impulsar', 'as' => 'get.impulsar' ] );
Route::get( 'impulsar-causa', [ 'uses' => 'CoversController@impulsarCausa', 'as' => 'get.impulsar-causa' ] );
Route::get( 'impulsar-causa/{id}', [ 'uses' => 'CoversController@impulsarCausa', 'as' => 'get.impulsar-causa' ] )->where( 'id', '[0-9]+');
Route::get( 'voluntario', [ 'uses' => 'CoversController@voluntario', 'as' => 'get.voluntario' ] );
Route::get( 'voluntario/paso-2', [ 'uses' => 'CoversController@voluntarioNext', 'as' => 'get.voluntario/paso-2' ] );
Route::get( 'voluntario/gracias', [ 'uses' => 'CoversController@voluntarioGracias', 'as' => 'get.voluntario/gracias' ] );
Route::get( 'ficha-donador', [ 'uses' => 'CoversController@fichaDonador', 'as' => 'get.ficha-donador' ] );
Route::get( 'ficha-donador/{id}', [ 'uses' => 'CoversController@fichaDonador', 'as' => 'get.ficha-donador' ] )->where( 'id', '[0-9]+' );
Route::get( 'ficha-impulsor', [ 'uses' => 'CoversController@fichaImpulsor', 'as' => 'get.ficha-impulsor' ] );
Route::get( 'ficha-voluntario', [ 'uses' => 'CoversController@fichaVoluntario', 'as' => 'get.ficha-voluntario' ] );
Route::get( 'ficha-causas', 'CoversController@fichaCausas' );
Route::get( 'ficha-causas/{id}', 'CoversController@fichaCausas' )->where( 'id', '[0-9]+' );
Route::get( 'ficha-noticias', [ 'uses' => 'CoversController@fichaNoticias', 'as' => 'get.ficha-noticias' ] );
Route::get( 'ficha-noticias/{id}', 'CoversController@fichaNoticias' )->where( 'id', '[0-9]+' );
Route::get( 'gracias-registro', [ 'uses' => 'CoversController@thanksRegistro', 'as' => 'get.gracias-registro' ] );


Route::get( 'path_video/{id}', 'StoragePathController@videoStorage' );
Route::get( 'path_image/{id}/{size}', 'StoragePathController@imgStorage' );
Route::get( 'ajax-state', 'BecasController@getState' );
Route::get( 'ajax-city', 'BecasController@getCity' );
Route::get( 'ajax-beca-dropdown', 'BecasController@getCombos' );

Route::post( 'ajax-moments', 'MuroExitoController@getMoment' );

##Actions de Formularios
Route::post( 'validar-pago', 'CoversController@validarPago' );
Route::post( 'registrar-tu-causa', 'ApoyarCausaController@registrar' );
Route::post( 'formulario-contacto', 'ContactoController@enviarContacto' );
Route::post( 'nueva-donacion', 'DonacionesController@nuevaDonacion' );
Route::post( 'donacion-pago-tarjeta', 'DonacionesController@payCard' );
Route::post( 'paso-dos-donacion', 'DonacionesController@metodoPago' );
Route::post( 'enviar-password', 'HomeController@sendPassword' );
Route::post( 'registrar-usuario', 'HomeController@newMember' );
Route::post( 'like', 'CoreController@likeProcess' );
Route::post( 'solicitar-beca', 'BecasController@processGrant' );
Route::post( 'nuevo-voluntario', 'VoluntariosController@shortVoluntary' );
Route::post( 'continuar-voluntario', 'VoluntariosController@complementaryVoluntary' );
Route::post( 'nuevo-voluntario-completo', 'VoluntariosController@longVoluntary' );

