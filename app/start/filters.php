<?php

App::error(function(Illuminate\Database\Eloquent\ModelNotFoundException $e){

	if (Request::is(getenv('APP_ADMIN_PREFIX').'/*'))
    	return Response::view('admin.error.model',compact('message'),404);
    else if (Request::is('public/*'))
    	return Response::view('public.error.model',compact('message'),404);
});


App::error(function(Exception $exception, $code)
{

	if (Request::is(getenv('APP_ADMIN_PREFIX').'/*'))
	{
	    switch ($code)
	    {
	        case 403:
	            return Response::view( 'admin.error.403', compact('message'), 403);
	        case 404:
	            return Response::view( 'admin.home.login', compact('message'), 404);
	    }
	}

	if (Request::is('public/*'))
	{
	    switch ($code)
	    {
	        case 403:
	            return Response::view( 'public.error.403', compact('message'), 403);
	        case 404:
	            return Response::view( 'public.error.404', compact('message'), 404);
	    }
	}


});




/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('/'.getenv('APP_ADMIN_PREFIX'), function()
{
	if (Request::is(getenv('APP_ADMIN_PREFIX').'/*'))
	{
		if (Auth::admin()->check())
			return View::make('dashboard.dashboard');
		elseif(Auth::admin()->guest())
			return View::make('admin.home.login');
	}

});

Route::filter('auth', function()
{
	if (Request::is(getenv('APP_ADMIN_PREFIX').'/*'))
	{
		if (Auth::admin()->guest())
		{
			if (Request::ajax())
			{
				return Response::make('Unauthorized', 401);
			}
			else
			{
				return View::make('admin.home.login');
				//return Redirect::guest('login');
			}
		}
	}

});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Request::is(getenv('APP_ADMIN_PREFIX').'/*'))
	{
		if (Auth::admin()->check()) return Redirect::to('/');
	}
	
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/


Route::filter('csrf', function() {
    $token = Request::ajax() ? Request::header('X-CSRF-Token') : Input::get('_token');
    if (Session::token() != $token)
        throw new Illuminate\Session\TokenMismatchException;
});

// Route::filter('csrf', function()
// {
// 	if (Session::token() != Input::get('_token'))
// 	{
// 		throw new Illuminate\Session\TokenMismatchException;
// 	}
// });

/*
|--------------------------------------------------------------------------
| Permissions by Controller and method 
|--------------------------------------------------------------------------
| https://github.com/Zizaco/entrust
|
| Example:
| str_singular => controller
| DeliveryReportsController => delivery_report
|
| Route::when('controller/method*', 'controller/method');
|
*/


/*
|--------------------------------------------------------------------------
| UsersController Permissions
|--------------------------------------------------------------------------
*/
Entrust::crud();

