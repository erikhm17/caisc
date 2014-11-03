<?php

class DocenteController extends BaseController
{
	public function index()
	{
		$docentes = Docente::all();
		return View::make('docente.index',array('docentes'=>$docentes));
	}
	public function profile($cod = null)
	{
		if (is_null($cod) or ! is_numeric($cod))
		{
			return Redirect::to('404.html');
		} else {
			$docente = Docente::where('codDocente','=',$cod)->firstOrFail();
			if (is_object($docente))
			{
				return View::make('docente.profile',array('docente'=>$docente));
			} else {
				return Redirect::to('404.html');
			}
		}
	}
	public function add()
	{
		return View::make('docente.add');
	}
	public function insert()
	{
		$respuesta = Docente::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('docente/add')->with('mensaje',$respuesta['mensaje'])->withInput();
		} else {
			return Redirect::to('docentes')->with('mensaje',$respuesta['mensaje']);
		}
	}
	public function edit($cod=null)
	{
		if(is_null($cod))
		{
			return Redirect::to('404.html');
		} else {
			$docente = Docente::where('codDocente','=',$cod)->firstOrFail();
			return View::make('docente.edit',array('docente'=>$docente));
		}
	}
	public function update()
	{
		$input=Input::get('codDocente');
		if(is_null($cod))
		{
			Redirect::to('404.html');
		} else {
			$docente = Docente::where('codDocente','=',$cod)->firstOrFail();
			if(is_object($docente))
			{
				$docente->nombre = Input::get('nombre');
				$docente->apellidos = Input::get('apellidos');
				$docente->email = Input::get('email');
				$docente->telefono = Input::get('telefono');
				$docente->save();
				return Redirect::to('docentes');
			} else {
				Redirect::to('500.html');
			}
		}
	}
	public function delete($cod = null)
	{
		if(is_null($cod))
		{
			Redirect::to('404.html');
		} else {
			$docente = Docente::where('codDocente','=',$cod)->firstOrFail();
			if(is_object($docente))
			{
				$docente->estado = '1';
				$docente->save();
				return Redirect::to('docentes');
			}
		}
	}
	public function login()
	{
		$email = null;
		if(is_null($email))
		{
			return View::make('docente/login');
		} else {
			$docente = Docente::where('email','=',$email)->first();
			// Activar sessión
			return Redirect::to('docente/profile/'.$docente->codDocente);
		}
	}
	public function loginInit()
	{

	}
	public function logout()
	{
		// Destruir sessión
		// Redirigir a Login
		return Redirect::to('docente/login.html');
	}
}
