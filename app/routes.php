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


#GET
Route::get('admin/register', function() {
	return View::make('Container.AdminRegisterContainer');
});

Route::get('index/', function() {
	return View::make('Index.index');
});

Route::get('/registration', function() {
	return View::make('Container.RegistrationContainer');
});

Route::get('login', function() {
	return View::make('Container.LoginContainer');
});

Route::get('ErrorPage', function() {
	return View::make('ErrorPage');
});

Route::get('register', function() {
	return View::make('registerUser');
});

Route::get('Mainpage', function() {
	$applicant = Applicant::paginate(25);
	$app_Notify = Applicant::where('seen', '0')->get();

	if ( Request::ajax() ) 
	{ return Response::json(View::make('applicants', array('applicants' => $applicant))->render()); }

	return View::make('Container.AdminContainer', array('applicants' => $applicant, 'notify' => count($app_Notify), 'getApp' => $app_Notify));
});

Route::get('retApp', function() {
	return Applicant::all()->toJson();
});

Route::any('retrieve', function() {
	$app_Notify = Applicant::where('seen', '=', '0')->get();
	
	return count($app_Notify);
});

Route::get('retrieveApplicants', function() {
	$r_a = Applicant::where('seen', 0)->get()->toJson();
	return $r_a;
});

Route::get('confirmRegistration/{id}', 'ApplicantController@getInfo');







#POSTS
Route::post('registeruser', 'UserController@registerUser');
Route::post('register', 'ApplicantController@registerApplicant');
Route::post('Applicant/{id}/Update', 'ApplicantController@updateApplicant');
Route::post('notified', 'UserController@getNotif');







# AUTHENTICATION - START
Route::post('authenticate', function() {
	$login = User::validateLogin(Input::all());
	return $login;
});

Route::group(array('before' => 'auth'), function() {
	Route::get('Applicant/{applicant_id}/Profile', 'UserController@getApplicantInfo');
	Route::post('{id}/Update', 'UserController@updateApplicantInfo');

	Route::get('logout', function() {
		Auth::logout();
		return Redirect::to('login');
	});
});
########################








#API
Route::get('api/{key}/namesearch/{keyword}', function( $key, $namestring ) {
	if ($key == "n6s2363107") {
		if (strlen($namestring) >= 2) {
			$searchName = Applicant::where('firstname', 'LIKE' , $namestring)
									->orWhere('lastname', 'LIKE' , $namestring)
									->orWhere('middle', 'LIKE' , $namestring)->get()->toJson();
			return $searchName;
		} 
		return View::make('Errors.errorCatcher');
	} else {
		return View::make('Errors.errorCatcher');
	}
});

Route::get('api/{key}/applicant/{keyword}', function( $key, $idString ) {
	if ($key == "n6s2363107") {
		$searchId = Applicant::where('applicant_id', $idString)->get()->toJson();
		return $searchId;
	}
});