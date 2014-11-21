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
	return View::make('inicio');
});
// Errors
Route::get('404.html',array('uses'=>'ErrorController@mostrar404'));
Route::get('500.html',array('uses'=>'ErrorController@mostrar500'));
Route::get('blank.html',array('uses'=>'ErrorController@blank'));
//login


// Docente
Route::get('docentes',array('uses'=>'DocenteController@pag'));
Route::get('docente/add.html',array('uses'=>'DocenteController@add'));
Route::get('docente/login.html',array('uses'=>'DocenteController@login'));
Route::post('docente/login',array('uses'=>'DocenteController@loginInit'));
Route::get('docente/logout.html',array('uses'=>'DocenteController@logout'));
Route::get('docente/edit/{id}',array('uses'=>'DocenteController@edit'))->where('id','[0-9]+');
Route::post('docente/update.html',array('uses'=>'DocenteController@update'));
Route::post('docente/insert.html',array('uses'=>'DocenteController@insert'));
Route::get('docente/profile/{id}',array('uses'=>'DocenteController@profile'))->where('id','[0-9]+');
Route::get('docente/delete/{id}',array('uses'=>'DocenteController@delete'))->where('id','[0-9]+');
Route::get('docente/change-pass/{id}',array('uses'=>'DocenteController@changePass'))->where('id','[0-9]+');
// Personal
Route::get('personal',array('uses'=>'PersonalController@index'));
Route::get('personal/cargos',array('uses'=>'CargoController@index'));
Route::get('personal/cargo/add.html',array('uses'=>'CargoController@add'));
Route::post('personal/cargo/insert.html',array('uses'=>'CargoController@insert'));
Route::get('personal/add.html',array('uses'=>'PersonalController@add'));
Route::post('personal/insert.html',array('uses'=>'PersonalController@insert'));
Route::get('personal/profile/{id}',array('uses'=>'PersonalController@profile'))->where('id','[0-9]+');
Route::get('personal/edit/{id}',array('uses'=>'PersonalController@edit'))->where('id','[0-9]+');
Route::post('personal/update.html',array('uses'=>'PersonalController@update'));
Route::get('personal/change-pass-personal/{id}',array('uses'=>'PersonalController@changePassPersonal'))->where('id','[0-9]+');

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
