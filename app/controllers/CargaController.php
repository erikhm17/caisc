
<?php
class CargaController extends \BaseController {

	public function CargarIndexCarga(){
		return View::make('vistaCarga.indexCarga');
	}
	public function CargarIndexCargaCt(){

		$elementosComboCodCurso_ct = CursoTecnico::all()->lists('codCurso_ct','codCurso_ct');
		$elementosComboCodDocente = Docente::all()->lists('id','id');
		$elementosComboSemestre = Semestre::all()->lists('id','id');
		$elementosComboTurno = Turno::all()->lists('id','id');
		$elementosComboGrupo = Grupo::all()->lists('id','id');
		$elementosComboCodAula = Aula::all()->lists('codAula','codAula');
		

		return View::make('vistaCarga.crearCargaCt',array(
			'varElementosComboSemestre'=>$elementosComboSemestre,
			'varElementosComboCodCurso_ct'=>$elementosComboCodCurso_ct,
			'varElementosComboCodDocente'=>$elementosComboCodDocente,
			'varElementosComboCodAula'=>$elementosComboCodAula,
			'varElementosComboTurno'=>$elementosComboTurno,
			'varElementosComboGrupo'=>$elementosComboGrupo,

			));
	}
	public function AgregarDatos(){
		/*	DB::select('call insertarCargaAcademica_ct(?,?,?,?,?,?,?,?)',
				array('1','2141','1','1','1','A101','14-15','Lunes'));*/

		$codCurso_ct= $_POST['cmbCursos'];
		$docente_id=$_POST['cmbDocentes'];
		//$semestre = Input::get('txtSemestre');
		$semestre = $_POST['cmbSemestre'];
		$turno=$_POST['cmbTurnos'];
		$grupo=$_POST['cmbGrupos'];
		$aula=$_POST['cmbAulas'];

		// 2 1 2 1 1 2 7-8 lunes
		//$hora=$_POST['rbHorariosLunes'];
	    //echo " ".$codCurso_ct." ".$docente_id." ".$semestre." ".$turno." ".$grupo." ".$aula." ".$hora." ".'lunes'." ";
		//$validador = DB::select('call validarCarga(?,?,?)',array($aula,));
		global $hora;

		if (Input::get('rbHorariosLunes')) {
			$hora=$_POST['rbHorariosLunes'];
				
			DB::select('call insertarCargaAcademica_ct(?,?,?,?,?,?,?,?)'
			    ,array($codCurso_ct,$docente_id,$semestre,$turno,$grupo,$aula,$hora,'lunes'));
		} else {}

		if (Input::get('rbHorariosMartes')) {
			$hora=$_POST['rbHorariosMartes'];
		   DB::select('call insertarCargaAcademica_ct(?,?,?,?,?,?,?,?)'
			    ,array($codCurso_ct,$docente_id,$semestre,$turno,$grupo,$aula,$hora,'martes'));

		} else {}
		if (Input::get('rbHorariosMiercoles')) {
			
			$hora=$_POST['rbHorariosMiercoles'];
		   DB::select('call insertarCargaAcademica_ct(?,?,?,?,?,?,?,?)'
			    ,array($codCurso_ct,$docente_id,$semestre,$turno,$grupo,$aula,$hora,'miercoles'));

		} else {}
		if (Input::get('rbHorariosJueves')) {
			
			$hora=$_POST['rbHorariosJueves'];
		    DB::select('call insertarCargaAcademica_ct(?,?,?,?,?,?,?,?)'
			    ,array($codCurso_ct,$docente_id,$semestre,$turno,$grupo,$aula,$hora,'jueves'));

		} else {}
		if (Input::get('rbHorariosViernes')) {
			
			$hora=$_POST['rbHorariosViernes'];
		   DB::select('call insertarCargaAcademica_ct(?,?,?,?,?,?,?,?)'
			    ,array($codCurso_ct,$docente_id,$semestre,$turno,$grupo,$aula,$hora,'viernes'));

		} else {}
		if (Input::get('rbHorariosSabado')) {
			
			$hora=$_POST['rbHorariosSabado'];
		    DB::select('call insertarCargaAcademica_ct(?,?,?,?,?,?,?,?)'
			    ,array($codCurso_ct,$docente_id,$semestre,$turno,$grupo,$aula,$hora,'sabado'));

		} else {
			echo "No se registro ningun dato";
		}
		return View::make('vistaCarga.datoInsertado');
		

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