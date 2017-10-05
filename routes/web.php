<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::auth();
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

Route::get('/home', 'HomeController@index');
Route::get('/payment', 'HomeController@payment');

Route::group(['middleware' => ['web']], function() {
	
	//Login routes for patients
	Route::get('/patient/login', 'Auth\LoginController@showLoginForm');
	Route::post('/patient/login', 'Auth\LoginController@login');
	Route::get('/patient/logout', 'Auth\LoginController@logout');

	//Register routes for patients
	Route::get('/patient/register', 'Auth\RegisterController@showPatientRegistrationForm');
	Route::post('/patient/register', 'Auth\RegisterController@register');

	Route::get('/patient', 'PatientController@index');
	Route::get('/patient/index', 'PatientController@index');

	//Login routes for providers
	Route::get('/provider/login', 'Auth\LoginController@showLoginForm');
	Route::post('/provider/login', 'Auth\LoginController@login');
	Route::get('/provider/logout', 'Auth\LoginController@logout');
	//Register routes for patients
	Route::get('/provider/register', 'Auth\RegisterController@showProviderRegistrationForm');
	Route::post('/provider/register', 'Auth\RegisterController@register');;

	//Register routes for providers
	Route::get('/provider', 'ProviderController@index');
	Route::get('/provider/index', 'ProviderController@index');

	//Login routes for pharmacies
	Route::get('/pharmacy/login', 'Auth\LoginController@showLoginForm');
	Route::post('/pharmacy/login', 'Auth\LoginController@login');
	Route::get('/pharmacy/logout', 'Auth\LoginController@logout');

	//Register routes for pharmacies
	Route::get('/pharmacy/register', 'Auth\RegisterController@showPharmacyRegistrationForm');
	Route::post('/pharmacy/register', 'Auth\RegisterController@register');

	Route::get('/pharmacy', 'PharmacyController@index');
	Route::get('/pharmacy/index', 'PharmacyController@index');

	//Login routes for pharmacies
	Route::get('/partner/login', 'Auth\LoginController@showLoginForm');
	Route::post('/partner/login', 'Auth\LoginController@login');
	Route::get('/partner/logout', 'Auth\LoginController@logout');

	//Register routes for pharmacies
	Route::get('/partner/register', 'Auth\RegisterController@showPartnerRegistrationForm');
	Route::post('/partner/register', 'Auth\RegisterController@register');

	Route::get('/partner', 'PartnerController@index');
	Route::get('/partner/index', 'PartnerController@index');

});
