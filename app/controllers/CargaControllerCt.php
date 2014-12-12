<?php
class CargaControllerCt extends \BaseController {
	
	public function CargarIndexCargaCt(){

		$elementosComboCodCurso_ct = CursoTecnico::all()->lists('id','id');
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
		
		global $horaLunes;
		global $horaMartes;
		global $horaMiercoles;
		global $horaJueves;
		global $horaViernes;
		global $horaSabado;
		
		$restrict=false;
		$restrictFinal=false;

		if (Input::get('rbHorariosLunes')) {
			$horaLunes=$_POST['rbHorariosLunes'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaLunes,'lunes'));
			$obj = $validador[0];
			
				if ($obj->temp !== "Disponible") {
					//echo "no esta disponible";
					echo "Lunes a las : ".$horaLunes." no esta disponible ";
					$restrict=true;
				
			}
		    
		} 

		if (Input::get('rbHorariosMartes')) {
		   $horaMartes=$_POST['rbHorariosMartes'];
		   $validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaMartes,'martes'));
		   $obj = $validador[0];
			
				if ($obj->temp !== "Disponible") {
					//echo "no esta disponible";
					echo "El Martes a las : ".$horaMartes." no esta disponible ";
					$restrict=true;
			
			}
		} 
		if (Input::get('rbHorariosMiercoles')) {
			$horaMiercoles=$_POST['rbHorariosMiercoles'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaMiercoles,'miercoles'));
			$obj = $validador[0];
			
				if ($obj->temp !== "Disponible") {
					//echo "no esta disponible";
					echo "El Miercoles a las : ".$horaMiercoles." no esta disponible ";
					$restrict=true;
			
			}
		} 
		if (Input::get('rbHorariosJueves')) {
			$horaJueves=$_POST['rbHorariosJueves'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaJueves,'jueves'));
			$obj = $validador[0];
			
				if ($obj->temp !== "Disponible") {
					//echo "no esta disponible";
					echo "El Jueves a las : ".$horaJueves." no esta disponible ";
					$restrict=true;
			
			}
		} 
		if (Input::get('rbHorariosViernes')) {
			$horaViernes=$_POST['rbHorariosViernes'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaViernes,'viernes'));
			$obj = $validador[0];
			
				if ($obj->temp !== "Disponible") {
					//echo "no esta disponible";
					echo "el Viernes a las : ".$horaViernes." no esta disponible ";
					$restrict=true;
			
			}
		} 
		if (Input::get('rbHorariosSabado')) {
			$horaSabado=$_POST['rbHorariosSabado'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaSabado,'sabado'));
			$obj = $validador[0];
			
				if ($obj->temp !== "Disponible") {
					//echo "no esta disponible";
					echo "Sabado a las : ".$horaSabado." no esta disponible ";
					$restrict=true;
				
			}
		} 
		
		if ($restrict==false) {
			$restrictFinal ==false;
			if (Input::get('rbHorariosLunes')) {
			$hora=$_POST['rbHorariosLunes'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaLunes,'lunes'));
			$obj = $validador[0];
			if ($obj->temp=="Disponible" and $restrict==false ) {
				if ($restrictFinal==false) {
				DB::select('call insertarCargaAcademica_ct(?,?,?,?,?,?,?,?)'
		    	,array($codCurso_ct,$docente_id,$semestre,$turno,$grupo,$aula,$horaLunes,'lunes'));		
		    	
		    	echo "Lunes a las : ".$horaLunes." , ";
		   		}
			} else {
				if ($obj->temp !== "Disponible") {
					//echo "no esta disponible";
					$restrict=true;
				}
			}
		    
		} 

		if (Input::get('rbHorariosMartes')) {
		   $hora=$_POST['rbHorariosMartes'];
		   $validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaMartes,'martes'));
		   $obj = $validador[0];
			if ($obj->temp=="Disponible" and $restrict==false ) {
				if ($restrictFinal==false) {
				DB::select('call insertarCargaAcademica_ct(?,?,?,?,?,?,?,?)'
		    	,array($codCurso_ct,$docente_id,$semestre,$turno,$grupo,$aula,$horaMartes,'martes'));		
		    	
		    	echo "Martes a las : ".$horaMartes." , ";
		   		}
			} else {
				if ($obj->temp !== "Disponible") {
					//echo "no esta disponible";
					$restrict=true;
				}
			}
		} 
		if (Input::get('rbHorariosMiercoles')) {
			$hora=$_POST['rbHorariosMiercoles'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaMiercoles,'miercoles'));
			$obj = $validador[0];
			if ($obj->temp=="Disponible" and $restrict==false ) {
				if ($restrictFinal==false) {
				DB::select('call insertarCargaAcademica_ct(?,?,?,?,?,?,?,?)'
		    	,array($codCurso_ct,$docente_id,$semestre,$turno,$grupo,$aula,$horaMiercoles,'miercoles'));		
		    	echo "Miercoles a las : ".$horaMiercoles." , ";
		   		}
			} else {
				if ($obj->temp !== "Disponible") {
					//echo "no esta disponible";
					$restrict=true;
				}
			}
		} 
		if (Input::get('rbHorariosJueves')) {
			$hora=$_POST['rbHorariosJueves'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaJueves,'jueves'));
			$obj = $validador[0];
			if ($obj->temp=="Disponible" and $restrict==false ) {
				if ($restrictFinal==false) {
				DB::select('call insertarCargaAcademica_ct(?,?,?,?,?,?,?,?)'
		    	,array($codCurso_ct,$docente_id,$semestre,$turno,$grupo,$aula,$horaJueves,'jueves'));		
		    	echo "Jueves a las : ".$horaJueves." , ";
		   		}
			} else {
				if ($obj->temp !== "Disponible") {
					//echo "no esta disponible";
					$restrict=true;
				}
			}
		} 
		if (Input::get('rbHorariosViernes')) {
			$hora=$_POST['rbHorariosViernes'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaViernes,'viernes'));
			$obj = $validador[0];
			if ($obj->temp=="Disponible" and $restrict==false ) {
				if ($restrictFinal==false) {
				DB::select('call insertarCargaAcademica_ct(?,?,?,?,?,?,?,?)'
		    	,array($codCurso_ct,$docente_id,$semestre,$turno,$grupo,$aula,$horaViernes,'viernes'));		
		    	echo "Viernes a las : ".$horaViernes." , ";
		   		}
			} else {
				if ($obj->temp !== "Disponible") {
					//echo "no esta disponible";
					$restrict=true;
				}
			}
		} 
		if (Input::get('rbHorariosSabado')) {
			$hora=$_POST['rbHorariosSabado'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaSabado,'sabado'));
			$obj = $validador[0];
			if ($obj->temp=="Disponible" and $restrict==false ) {
				if ($restrictFinal==false) {
				DB::select('call insertarCargaAcademica_ct(?,?,?,?,?,?,?,?)'
		    	,array($codCurso_ct,$docente_id,$semestre,$turno,$grupo,$aula,$horaSabado,'sabado'));		
		    	echo "Sabado a las : ".$horaSabado." , ";
		   		}
			} else {
				if ($obj->temp !== "Disponible") {
					//echo "no esta disponible";
					$restrict=true;
				}
			}
		} 
		} else {
			echo "no se Puede  insertar";
		}
		return View::make('vistaCarga.datoInsertado');
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
        }else{
            echo "el elemento no se pudo eliminar";
        }
	}

}