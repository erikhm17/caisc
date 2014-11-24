<?php

class TurnoController extends \BaseController {

	public function index()
	{
		//MUESTRA TODOS LOS SEMESTRES
		$turnos = Turno::all();
		return View::make('turno.index')->with('turnos', $turnos);
	}

	public function create()
	{
		//MUESTRA EL FORMULARIO PARA INSERTAR UN NUEVO SEMESTRE
		return View::make('turno.create');
	}

	public function store()
	{
		//RECUPERAR LOS DATOS  DE CREATE Y GUARDAR LOS DATOS EN LA BASE DE DATOS
 		$nombre = Input::get('nombre');
 		$a = '[{"nombre":"'.$nombre.'"}]';
 		$b = Turno::select('nombre')->where('nombre', $nombre)->get();
 		if($a==$b){
 			Session::flash('message',"El turno ($nombre) ya existe en la base de datos!");
			Session::flash('class','danger');;
 		}
 		else{
 			$turno = new Turno;
			$turno->nombre = Input::get('nombre');
			$turno->save();
			Session::flash('message','Guardado correctamente!');
			Session::flash('class','success');
 		}
 		return Redirect::to('turno/create');
	}

	public function show($id)
	{
		//RECUPERAMOS LOS DATOS DE ID QUE LE PASEMOS Y MOSTRAMOS TODO EL REGISTRO DEL ID
		$turno = Turno::find($id);
		return View::make('turno.show')->with('turno', $turno);
	}

	public function edit($id)
	{
		//RECUPERAMOS LOS DATOS DEL ID QUE LE PASEMOS
		$turno = Turno::find($id);
		return View::make('turno.edit')->with('turno', $turno);
	}

	public function update($id)
	{
		//RECIBE EL CONTENIDO DEL TEX
		$input = Input::all();
		$turno = Turno::find($id);
		$turno->nombre = $input['nombre'];
		$nombre = $input['nombre'];
 		$a = '[{"nombre":"'.$nombre.'"}]';
 		$b = Turno::select('nombre')->where('nombre', $nombre)->get();
 		if($a==$b){
 			Session::flash('message',"El turno ($nombre) ya existe en la base de datos!");
			Session::flash('class','danger');;
			return Redirect::to('turno/'.$id.'/edit');
 		}
 		else{
			$turno->save();
			Session::flash('message','Modificado correctamente!');
			Session::flash('class','success');
			return Redirect::to('turno/'.$id);
 		};
	}

	public function destroy($id)
	{
		$turno = Turno::find($id);
		$turno->delete();
		Session::flash('message',"El turno Eliminado Correctamente...!");
		Session::flash('class','success');;
		return Redirect::to('turno');
	}

}