<?php

class LoginController extends BaseController
{
	
	public function login()
	{
		$email = null;
		if(is_null($email))
		{
			return View::make('login');
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
