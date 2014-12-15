<?php

class DocenteController extends BaseController
{
	public function index($registros=5)
	{
		$datos = Docente::paginate($registros);
		$docentes = Docente::all();
		return View::make('docente.index',compact("datos"),array('docentes'=>$docentes));
	}
	public function profile($id = null)
	{
		if (is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$docente = Docente::where('id','=',$id)->firstOrFail();
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
			return Redirect::to('docente/add.html')->withErrors($respuesta['mensaje'] )->withInput();
		} else {
			return Redirect::to('docentes')->with('mensaje',$respuesta['mensaje']);
		}
	}
	public function edit($id=null)
	{
		if(is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$docente = Docente::where('id','=',$id)->firstOrFail();
			return View::make('docente.edit',array('docente'=>$docente));
		}
	}
	public function update($id=0)
	{
		$respuesta = Docente::editar(Input::all());
		if($respuesta['error']==true)
		{
			return Redirect::to('docente/edit/'.$id)->withErrors($respuesta['mensaje'] )->withInput();
		}
		else
		{
			if($id<1)
			{
				Redirect::to('404.html');
			} else {
				$docente = Docente::where('id','=',$id)->firstOrFail();
				if(is_object($docente))
				{
					$docente->nombre = Input::get('nombre');
					$docente->apellidos = Input::get('apellidos');
					$docente->email = Input::get('email');
					$docente->telefono = Input::get('telefono');
					$docente->save();
					return Redirect::to('docente/profile/'.$id);
				} else {
					Redirect::to('500.html');
				}
			}
		}
	}
	public function delete($id = null)
	{
		if(is_null($id))
		{
			Redirect::to('404.html');
		} else {
			$docente = Docente::where('id','=',$id)->firstOrFail();
			if(is_object($docente))
			{
				$docente->estado = '0';
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

	public function changePass($id = null)
	{
		if (is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$docente = Docente::where('id','=',$id)->firstOrFail();
			if (is_object($docente))
			{
				return View::make('docente.change_pass',array('docente'=>$docente));
			} else {
				return Redirect::to('404.html');
			}
		}
	}
	public function imagen($id=null)
	{
		if(is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$docente = Docente::where('id','=',$id)->firstOrFail();
			return View::make('docente.imagen',array('docente'=>$docente));
		}
	}
	public function uploadImage($id=null)
	{
		$mensaje = "Ocurrio Error";
		if(Input::file("foto")->isValid())
		{
			$file = Input::file("foto");
			$fileName = Input::file('foto')->getClientOriginalName();
			$docente = Docente::where('id','=',$id)->firstOrFail();
			$docente->foto = md5($id."-".$fileName).'.'.Input::file('foto')->getClientOriginalExtension();
			if($docente->save())
			{
				Input::file('foto')->move('assets/foto',$docente->foto);
				$mensaje = "Imagen actualizado";
			}
		}
		return Redirect::to('docente/profile/'.$id)->withErrors($mensaje);
	}
}
