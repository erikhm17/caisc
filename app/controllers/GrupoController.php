<?php

class GrupoController extends \BaseController {

	public function index()
	{
		//MUESTRA TODOS LOS SEMESTRES
		$grupos = Grupo::all();
		return View::make('grupo.index')->with('grupos', $grupos);
	}

	public function create()
	{
		//MUESTRA EL FORMULARIO PARA INSERTAR UN NUEVO SEMESTRE
		return View::make('grupo.create');
	}

	public function store()
	{
		//RECUPERAR LOS DATOS  DE CREATE Y GUARDAR LOS DATOS EN LA BASE DE DATOS
 		$nombre = Input::get('nombre');
 		$a = '[{"nombre":"'.$nombre.'"}]';
 		$b = Grupo::select('nombre')->where('nombre', $nombre)->get();
 		if($a==$b){
 			Session::flash('message',"El grupo ($nombre) ya existe en la base de datos!");
			Session::flash('class','danger');;
 		}
 		else{
 			$grupo = new Grupo;
			$grupo->nombre = Input::get('nombre');
			$grupo->save();
			Session::flash('message','Guardado correctamente!');
			Session::flash('class','success');
 		}
 		return Redirect::to('grupo/create');
	}

	public function show($id)
	{
		//RECUPERAMOS LOS DATOS DE ID QUE LE PASEMOS Y MOSTRAMOS TODO EL REGISTRO D
		$grupo = Grupo::find($id);
		return View::make('grupo.show')->with('grupo', $grupo);
	}

	public function edit($id)
	{
		//RECUPERAMOS LOS DATOS DEL ID QUE LE PASEMOS
		$grupo = Grupo::find($id);
		return View::make('grupo.edit')->with('grupo', $grupo);
	}
	public function exist()
	{
		return 1;
	}
	public function update($id)
	{
		//RECIBE EL CONTENIDO DEL TEX
		$input = Input::all();
		$grupo = Grupo::find($id);
		$grupo->nombre = $input['nombre'];
		$nombre = $input['nombre'];
 		$a = '[{"nombre":"'.$nombre.'"}]';
 		$b = Grupo::select('nombre')->where('nombre', $nombre)->get();

 		if($a==$b){
 			Session::flash('message',"El grupo ($nombre) ya existe en la base de datos!");
			Session::flash('class','danger');;
			return Redirect::to('grupo/'.$id.'/edit');
 		}
 		else{
			$grupo->save();
			Session::flash('message','Modificado correctamente!');
			Session::flash('class','success');
			return Redirect::to('grupo/'.$id);
 		};
		//if()
		//$semestre->save();
		//return Redirect::to('semestre/'.$id);
	}

	public function destroy($id)
	{
		$grupo = Grupo::find($id);
		$grupo->delete();
		Session::flash('message',"El Grupo Eliminado Correctamente...!");
		Session::flash('class','success');;
		return Redirect::to('grupo');
	}

}