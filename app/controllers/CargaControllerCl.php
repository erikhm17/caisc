<?php
class CargaControllerCl extends \BaseController {

	public function CargarIndexCarga(){
		return View::make('vistaCarga.indexCarga');
	}
	public function CargarIndexCargaCl(){

		$elementosComboCodCurso_cl = CursoLibre::all()->lists('id','id');
		$elementosComboCodDocente = Docente::all()->lists('id','id');
		$elementosComboTurno = Turno::all()->lists('id','id');
		$elementosComboGrupo = Grupo::all()->lists('id','id');
		$elementosComboSemestre = Semestre::all()->lists('id','id');
		$elementosComboCodAula = Aula::all()->lists('codAula','codAula');
		
		return View::make('vistaCarga.crearCargaCl',array(
			'varElementosComboCursos'=>$elementosComboCodCurso_cl,
			'varElementosComboIdDocentes'=>$elementosComboCodDocente,
			'varElementosComboTurnos'=>$elementosComboTurno,
			'varElementosComboGrupos'=>$elementosComboGrupo,
			'varElementosComboSemestres'=>$elementosComboSemestre,
			'varElementosComboCodAula'=>$elementosComboCodAula,

			));
	}
	public function AgregarDatos(){
		
		$codCursoCl=$_POST['cmbCodCursos'];
		$codDocente=$_POST['cmbIdDocentes'];
		$turno=$_POST['cmbTurnos'];
		$grupo=$_POST['cmbGrupos'];
		$semestre=$_POST['cmbSemestres'];
		$aula=$_POST['cmbAulas'];

		$dias_inicio= $_POST['cmbDiasInicio'];
		$meses_inicio=$_POST['cmbMesesInicio'];
		$anios_inicio=$_POST['cmbAniosInicio'];
		
		$dias_fin= $_POST['cmbDiasFin'];
		$meses_fin=$_POST['cmbMesesFin'];
		$anios_fin=$_POST['cmbAniosFin'];
		
		$estado=$_POST['cmbEstado'];
		$minimo=$_POST['txtMinimo'];
		
		// convertir 
		$auxInicio = date_create(''.$anios_inicio.'-'.$meses_inicio.'-'.$dias_inicio);
		$auxFin = date_create(''.$anios_fin.'-'.$meses_fin.'-'.$dias_fin);

		$fechaInicio =date_format($auxInicio, 'Y-m-d H:i:s');
		$fechaFin =date_format($auxFin, 'Y-m-d H:i:s');

		global $hora;

		if (Input::get('rbHorariosLunes')) {
			$hora=$_POST['rbHorariosLunes'];
			$validador = DB::select('select validarCarga(?,?,?)',array($aula,$hora,'lunes'));
			if ($validador="Disponible") {
				DB::select('call insertarCargaAcademica_cl(?,?,?,?,?,?,?,?,?,?,?,?)'
		    	,array($codCursoCl,$codDocente,$turno,$grupo,$semestre,$fechaInicio,$fechaFin,$estado,$minimo,$aula,$hora,'lunes'));		
		    	echo "exito";

			} else {
				if ($validador != "Disponible") {
					echo "no esta disponible";
				   }
			}
		    
		} else {}

		
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