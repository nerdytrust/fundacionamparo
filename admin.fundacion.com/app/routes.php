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
    if(Auth::guest())
        return View::make('home.login');
    else
    	return Redirect::to('/dashboard');
        
});



Route::get('login', ['as' => 'login', 'uses' => 'UsersController@login']);
Route::post('login/email', ['as' => 'login/email', 'uses' => 'UsersController@loginEmail']);
Route::get('logout', ['as' => 'logout', 'uses' => 'UsersController@logout']);


Route::group(array('before' => 'auth'), function()
{
	// Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashBoardController@index']);
	Route::get('dashboard', function(){
		return View::make('dashboard.dashboard');
	});

	Route::get('customer-site', function(){
		return View::make('customer.customer-site');
	});
	
	Route::get('temp_view', 'TempViewController@index');
	Route::post('temp_view', 'TempViewController@index');

	Route::post('customer/autologin',['as' => 'custumer/autologin', 'uses' => 'PcustomerController@autologin']);

	Route::crud('CrudController');
});
