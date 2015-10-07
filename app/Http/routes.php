<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('/reset', function ()
{
	Artisan::call('migrate:refresh', ['--force' => true]);
	Artisan::call('db:seed', ['--force' => true]);
});
