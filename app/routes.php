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

	return View::make('login');
});
// Errors
Route::get('404.html',array('uses'=>'ErrorController@mostrar404'));
Route::get('500.html',array('uses'=>'ErrorController@mostrar500'));
Route::get('blank.html',array('uses'=>'ErrorController@blank'));

//login
Route::get('salir',function()
{
	Auth::logout();
	return Redirect::to('/');
});

Route::post('check',array('uses'=>'Login@postUser'));

// Docente
Route::get('docentes',array('uses'=>'DocenteController@index'));
Route::get('docente/add.html',array('uses'=>'DocenteController@add'));
Route::get('docente/login.html',array('uses'=>'DocenteController@login'));
Route::post('docente/login',array('uses'=>'DocenteController@loginInit'));
Route::get('docente/logout.html',array('uses'=>'DocenteController@logout'));
Route::get('docente/edit/{id}',array('uses'=>'DocenteController@edit'))->where('id','[0-9]+');
Route::post('docente/update/{id}',array('uses'=>'DocenteController@update'))->where('id','[0-9]+');
Route::post('docente/insert.html',array('uses'=>'DocenteController@insert'));
Route::get('docente/delete/{id}',array('uses'=>'DocenteController@delete'))->where('id','[0-9]+');
Route::get('docente/change-pass/{id}',array('uses'=>'DocenteController@changepass'))->where('id','[0-9]+');

// Alumno
Route::get('alumnos',array('uses'=>'AlumnoController@index'));
Route::get('alumno/add.html',array('uses'=>'AlumnoController@add'));
Route::get('alumno/edit/{id}',array('uses'=>'AlumnoController@edit'))->where('id','[0-9]+');
Route::post('alumno/update/{id}',array('uses'=>'AlumnoController@update'))->where('id','[0-9]+');
Route::post('alumno/insert.html',array('uses'=>'AlumnoController@insert'));




Route::group(['before' => 'auth'], function()
{
    Route::get('docente/profile/{id}',array('uses'=>'DocenteController@profile'))->where('id','[0-9]+');
});

Route::get('docente/delete/{id}',array('uses'=>'DocenteController@delete'))->where('id','[0-9]+');
Route::get('docente/change-pass/{id}',array('uses'=>'DocenteController@changepass'))->where('id','[0-9]+');
Route::get('docente/imagen/{id}',array('uses'=>'DocenteController@imagen'))->where('id','[0-9]+');
Route::post('docente/imagen/{id}',array('uses'=>'DocenteController@uploadImage'))->where('id','[0-9]+');

// Personal

Route::group(['before' => 'auth'], function()
{
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
    Route::get('personal/delete/{id}',array('uses'=>'PersonalController@delete'))->where('id','[0-9]+');
    Route::get('personal/imagen/{id}',array('uses'=>'PersonalController@imagen'))->where('id','[0-9]+');
    Route::post('personal/imagen/{id}',array('uses'=>'PersonalController@uploadImage'))->where('id','[0-9]+');

});

//Modulos mantenimiento
Route::get('modulo',array('uses'=>'ModuloController@index'));
Route::get('modulo/nuevo.html',array('uses'=>'ModuloController@nuevo'));
Route::get('modulo/actualizar.html',array('uses'=>'ModuloController@actualizar'));
Route::post('modulo/crear',array('uses'=>'ModuloController@crear'));
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

//Route::post('pagos/update/{id}','PagosController@update');
Route::post('pagos/store','PagosController@store');

Route::get('pagos/destroy/{id}','PagosController@destroy');
Route::post('pagos/index','PagosController@index');
Route::get('pagos/create',array('uses'=>'PagosController@add'));
//Route::post('pagos/showAlumno/{id}','PagosController@getAlumno');
Route::get('pagos/showAlumno/{id}',array('uses'=>'PagosController@profile'))->where('id','[0-9]+');
Route::post('pagos/create',array('uses' => 'PagosController@store'));
Route::post('pagos/showAlumno/store','PagosController@store');
Route::post('pagos/search',array('uses'=>'PagosController@search'));

Route::controller('pagos','PagosController');
/*End Caja y Facturacion*/

// Modulos Asistencia: Docentes y Alumnos
Route::get('asistencia/add_ct',array('uses'=>'AsistenciaController@add_ct'));
Route::get('asistencia/add_cl',array('uses' =>'AsistenciaController@add_cl'));

