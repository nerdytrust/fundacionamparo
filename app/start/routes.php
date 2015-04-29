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
    if(Auth::admin()->guest())
        return View::make('admin.home.login');
    elseif(Auth::admin()->check())
    	return Redirect::to(getenv('APP_ADMIN_PREFIX').'/dashboard');
        
});



Route::get(getenv('APP_ADMIN_PREFIX').'/login', ['as' => 'admin/login', 'uses' => 'admin\UsersController@login']);
Route::post(getenv('APP_ADMIN_PREFIX').'/login/email', ['as' => 'admin/login/email', 'uses' => 'admin\UsersController@loginEmail']);
Route::get(getenv('APP_ADMIN_PREFIX').'/logout', ['as' => 'admin/logout', 'uses' => 'admin\UsersController@logout']);


Route::group(array('before' => 'auth'), function()
{
	if (Request::is(getenv('APP_ADMIN_PREFIX').'/*') and Auth::admin()->check())
	{
		// Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashBoardController@index']);
		Route::get(getenv('APP_ADMIN_PREFIX').'/dashboard', function(){
			return View::make('admin.dashboard.dashboard');
		});

		Route::get('customer-site', function(){
			return View::make('customer.customer-site');
		});
		
		Route::get('temp_view', 'TempViewController@index');
		Route::post('temp_view', 'TempViewController@index');

		Route::post('customer/autologin',['as' => 'custumer/autologin', 'uses' => 'PcustomerController@autologin']);

		Route::crud('admin\CrudController',getenv('APP_ADMIN_PREFIX'));
	}else
		return Redirect::to(getenv('APP_ADMIN_PREFIX').'/login');

});


