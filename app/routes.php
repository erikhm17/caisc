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

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('404.html',array('uses'=>'ErrorController@mostrar404'));
Route::get('500.html',array('uses'=>'ErrorController@mostrar500'));
Route::get('blank.html',array('uses'=>'ErrorController@blank'));
