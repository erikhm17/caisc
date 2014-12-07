<?php

class AlumnoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//mostrar todos los alumnos que tenemos en la base de datos
		$alumnos = Alumno::all();
		return View::make('alumno.index')->with('alumnos',$alumnos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('alumno.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$alumno = new Alumno();
		$alumno->id = Input::get('codAlumno');
		$alumno->nombre = Input::get('nombre');
		$alumno->apellidos = Input::get('apellidos');
		$alumno->dni = Input::get('dni');
		$alumno->direccion = Input::get('direccion');
		$alumno->telefono = Input::get('telefono');
		$alumno->email = Input::get('email');
		$alumno->pasword = Input::get('password');
		$alumno->estado = Input::get('estado');
		$alumno->codCarrera = Input::get('codCarrera');
		$alumno->modulo = Input::get('modulo');
		$alumno->save();
		return Redirect::to('alumno');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$alumno = Alumno::find($id);
		return View::make('alumno.show')->with('alumno',$alumno);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	

		$alumno = Alumno::find($id);
		return View::make('alumno.edit')->with('alumno',$alumno);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$alumno = Alumno::find($id);
		$alumno->nombre = Input::get('nombre');
		$alumno->apellidos = Input::get('apellidos');
		$alumno->dni = Input::get('dni');
		$alumno->direccion = Input::get('direccion');
		$alumno->telefono = Input::get('telefono');
		$alumno->email = Input::get('email');
		$alumno->pasword = Input::get('pasword');
		$alumno->estado = Input::get('estado');
		$alumno->codCarrera = Input::get('codCarrera');
		$alumno->modulo = Input::get('modulo');
		$alumno->save();
		return Redirect::to('alumno');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
	}


}
