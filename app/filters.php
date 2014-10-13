<?php

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

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('default');
		}
	}
});

/*
User login filter on Post
*/


Route::filter('userLogin', function()
{

 	$credentials = Input::all(); 	
 	$userName = $credentials['tbUserName'];
 	$password = $credentials['tbPassword']; 	

 	if($user = DB::table('user')	 	
	 	->join('ir', 'user.ir_id', '=', 'ir.id')
	    ->select('ir.id','ir.name','ir.placementid','ir.display_irid', 'user.locked', 'user.userTypeId','user.forcePasswordChange')
	    ->where('user.userName',$userName)
		->where('user.password',$password)
	    ->get())
 	{ 		
	    foreach ($user as $key => $value)
		{  
		    Session::put('userId', $value->id);
		    Session::put('irid', $value->display_irid);
		    Session::put('placementid', $value->placementid);
	 		Session::put('userTypeId', $value->userTypeId);
	 		Session::put('userFullName', $value->name);
	 		Session::put('locked', $value->locked);
	 		Session::put('passwordChangeRequired', $value->forcePasswordChange);
		}
	    return Redirect::intended('user/home');
	}
	else{
		return Redirect::to('default')
            ->with('message', 'Your ID or password is wrong. Please try again.');
            
	}
	
});

/*
User Authentication filter
*/

Route::filter('userAuth', function()
{	
	if(!Session::get('userId'))
	{
		return Redirect::to('default');
	}

});



/*
Admin login filter on Post
*/


Route::filter('adminLogin', function()
{

 	$credentials = Input::all(); 	
 	$userName = $credentials['tbUserName'];
 	$password = $credentials['tbPassword']; 	

 	$admin = DB::table('user')	 	
	 	->join('ir', 'user.ir_id', '=', 'ir.id')
	    ->select('ir.id','ir.name','ir.placementid','ir.display_irid', 'user.locked', 'user.userTypeId','user.forcePasswordChange')
	    ->where('user.userName',$userName)
		->where('user.password',$password)
		->where('user.userTypeId',0)
	    ->get();    

	if($admin)
 	{ 		
 		
	    foreach ($admin as $key => $value)
		{  
		    Session::put('userId', $value->id);
		    Session::put('irid', $value->display_irid);
		    Session::put('placementid', $value->placementid);
	 		Session::put('userTypeId', $value->userTypeId);
	 		Session::put('userFullName', $value->name);
	 		Session::put('locked', $value->locked);
	 		Session::put('passwordChangeRequired', $value->forcePasswordChange);
		}
		
	    return Redirect::intended('admin/Members/TransactionsNew');
	}
	else{
		return Redirect::to('admin')
            ->with('message', 'Your ID or password is wrong. Please try again.');
            
	}
	
});

/*
Admin Authentication filter
*/

Route::filter('adminAuth', function()
{		
	if(!Session::has('userFullName') && Session::get('userFullName') !== 'Admin')
	{
		return Redirect::to('admin/login');
	}

});



















Route::filter('auth.basic', function()
{
	return Auth::basic('username');
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
	if (Auth::check()) return Redirect::to('/');
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

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
