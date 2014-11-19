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
// Errors
Route::get('404.html',array('uses'=>'ErrorController@mostrar404'));
Route::get('500.html',array('uses'=>'ErrorController@mostrar500'));
Route::get('blank.html',array('uses'=>'ErrorController@blank'));
// Docente
Route::get('docente',array('uses'=>'DocenteController@index'));
Route::get('docente/nuevo.html',array('uses'=>'DocenteController@nuevo'));
Route::get('docente/actualizar.html',array('uses'=>'DocenteController@actualizar'));
Route::post('docente/crear',array('uses'=>'DocenteController@crear'));

//Modulos mantenimiento
Route::get('modulo',array('uses'=>'ModuloController@index'));
Route::get('modulo/nuevo.html',array('uses'=>'ModuloController@nuevo'));
Route::get('modulo/actualizar.html',array('uses'=>'ModuloController@actualizar'));
Route::post('modulo/crear',array('uses'=>'ModuloController@crear'));

Route::get('mi/pagina', function() {
	return '¡Hola mundo!';
});


//Route::get('modalidad_pago/nuevo.html',array('uses'=>'ModuloController@nuevo'));

Route::get('modalidad_pago',array('uses'=>'ModalidadPagoController@index'));
Route::get('modalidad_pago/nuevo.html',array('uses'=>'ModalidadPagoController@nuevo'));
Route::get('modalidad_pago/actualizar.html',array('uses'=>'ModalidadPagoController@actualizar'));
Route::post('modalidad_pago/crear',array('uses'=>'ModalidadPagoController@crear'));




Route::post('modalidad/store','ModalidadController@store');
Route::post('modalidad/update/{id}','ModalidadController@update');
Route::get('/caisc/public/modalidad/destroy/{id}','ModalidadController@destroy');
Route::post('/caisc/public/modalidad/index','ModalidadController@index');


Route::controller('modalidad','ModalidadController');