//mantenimiento de tablas libres
Route::resource('dia','DiaController');
Route::resource('grupo','GrupoController');
Route::resource('horario','HorarioController');
Route::resource('modulo','ModuloController');
Route::resource('semestre','SemestreController');
Route::resource('turno','TurnoController');

// Mantenimiento matricula carrera tecnica
Route::get('matriculas',array('uses'=>'MatriculaCTController@index'));
Route::get('matriculas/listacursos',array('uses'=>'MatriculaCTController@listacursos'));
Route::get('matriculas/listaMatri',array('uses'=>'MatriculaCTController@listaMatri'));
Route::post('matriculas/listaMatricula.html',array('uses'=>'MatriculaCTController@listaMatricula'));
Route::post('matriculas/listaCursosNuevos.html',array('uses'=>'MatriculaCTController@listacursosnuevos'));

Route::get('matriculas/lista',array('uses'=>'MatriculaCTController@lista'));
Route::get('matriculas/edit/{cod}',array('uses'=>'MatriculaCTController@edit'));
Route::post('matriculas/update.html',array('uses'=>'MatriculaCTController@update'));
Route::get('matriculas/delete/{cod}',array('uses'=>'MatriculaCTController@delete'));
Route::get('matriculas/add.html',array('uses'=>'MatriculaCTController@add'));
Route::post('matriculas/insert.html',array('uses'=>'MatriculaCTController@insert'));

// Mantenimiento matricula cursos libres
Route::get('matriculascl',array('uses'=>'MatriculaCLController@index'));
Route::get('matriculascl/edit/{cod}',array('uses'=>'MatriculaCLController@edit'));
Route::post('matriculascl/update.html',array('uses'=>'MatriculaCLController@update'));
Route::get('matriculascl/delete/{cod}',array('uses'=>'MatriculaCLController@delete'));
Route::get('matriculascl/add.html',array('uses'=>'MatriculaCLController@add'));
Route::post('matriculascl/insert.html',array('uses'=>'MatriculaCLController@insert'));

//Modulo Cursos de Carrera Libre
Route::get('CursosLibres/create.html','CursosCarreraLibreController@nuevo');
Route::post('CursosLibres/insert.html','CursosCarreraLibreController@insertar');
Route::get('CursosLibres/index.html','CursosCarreraLibreController@listar');

Route::get('CursosLibres/updatesID.html','CursosCarreraLibreController@ActualizarBuscandoNombre');
Route::get('CursosLibres/updatecID/{id}','CursosCarreraLibreController@ActualizarConID');
Route::post('CursosLibres/post_update.html',array('uses'=>'CursosCarreraLibreController@post_actualizar'));//->where('codCurso_cl','[0-9]+');

Route::get('CursosLibres/delete.html','CursosCarreraLibreController@get_eliminar');
Route::get('CursosLibres/post_delete/{id}','CursosCarreraLibreController@post_eliminar');
Route::post('CursosLibres/eliminar.html','CursosCarreraLibreController@eliminando');

//Modulo Cursos de Carrera Tecnica
Route::get('CursosTecnica/create.html','CursosCarreraTecnicaController@nuevo');
Route::post('CursosTecnica/insert.html','CursosCarreraTecnicaController@insertar');
Route::get('CursosTecnica/index.html','CursosCarreraTecnicaController@listar');

Route::get('CursosTecnica/updatesID.html','CursosCarreraTecnicaController@ActualizarBuscandoNombre');
Route::get('CursosTecnica/updatecID/{id}',array('uses'=>'CursosCarreraTecnicaController@ActualizarConID'));
Route::post('CursosTecnica/post_update.html',array('uses'=>'CursosCarreraTecnicaController@post_actualizar'));

Route::get('CursosTecnica/delete.html','CursosCarreraTecnicaController@get_eliminar');
Route::get('CursosTecnica/post_delete/{id}',array('uses'=>'CursosCarreraTecnicaController@post_eliminar'));
Route::post('CursosTecnica/eliminar.html','CursosCarreraTecnicaController@eliminando');

