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

/*
|*******************
| Public pages
|*******************
	*/

/*
| Home or default page routes
*/
Route::get('/', function()
{
	return View::make('default');
	
});

Route::get('/default', function()
{
	return View::make('default');
});


/*
|*******************
| Admin pages
|*******************
*/


/*
| Admin pages on Post 
*/
/*
Admin Login 
*/

Route::post('/admin',array( 'before' => 'adminLogin'));
Route::get('/admin', function()
{
	return View::make('admin.login');
});
Route::get('/admin/login', function()
{
	return View::make('admin.login');
});


Route::group(array('before' => 'adminAuth'), function()
{

	Route::get('/admin/Members/Member/{irid}','AdminMemberController@getMemberProfile');
	Route::post('/admin/Members/Member/{irid}','AdminMemberController@updateMemberProfile');
	Route::get('/admin/Members/membersearch','AdminMemberController@membersearch');
	Route::get('/admin/Members/TransactionsNew','AdminMemberController@TransactionsNew');
	Route::get('/admin/Members/TransactionsPending','AdminMemberController@TransactionsPending');
	Route::get('/admin/Members/PolicySearch','AdminMemberController@PolicySearch');
	
	Route::get('/admin/Network/Geneology','AdminNetworkController@Geneology');
	Route::get('/admin/Network/GeneologyByDate','AdminNetworkController@GeneologyByDate');
	Route::get('/admin/Network/GeneologyUV','AdminNetworkController@GeneologyUV');
	Route::get('/admin/Network/IRPerformance','AdminNetworkController@IRPerformance');
	Route::get('/admin/Network/Performance','AdminNetworkController@Performance');
	Route::get('/admin/Network/Payouts','AdminNetworkController@Payouts');
	Route::get('/admin/Network/SpecialIncentives','AdminNetworkController@SpecialIncentives');
	Route::get('/admin/Network/Reports','AdminNetworkController@Reports');

	Route::get('/admin/support/supportList','AdminSupportController@supportList');
	Route::get('/admin/support/AnnouncementList','AdminSupportController@AnnouncementList');	

	Route::get('/admin/settings/Settings','AdminSettingsController@Settings');
	Route::get('/admin/settings/Lookup','AdminSettingsController@Lookup');
	Route::get('/admin/settings/ChangePassword','AdminSettingsController@ChangePassword');

	Route::get('/admin/logout', function()
	{
		Session::flush();
		return Redirect::to('admin');
	});
	


});






/*
| Registration page routes
*//*
Route::resource('registration','RegistrationController');*/

Route::resource('public/registration','RegistrationController');

/*
| Get districts route
*/

Route::post('public/districts',function(){
    if(Request::ajax()){
    	$stateID = Input::get('state');    	
    	return Common::getDistricts($stateID);    	
    }

});

/*
| Validate Introducer Id route
*/
Route::post('public/introducer',function(){
    if(Request::ajax()){
    	$introducerId = Input::get('introducerId');    	
    	return Common::validateIntroducer($introducerId);
    }

});

Route::post('user/introducer',function(){
    if(Request::ajax()){
    	$introducerId = Input::get('introducerId');    	
    	return Common::validateIntroducer($introducerId);
    }

});


/*
| Validate Placement ID route
*/
Route::post('public/placement',function(){
    if(Request::ajax()){
    	$placementId = Input::get('placementId'); 
    	return Common::validatePossition($placementId);
    }

});

Route::post('user/placement',function(){
    if(Request::ajax()){
    	$placementId = Input::get('placementId'); 
    	return Common::validatePossition($placementId);
    }

});






/*
| FAQ page routes
*/

Route::get('public/FAQ', function()
{
	return View::make('public.FAQ');
});


/*
| Contactus page routes
*/

Route::get('public/contactus', function()
{
	return View::make('public.contactus');
});


/*
| Forgot Password page routes
*/

Route::get('public/forgotPassword', function()
{
	return View::make('public.forgotPassword');
});



/*
|*******************
| User pages
|*******************
*/


/*
| Home pages on Post 
*/
/*
User Login 
*/
Route::post('/user',array( 'before' => 'userLogin'));


/*
Grouped routes for User operations
*/

Route::group(array('before' => 'userAuth'), function()
{
	/*
	| Home pages on Get 
	*/
	Route::get('/user',function()
	{
		return View::make('default');
	});

	/*
	| Profile Pages on Get 
	*/

	Route::get('/user/membersearch','MemberController@membersearch');



	/*
	| Geneology Pages on Get 
	*/

	Route::get('/user/geneology','GeneologyController@geneology');


	Route::get('/user/GeneologyByDate','GeneologyController@GeneologyByDate');
	Route::get('/user/GeneologyUV','GeneologyController@GeneologyUV');



	/*
	| Summary Pages on Get
	*/

	Route::get('/user/IRSummary','SummaryController@IRSummary');
	Route::get('/user/welcomeletter','SummaryController@welcomeletter');

	/*
	| Get Weeks
	*/

	Route::post('user/weeks',function(){
	    if(Request::ajax()){
	    	$year = Input::get('year');
	    	$weeks = Common::getWeeks($year);
	    	foreach ($weeks as $week)
			{	
				$start_date = date('d/m/Y',strtotime($week->start_date));
				$end_date = date('d/m/Y',strtotime($week->end_date));				    
			    $weeksOpt[$week->week_id] = $week->week_number." ( ".$start_date." - ".$end_date." ) ";
			}
			return $weeksOpt;
	    }
	});


	Route::resource('/user/{url}','UserController');
});

