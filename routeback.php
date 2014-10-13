Route::get('/user', function()
{
	return View::make('user.home');
});

/*
| Profile
*/

/*
| My Profile
*/


Route::get('/user/member', function()
{
	return View::make('user.member');
});

/*
| Policy Status
*/
Route::get('/user/membersearch', function()
{
	return View::make('user.membersearch');
});

/*
| Create Extension
*/
Route::get('/user/CreateIRExtension', function()
{
	return View::make('user.CreateIRExtension');
});


/*
| Geneology
*/

/*
| Visual Geneology
*/


Route::get('/user/geneology', function()  
{
	return View::make('user.geneology');
});

/*
| Geneology By Date
*/
Route::get('/user/GeneologyByDate', function()
{
	return View::make('user.GeneologyByDate');
});

/*
| UV Geneology
*/
Route::get('/user/GeneologyUV', function()
{
	return View::make('user.GeneologyUV');
});


/*
| Summary
*/

/*
| Business Summary
*/


Route::get('/user/IRSummary', function()
{
	return View::make('user.IRSummary');
});

/*
| Welcome Letter
*/
Route::get('/user/welcomeletter', function()
{
	return View::make('user.welcomeletter');
});

/*
| Special Incentives
*/
Route::get('/user/SpecialIncentives', function()
{
	return View::make('user.SpecialIncentives');
});


/*
| Help
*/

/*
| Change Password
*/


Route::get('/user/ChangePassword', function()
{
	return View::make('user.ChangePassword');
});

/*
| Contact Helpdesk
*/
Route::get('/user/support', function()
{
	return View::make('user.support');
});