//Modulo silabo de carrera libre
Route::get('SilaboCarreraLibre/create.html','SilaboCarreraLibreController@nuevo');
Route::get('SilaboCarreraLibre/index.html','SilaboCarreraLibreController@listar');
Route::post('SilaboCarreraLibre/insert.html','SilaboCarreraLibreController@insertar');

Route::get('SilaboCarreraLibre/updatesID.html','SilaboCarreraLibreController@ActualizarBuscandoNombre');
Route::get('SilaboCarreraLibre/updatecID/{id}',array('uses'=>'SilaboCarreraLibreController@ActualizarConID'));
Route::post('SilaboCarreraLibre/post_update.html',array('uses'=>'SilaboCarreraLibreController@post_actualizar'));

Route::get('SilaboCarreraLibre/delete.html','SilaboCarreraLibreController@get_eliminar');
Route::get('SilaboCarreraLibre/post_delete/{id}',array('uses'=>'SilaboCarreraLibreController@post_eliminar'));
Route::post('SilaboCarreraLibre/eliminar.html','SilaboCarreraLibreController@eliminando');

//Modulo silabo de carrera tecnica
Route::get('SilaboCarreraTecnica/create.html','SilaboCarreraTecnicaController@nuevo');
Route::get('SilaboCarreraTecnica/index.html','SilaboCarreraTecnicaController@listar');
Route::post('SilaboCarreraTecnica/insert.html','SilaboCarreraTecnicaController@insertar');

Route::get('SilaboCarreraTecnica/updatesID.html','SilaboCarreraTecnicaController@ActualizarBuscandoNombre');
Route::get('SilaboCarreraTecnica/updatecID/{id}',array('uses'=>'SilaboCarreraTecnicaController@ActualizarConID'));
Route::post('SilaboCarreraTecnica/post_update.html',array('uses'=>'SilaboCarreraTecnicaController@post_actualizar'));

Route::get('SilaboCarreraTecnica/delete.html','SilaboCarreraTecnicaController@get_eliminar');
Route::get('SilaboCarreraTecnica/post_delete/{id}',array('uses'=>'SilaboCarreraTecnicaController@post_eliminar'));
Route::post('SilaboCarreraTecnica/eliminar.html','SilaboCarreraTecnicaController@eliminando');
Route::get('CursosTecnica/post_delete/',array('uses'=>'CursosCarreraTecnicaController@post_eliminar'));


// carga academica
// carga academica


// carga academica
Route::get('/crearCargaCt','CargaControllerCt@CargarIndexCargaCt');
Route::post('/recogerDatos','CargaControllerCt@AgregarDatos');
Route::post('/horarios','CargaControllerCt@mostrarHorarios');
Route::get('/MostrarOpciones','CargaControllerCt@MostrarOpciones');
Route::get('/eliminarCarga/{id}', 'CargaControllerCt@eliminarElementoCarga');

Route::get('/crearCargaCl','CargaControllerCl@CargarIndexCargaCl');
Route::post('/recogerDatosCl','CargaControllerCl@AgregarDatos');
Route::get('/mostrarDatos','CargaControllerCt@MostrarDatos');
Route::get('/eliminarCarga/{id}', 'CargaControllerCt@eliminarElementoCarga');


Route::get('ingresonotas/inicioCT','IngresoNotasController@inicioCT');
Route::post('ingresonotas/ingresoCT','IngresoNotasController@cursoCT');
Route::post('ingresonotas/ingresoNotaCT','IngresoNotasController@ingresoCT');
Route::post('ingresonotas/consolidadoCT','IngresoNotasController@consolidadoCT');
Route::get('ingresonotas/registroCT','IngresoNotasController@registroCT');

Route::get('ingresonotas/inicioCL','IngresoNotasController@inicioCL');
Route::post('ingresonotas/ingresoCL','IngresoNotasController@cursoCL');
Route::post('ingresonotas/ingresoNotaCL','IngresoNotasController@ingresoCL');
Route::post('ingresonotas/consolidadoCL','IngresoNotasController@consolidadoCL');
Route::get('ingresonotas/registroCL','IngresoNotasController@registroCL');


//Pago en planilla docentes
Route::get('Planilla',array('uses'=>'PlanillaController@index'));
Route::get('Planilla/detalle_Planilla/{id}',array('uses'=>'PlanillaController@detalle_Planilla'))->where('id','[0-9]+');