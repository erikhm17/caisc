<?php

class AlumnoController extends BaseController
{
	public function index($registros=5)
	{
		$datos = Alumno::paginate($registros);
		$alumnos = Alumno::all();
		return View::make('alumno.index',compact("datos"),array('alumnos'=>$alumnos));
	}

	public function add()
	{
		$carreras = Carrera::all();
		$modulos = Modulo::all();
		return View::make('alumno.add', compact('carreras','modulos'));
	}

	public function insert()
	{
		$respuesta = Alumno::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('alumno/add.html')->withErrors($respuesta['mensaje'] )->withInput();
		} else {
			return Redirect::to('alumnos')->with('mensaje',$respuesta['mensaje']);
		}
	}
	public function edit($id=null)
	{
	
			$alumno = Alumno::where('codAlumno','=',$id)->firstOrFail();
			return View::make('alumno.edit',array('alumno'=>$alumno));
	}
	public function update($id=0)
	{
		if($id<1)
		{
			Redirect::to('404.html');
		} else {
			$alumno = Alumno::where('codAlumno','=',$id)->firstOrFail();
			if(is_object($alumno))
			{
				$alumno->nombre = Input::get('nombre');
				$alumno->apellidos = Input::get('apellidos');
				$alumno->email = Input::get('email');
				$alumno->telefono = Input::get('telefono');
				$alumno->save();
				return Redirect::to('alumnos');
			} else {
				Redirect::to('500.html');
			}
		}
	}
	public function profile($id = null)
	{
		$alumno = alumno::where('codAlumno','=',$id)->firstOrFail();
		if (is_object($alumno))
		{
			return View::make('alumno.profile',array('alumno'=>$alumno));
		} else {
			return Redirect::to('404.html');
		}
	}
}