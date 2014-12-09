<?php

class IngresoNotasController extends \BaseController {

	public function inicioCT()
	{ 
		$idDocente = 10001;
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
      	return View::make("ingresonotas/indexCT", compact('cursos'));
	}
	public function cursoCT()
	{ 
		$idDocente = 10001;
		$id = Input::get('id');
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
		$alumnos = DB::select('call AlumnosXCursoCT(' . $id . ')');
      	return View::make("ingresonotas/ingresoCT", compact('cursos', 'id', 'alumnos'));
	}
	public function ingresoCT()
	{ 
		for ($i=1; $i <= Input::get('i'); $i++) { 
			$id = Input::get("codMatricula$i");
			$nota1 = Input::get("nota1$i");
			$nota2 = Input::get("nota2$i");
			$nota3 = Input::get("nota3$i");
			$nota = NotaCT::find($id);
			$nota->notaa =  $nota1;
			$nota->notab =  $nota2;
			$nota->notac =  $nota3;
			$nota->save();
		}
		$idDocente = 10001;
		$id = Input::get('idCurso');
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
		$alumnos = DB::select('call AlumnosXCursoCT(' . $id . ')');
      	return View::make("ingresonotas/consolidadoCT", compact('cursos', 'id', 'alumnos'));
	} 
	public function consolidadoCT()
	{ 
		$idDocente = 10001;
		$id = Input::get('id');
		$cursos = DB::select('call CursosXDocenteCT(' . $idDocente . ')');
		$alumnos = DB::select('call AlumnosXCursoCT(' . $id . ')');
      	return View::make("ingresonotas/consolidadoCT", compact('cursos', 'id', 'alumnos'));
	}

	public function inicioCL()
	{ 
		$idDocente = 10002;
		$cursos = DB::select('call CursosXDocenteCL(' . $idDocente . ')');
      	return View::make("ingresonotas/indexCL", compact('cursos'));
	}
	public function cursoCL()
	{ 
		$idDocente = 10002;
		$id = Input::get('id');
		$cursos = DB::select('call CursosXDocenteCL(' . $idDocente . ')');
		$alumnos = DB::select('call AlumnosXCursoCL(' . $id . ')');
      	return View::make("ingresonotas/ingresoCL", compact('cursos', 'id', 'alumnos'));
	}

	public function ingresoCL()
	{ 
		for ($i=1; $i <= Input::get('i'); $i++) { 
			$id = Input::get("codMatricula$i");
			$nota1 = Input::get("nota$i");
			$nota = NotaCL::find($id);
			$nota->nota =  $nota1;
			$nota->save();
		}
		$idDocente = 10002;
		$id = Input::get('idCurso');
		$cursos = DB::select('call CursosXDocenteCL(' . $idDocente . ')');
		$alumnos = DB::select('call AlumnosXCursoCL(' . $id . ')');
      	return View::make("ingresonotas/consolidadoCL", compact('cursos', 'id', 'alumnos'));
	} 
	public function consolidadoCL()
	{ 
		$idDocente = 10002;
		$id = Input::get('id');
		$cursos = DB::select('call CursosXDocenteCL(' . $idDocente . ')');
		$alumnos = DB::select('call AlumnosXCursoCL(' . $id . ')');
      	return View::make("ingresonotas/consolidadoCL", compact('cursos', 'id', 'alumnos'));
	}
}