<?php
class CargaController extends \BaseController {

	public function CargarIndexCarga(){
		return View::make('vistaCarga.indexCarga');
	}
	public function CargarIndexCargaCt(){
		return View::make('vistaCarga.crearCargaCt');
	}
	public function AgregarDatos(){

		$codCurso_ct= $_POST['cmbCursos'];
		$docente_id=$_POST['cmbDocentes'];
		//$semestre = Input::get('txtSemestre');
		$semestre = $_POST['cmbSemestre'];
		$turno=$_POST['cmbTurnos'];
		$grupo=$_POST['cmbGrupos'];
		$aula=$_POST['cmbAulas'];
	
		
		if (Input::get('rbHorariosLunes')) {
			return View::make('vistaCarga.datoInsertado');
			$hora=$_POST['rbHorariosLunes'];
		    $id = DB::table('tcargaacademica')->insertGetId(
		    array('codCurso_ct' => $codCurso_ct,
		    	  'docente_id'=>$docente_id,
		    	  'semestre'=>$semestre,
		    	  'turno'=>$turno,
		    	  'grupo'=>$grupo,
		    	  'aula'=>$aula,
		    	  'hora'=>$hora,
		    	  'dia'=>'lunes'
		    	 )
			);

		} else {}
		if (Input::get('rbHorariosMartes')) {
			return View::make('vistaCarga.datoInsertado');
			$hora=$_POST['rbHorariosMartes'];
		    $id = DB::table('tcargaacademica')->insertGetId(
		    array('codCurso_ct' => $codCurso_ct,
		    	  'docente_id'=>$docente_id,
		    	  'semestre'=>$semestre,
		    	  'turno'=>$turno,
		    	  'grupo'=>$grupo,
		    	  'aula'=>$aula,
		    	  'hora'=>$hora,
		    	  'dia'=>'martes'
		    	 )
			);

		} else {}
		if (Input::get('rbHorariosMiercoles')) {
			return View::make('vistaCarga.datoInsertado');
			$hora=$_POST['rbHorariosMiercoles'];
		    $id = DB::table('tcargaacademica')->insertGetId(
		    array('codCurso_ct' => $codCurso_ct,
		    	  'docente_id'=>$docente_id,
		    	  'semestre'=>$semestre,
		    	  'turno'=>$turno,
		    	  'grupo'=>$grupo,
		    	  'aula'=>$aula,
		    	  'hora'=>$hora,
		    	  'dia'=>'miercoles'
		    	 )
			);

		} else {}
		if (Input::get('rbHorariosJueves')) {
			return View::make('vistaCarga.datoInsertado');
			$hora=$_POST['rbHorariosJueves'];
		    $id = DB::table('tcargaacademica')->insertGetId(
		    array('codCurso_ct' => $codCurso_ct,
		    	  'docente_id'=>$docente_id,
		    	  'semestre'=>$semestre,
		    	  'turno'=>$turno,
		    	  'grupo'=>$grupo,
		    	  'aula'=>$aula,
		    	  'hora'=>$hora,
		    	  'dia'=>'jueves'
		    	 )
			);

		} else {}
		if (Input::get('rbHorariosViernes')) {
			return View::make('vistaCarga.datoInsertado');
			$hora=$_POST['rbHorariosViernes'];
		    $id = DB::table('tcargaacademica')->insertGetId(
		    array('codCurso_ct' => $codCurso_ct,
		    	  'docente_id'=>$docente_id,
		    	  'semestre'=>$semestre,
		    	  'turno'=>$turno,
		    	  'grupo'=>$grupo,
		    	  'aula'=>$aula,
		    	  'hora'=>$hora,
		    	  'dia'=>'viernes'
		    	 )
			);

		} else {}
		if (Input::get('rbHorariosSabado')) {
			return View::make('vistaCarga.datoInsertado');
			$hora=$_POST['rbHorariosSabado'];
		    $id = DB::table('tcargaacademica')->insertGetId(
		    array('codCurso_ct' => $codCurso_ct,
		    	  'docente_id'=>$docente_id,
		    	  'semestre'=>$semestre,
		    	  'turno'=>$turno,
		    	  'grupo'=>$grupo,
		    	  'aula'=>$aula,
		    	  'hora'=>$hora,
		    	  'dia'=>'sabado'
		    	 )
			);

		} else {
			echo "No se registro ningun dato";
		}
		
		

	/*	$horaLunes=$_POST['rbHorariosLunes'];
		$horaMartes=$_POST['rbHorariosMartes'];
		$horaMiercoles=$_POST['rbHorariosMiercoles'];
		$horaJueves=$_POST['rbHorariosJueves'];
		$horaViernes=$_POST['rbHorariosViernes'];
		$horaSabado=$_POST['rbHorariosSabado'];
	*/
		
	}
	public $restful=true;
	
	public function MostrarDatos(){
		$elementosCarga = DB::table('tcargaacademica')->get();
	    return View::make('vistaCarga.datosRegistrados')->with('elementosCarga',$elementosCarga);
	}
	public function eliminarElementoCarga($id){
			
		$elemento = DB::delete('DELETE FROM tcargaacademica WHERE codCargaAcademica_ct = ? ', array($id) );
        if($elemento)
        {
            echo "elemento eliminado";
            //return Redirect::to('crud/show')->with(array('mensaje' => 'El post ha sido eliminado correctamente.'));
        }else{
            //return Redirect::to('crud/show')->with(array('mensaje' => "El post con id $id que intentas eliminar no existe."));
            echo "el elemento no se pudo eliminar";
        }
	}
}
