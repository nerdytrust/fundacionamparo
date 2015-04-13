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
if(getenv('APP_ADMIN_PREFIX'))
{
	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
}


Route::get('/'.getenv('APP_ADMIN_PREFIX'), function(){
    if(Auth::guest())
        return View::make('admin.home.login');
    else
    	return Redirect::to('/dashboard');
        
});



Route::get('login', ['as' => 'login', 'uses' => getenv('APP_ADMIN_PREFIX').'\UsersController@login']);
Route::post('login/email', ['as' => 'login/email', 'uses' => getenv('APP_ADMIN_PREFIX').'\UsersController@loginEmail']);
Route::get('logout', ['as' => 'logout', 'uses' => getenv('APP_ADMIN_PREFIX').'\UsersController@logout']);


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

	Route::crud('admin\CrudController',getenv('APP_ADMIN_PREFIX'));
});


