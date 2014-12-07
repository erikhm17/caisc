<?php

class CargoController extends BaseController
{
	public function index()
	{
		$cargos = Cargo::all();
		return View::make('personal.cargo.index',array('cargos'=>$cargos));
	}
	public function add()
	{
		return View::make('personal.cargo.add');
	}
	public function insert()
	{
		$respuesta = Cargo::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('personal/cargo/add')->with('mensaje',$respuesta['mensaje'])->withInput();
		} else {
			return Redirect::to('personal/cargos')->with('mensaje',$respuesta['mensaje']);
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
		$cod=Input::get('codDocente');
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
				$docente->estado = '0';
				$docente->save();
				return Redirect::to('docentes');
			}
		}
	}
}
