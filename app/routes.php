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

Route::get( '/', function(){ return View::make( 'public.home.index' ); });

## Menú
Route::get( '/becas', function(){ return View::make('public.becas.index'); });
Route::get( '/fundacion', function(){ return View::make('public.fundacion.index'); });
Route::get( '/como-ayudar', function(){ return View::make('public.como_ayudar.index'); });
Route::get( '/apoyamos-tu-causa', function(){ return View::make('public.apoyamos.index'); });
Route::get( '/causas-vivas', function(){ return View::make('public.causas.index'); });
Route::get( '/noticias', function(){ return View::make('public.noticias.index'); });
Route::get( '/faqs', function(){ return View::make('public.faqs.index'); });
Route::get( '/donadores', function(){ return View::make('public.donadores.index'); });
Route::get( '/contacto', function(){ return View::make('public.contacto.index'); });
Route::get( '/muro-exito', function(){ return View::make('public.fundacion.index'); });
Route::get( '/voluntarios', function(){ return View::make('public.voluntarios.index'); });

## Vistas del interior de LA FUNDACIÓN
Route::get( '/historia', function(){ return View::make('public.fundacion.historia'); });
Route::get( '/aportaciones', function(){ return View::make('public.fundacion.aportaciones'); });
Route::get( '/membresias', function(){ return View::make('public.fundacion.membresias'); });
Route::get( '/consideraciones', function(){ return View::make('public.fundacion.consideraciones'); });
Route::get( '/educacion', function(){ return View::make('public.fundacion.educacion'); });
Route::get( '/salud', function(){ return View::make('public.fundacion.salud'); });
Route::get( '/deporte', function(){ return View::make('public.fundacion.deporte'); });
Route::get( '/cultura', function(){ return View::make('public.fundacion.cultura'); });
Route::get( '/restauracion', function(){ return View::make('public.fundacion.restauracion'); });
Route::get( '/asistenciales', function(){ return View::make('public.fundacion.asistenciales'); });

## Vistas de los modales o flotantes
Route::get( '/donar', function(){ return View::make('public.covers.donar'); });
Route::get( '/donar-causas', function(){ return View::make('public.covers.causas'); });
Route::get( '/impulsar', function(){ return View::make('public.covers.impulsar'); });
Route::get( '/voluntario', function(){ return View::make('public.covers.voluntario'); });
Route::get( '/voluntario-2', function(){ return View::make('public.covers.voluntario_2'); });
Route::get( '/ficha-donador', function(){ return View::make('public.covers.ficha_donador'); });
Route::get( '/ficha-impulsor', function(){ return View::make('public.covers.ficha_impulsor'); });
Route::get( '/ficha-voluntario', function(){ return View::make('public.covers.ficha_voluntario'); });
Route::get( '/ficha-causas', function(){ return View::make('public.covers.ficha_causas'); });
Route::get( '/ficha-noticias', function(){ return View::make('public.covers.ficha_noticias'); });

