<?php

class Login extends BaseController{

	public function postUser()
	{
		//get POST data
		$userdata = array(
			'email' => Input::get('email'),
			'password'=> Input::get('pass')
		);
		//$datoAdicional = Input::get("");

		if(Auth::attempt($userdata))
		{
			//obtengo cualquier atributo de latabla
			//$ird = Auth::get()->id;
			//$email = Auth::user()->email;
			//$tipo = Auth::user()->tipoUsuario;
			$ird = Auth::user()->getnroId();
			$tipoUsuario = Auth::user()->gettipoUsuario();
			/*if (Auth::check())
			{			 	
			 	return Redirect::to('docente/profile/'.$ird);
			 	
			}*/
			
			if($tipoUsuario == "Docente")
			{
				return Redirect::to('docente/profile/'.$ird);				
			}
			else
			{
				if($tipoUsuario=="Personal")
				{
					return Redirect::to('personal/profile/'.$ird);									
				}
			}
			
		}
		else
		{
			return Redirect::to('/')->with('mensaje',"Error Datos incorrectos ingrese nuevamente!!!");									
				//return "Error Datos no Validos.";				
		}


	}

}