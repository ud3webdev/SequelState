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

Route::get('/', array(
	'as'	=>	'dashboard',
	'uses'	=>	'HomeController@dashboard'
));
Route::get('/connections', array(
	'as'	=>	'connections',
	'uses'	=>	'ConnectionsController@connections'
));
Route::post('/connections/setNewConnection', array(
	'as'	=>	'SystemSetNewConnection',
	'uses'	=>	'ConnectionsController@setNewConnection'
));

