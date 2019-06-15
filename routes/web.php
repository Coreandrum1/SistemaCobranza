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

Route::get('/', 'PagesController@index');

Route::get('/login', 'PagesController@login');

Route::resource('/owner', 'sessionController');

Route::get('/owner', 'SessionController@retrieve');

Route::get('/debtor', 'SessionController@retrieveGuest');

Route::resource('log_fn', 'LoginController');

Route::resource('ret', 'SessionController');

Route::resource('charge', 'ChargesController');

Route::resource('registration', 'UserController');

Route::resource('payment', 'PaymentController');

Route::resource('/ownerpayments', 'PaymentController');



Route::get('flush2', 'SessionController@flush');
Route::get('check', 'SessionController@check');