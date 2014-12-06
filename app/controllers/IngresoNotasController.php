<?php

class IngresoNotasController extends \BaseController {

	public function inicio()
	{ 
		$idDocente = 10001;
		$cursos = DB::select('call CursosXDocente(' . $idDocente . ')');
      	return View::make("ingresonotas/index", compact('cursos'));
	}
	public function curso()
	{ 
		$idDocente = 10001;
		$id = Input::get('id');
		$cursos = DB::select('call CursosXDocente(' . $idDocente . ')');
		$alumnos = DB::select('call AlumnosXCurso(' . $id . ')');
      	return View::make("ingresonotas/ingreso", compact('cursos', 'id', 'alumnos'));
	}
	public function ingreso()
	{ 
		for ($i=1; $i < Input::get('i'); $i++) { 
			$id = Input::get("codMatricula$i");
			$nota1 = Input::get("nota1$i");
			$nota2 = Input::get("nota2$i");
			$nota3 = Input::get("nota3$i");
			$nota = Nota::find($id);
			$nota->notaa =  $nota1;
			$nota->notab =  $nota2;
			$nota->notac =  $nota3;
			$nota->save();
		}
		$alumnos = DB::select('call AlumnosXCurso(' . Input::get("idCurso") . ')');
      	return View::make("ingresonotas/Consolidado", compact('alumnos'));
	} 
}