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
Route::get('docentes',array('uses'=>'DocenteController@index'));
Route::get('docente/add.html',array('uses'=>'DocenteController@add'));
Route::get('docente/login.html',array('uses'=>'DocenteController@login'));
Route::post('docente/login',array('uses'=>'DocenteController@loginInit'));
Route::get('docente/logout.html',array('uses'=>'DocenteController@logout'));
Route::get('docente/edit/{id}',array('uses'=>'DocenteController@edit'))->where('id','[0-9]+');
Route::post('docente/update/{id}',array('uses'=>'DocenteController@update'))->where('id','[0-9]+');
Route::post('docente/insert.html',array('uses'=>'DocenteController@insert'));
Route::get('docente/profile/{id}',array('uses'=>'DocenteController@profile'))->where('id','[0-9]+');
Route::get('docente/delete/{id}',array('uses'=>'DocenteController@delete'))->where('id','[0-9]+');
Route::get('docente/change-pass/{id}',array('uses'=>'DocenteController@changePass'))->where('id','[0-9]+');
Route::post('docente/update_pass.html',array('uses'=>'DocenteController@cambiarContrasenia'));

// Personal
Route::get('personal',array('uses'=>'PersonalController@index'));
Route::get('personal/cargos',array('uses'=>'CargoController@index'));
Route::get('personal/cargo/add.html',array('uses'=>'CargoController@add'));
Route::post('personal/cargo/insert.html',array('uses'=>'CargoController@insert'));
Route::get('personal/add.html',array('uses'=>'PersonalController@add'));
Route::post('personal/insert.html',array('uses'=>'PersonalController@insert'));
Route::get('personal/profile/{id}',array('uses'=>'PersonalController@profile'))->where('id','[0-9]+');
Route::get('personal/edit/{id}',array('uses'=>'PersonalController@edit'))->where('id','[0-9]+');
Route::post('personal/update/{id}',array('uses'=>'PersonalController@update'))->where('id','[0-9]+');
Route::get('personal/change-pass-personal/{id}',array('uses'=>'PersonalController@changePassPersonal'))->where('id','[0-9]+');

//Modulos mantenimiento
Route::get('modulo',array('uses'=>'ModuloController@index'));
Route::get('modulo/nuevo.html',array('uses'=>'ModuloController@nuevo'));
Route::get('modulo/actualizar.html',array('uses'=>'ModuloController@actualizar'));
Route::post('modulo/crear',array('uses'=>'ModuloController@crear'));

Route::get('mi/pagina', function() {
	return '¡Hola mundo!';
});


Route::get('modalidad_pago/nuevo.html',array('uses'=>'ModuloController@nuevo'));

Route::get('modalidad_pago',array('uses'=>'ModalidadPagoController@index'));
Route::get('modalidad_pago/nuevo.html',array('uses'=>'ModalidadPagoController@nuevo'));
Route::get('modalidad_pago/actualizar.html',array('uses'=>'ModalidadPagoController@actualizar'));
Route::post('modalidad_pago/crear',array('uses'=>'ModalidadPagoController@crear'));


/*Begin Caja y Facturacion*/
Route::post('modalidad/store','ModalidadController@store');
Route::post('modalidad/update/{id}','ModalidadController@update');
Route::get('modalidad/destroy/{id}','ModalidadController@destroy');
Route::post('modalidad/index','ModalidadController@index');
Route::controller('modalidad','ModalidadController');

Route::post('pagos/store','PagosController@store');
Route::post('pagos/update/{id}','PagosController@update');
Route::get('pagos/destroy/{id}','PagosController@destroy');
Route::post('pagos/index','PagosController@index');
Route::controller('pagos','PagosController');
/*End Caja y Facturacion*/


// Modulos Asistencia: Docentes y Alumnos
Route::get('asistencia/add_ct',array('uses'=>'AsistenciaController@add_ct'));
Route::get('asistencia/add_cl',array('uses' =>'AsistenciaController@add_cl'));

// carga academica
Route::get('carga.html',array('uses'=>'CargaAcademicaController@MostrarCargaAcademica'));
Route::get('crear.html',array('uses'=>'CargaAcademicaController@MostrarCrearCarga'));

//mantenimiento de tablas libres
Route::resource('dia','DiaController');
Route::resource('grupo','GrupoController');
Route::resource('horario','HorarioController');
Route::resource('modulo','ModuloController');
Route::resource('semestre','SemestreController');
Route::resource('turno','TurnoController');
