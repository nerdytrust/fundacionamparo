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
/* FILTERS */
Route::get('/', function(){
    return View::make('home.home');
});

Route::get('/admin', function(){
    if(Auth::guest())
        return View::make('admin.home.login');
    else
    	return Redirect::to('/dashboard');
        
});



Route::get('login', ['as' => 'login', 'uses' => 'admin\UsersController@login']);
Route::post('login/email', ['as' => 'login/email', 'uses' => 'admin\UsersController@loginEmail']);
Route::get('logout', ['as' => 'logout', 'uses' => 'admin\UsersController@logout']);


Route::group(array('before' => 'auth'), function()
{
	// Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashBoardController@index']);
	Route::get('dashboard', function(){
		return View::make('admin.dashboard.dashboard');
	});

	Route::get('customer-site', function(){
		return View::make('customer.customer-site');
	});
	
	Route::get('temp_view', 'TempViewController@index');
	Route::post('temp_view', 'TempViewController@index');

	Route::post('customer/autologin',['as' => 'custumer/autologin', 'uses' => 'PcustomerController@autologin']);

	Route::crud('admin\CrudController','admin');
});


Route::get('como-ayudar', function(){
	return View::make('home.como-ayudar');
});

Route::get('causas-vivas', function(){
	return View::make('home.como-ayudar');
});

Route::get('como-ayudar', function(){
	return View::make('home.como-ayudar');
});

Route::get('donadores', function(){
	return View::make('home.como-ayudar');
});

Route::get('muro-del-exito', function(){
	return View::make('home.como-ayudar');
});

Route::get('la-fundacion', function(){
	return View::make('home.como-ayudar');
});

Route::get('apoyamos-tu-causa', function(){
	return View::make('home.como-ayudar');
});

Route::get('noticias', function(){
	return View::make('home.como-ayudar');
});

Route::get('faq', function(){
	return View::make('home.como-ayudar');
});

Route::get('contacto', function(){
	return View::make('home.como-ayudar');
});
