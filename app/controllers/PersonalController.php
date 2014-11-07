<?php

class PersonalController extends BaseController
{
	public function index()
	{
		$personal = Personal::all();
		return View::make('personal.index',array('personal'=>$personal));
	}
	public function profile($id = null)
	{
		if (is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$personal = Personal::where('id','=',$id)->firstOrFail();
			if (is_object($personal))
			{
				return View::make('personal.profile',array('personal'=>$personal));
			} else {
				return Redirect::to('404.html');
			}
		}
	}
	public function add()
	{
		return View::make('personal.add');
	}
	public function insert()
	{
		$respuesta = Personal::agregar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('personal/add')->with('mensaje',$respuesta['mensaje'])->withInput();
		} else {
			return Redirect::to('personal')->with('mensaje',$respuesta['mensaje']);
		}
	}
	public function edit($id=null)
	{
		if(is_null($id))
		{
			return Redirect::to('404.html');
		} else {
			$personal = Personal::where('id','=',$id)->firstOrFail();
			return View::make('personal.edit',array('personal'=>$personal));
		}
	}
	public function update()
	{
		$id=Input::get('id');
		if(is_null($id))
		{
			Redirect::to('404.html');
		} else {
			$personal = Personal::where('id','=',$id)->firstOrFail();
			if(is_object($personal))
			{
				$personal->nombre = Input::get('nombre');
				$personal->apellidos = Input::get('apellidos');
				$personal->email = Input::get('email');
				$personal->telefono = Input::get('telefono');
				$personal->save();
				return Redirect::to('personal');
			} else {
				Redirect::to('500.html');
			}
		}
	}
	public function delete($id = null)
	{
		if(is_null($id))
		{
			Redirect::to('404.html');
		} else {
			$personal = Personal::where('id','=',$id)->firstOrFail();
			if(is_object($personal))
			{
				$personal->estado = '0';
				$personal->save();
				return Redirect::to('personal');
			}
		}
	}
}
