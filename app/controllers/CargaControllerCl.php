<?php
class CargaControllerCl extends \BaseController {

	public function CargarIndexCarga(){
		return View::make('vistaCarga.indexCarga');
	}
	public function CargarIndexCargaCl(){

		$elementosComboCodCurso_cl = CursoLibre::all()->lists('nombre','id');
		$elementosComboCodDocente = Docente::all()->lists('nombre','id');
		$elementosComboTurno = Turno::all()->lists('nombre','id');
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
				$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaMartes,'Martes'));
				//$validador = array('Carlos','Daniel','Xavier','Gonzalo','Karla');
				//$stringValidador=implode($validador,"");
				//print_r($validador[0]);
				$obj = $validador[0];
				//echo  $obj->temp; 

			
					if ($obj->temp !== "Disponible") {
						//echo "no esta disponible";
						echo "Martes a las : ".$horaMartes." no esta disponible ";
						$restrict=true;
					   }
			}

			if (Input::get('rbHorariosMiercoles')) {

				$horaMiercoles=$_POST['rbHorariosMiercoles'];
				$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaMiercoles,'Miercoles'));
				$obj = $validador[0];
			
					if ($obj->temp !== "Disponible") {
						//echo "no esta disponible";
						echo "Miercoles a las : ".$horaMiercoles." no esta disponible ";
						$restrict=true;
				}
			    
			}

			if (Input::get('rbHorariosJueves')) {
				$horaJueves=$_POST['rbHorariosJueves'];
				$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaJueves,'Jueves'));
				$obj = $validador[0];
				
					if ($obj->temp !== "Disponible") {
						//echo "no esta disponible";
						echo "Jueves a las : ".$horaJueves." no esta disponible ";
						$restrict=true;
					}
				
			    
			} 

			if (Input::get('rbHorariosViernes')) {
				$horaViernes=$_POST['rbHorariosViernes'];
				$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaViernes,'Viernes'));
				$obj = $validador[0];
				
					if ($obj->temp !== "Disponible") {
						//echo "no esta disponible";
						echo "Viernes a las : ".$horaViernes." no esta disponible ";
						$restrict=false;
					 }  
			
			} 
			if (Input::get('rbHorariosSabado')) {
				$horaSabado=$_POST['rbHorariosSabado'];
				$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaSabado,'Sabado'));
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
				$horaLunes=$_POST['rbHorariosLunes'];
				$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaLunes,'lunes'));
				$obj = $validador[0];
				if ($obj->temp=="Disponible" and $restrict==false ) {
					if ($restrictFinal==false) {
					DB::select('call insertarCargaAcademica_cl(?,?,?,?,?,?,?,?,?,?,?,?)'
			    	,array($codCursoCl,$codDocente,$turno,$grupo,$semestre,$fechaInicio,$fechaFin,$estado,$minimo,$aula,$horaLunes,'lunes'));		
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
				$horaMartes=$_POST['rbHorariosMartes'];
				$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaMartes,'Martes'));
				//$validador = array('Carlos','Daniel','Xavier','Gonzalo','Karla');
				//$stringValidador=implode($validador,"");
				//print_r($validador[0]);
				$obj = $validador[0];
				//echo  $obj->temp; 

				if ($obj->temp=="Disponible" and $restrict==false ) {
					if ($restrictFinal==false) {
					DB::select('call insertarCargaAcademica_cl(?,?,?,?,?,?,?,?,?,?,?,?)'
			    	,array($codCursoCl,$codDocente,$turno,$grupo,$semestre,$fechaInicio,$fechaFin,$estado,$minimo,$aula,$horaMartes,'Martes'));		
			    	
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

				$horaMiercoles=$_POST['rbHorariosMiercoles'];
				$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaMiercoles,'Miercoles'));
				$obj = $validador[0];
				if ($obj->temp=="Disponible" and $restrict==false ) {
					
					
			    if ($restrictFinal==false) {
						DB::select('call insertarCargaAcademica_cl(?,?,?,?,?,?,?,?,?,?,?,?)'
			    	,array($codCursoCl,$codDocente,$turno,$grupo,$semestre,$fechaInicio,$fechaFin,$estado,$minimo,$aula,$horaMiercoles,'Miercoles'));		
			    	
					echo "El Miercoles a las : ".$horaMiercoles." , ";
						}

				} else {
					if ($obj->temp !== "Disponible") {
						//echo "no esta disponible";
						$restrict=true;
					 
					}
				}
			    
			}

			if (Input::get('rbHorariosJueves')) {
				$horaJueves=$_POST['rbHorariosJueves'];
				$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaJueves,'Jueves'));
				$obj = $validador[0];
				if ($obj->temp=="Disponible" and $restrict==false ) {
					
					
				if ($restrictFinal==false) {
						DB::select('call insertarCargaAcademica_cl(?,?,?,?,?,?,?,?,?,?,?,?)'
			    	,array($codCursoCl,$codDocente,$turno,$grupo,$semestre,$fechaInicio,$fechaFin,$estado,$minimo,$aula,$horaJueves,'Jueves'));		
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
				$horaViernes=$_POST['rbHorariosViernes'];
				$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaViernes,'Viernes'));
				$obj = $validador[0];
				if ($obj->temp=="Disponible" and $restrict==false ) {
				
			    	if ($restrictFinal==false) {
						DB::select('call insertarCargaAcademica_cl(?,?,?,?,?,?,?,?,?,?,?,?)'
			    	,array($codCursoCl,$codDocente,$turno,$grupo,$semestre,$fechaInicio,$fechaFin,$estado,$minimo,$aula,$horaViernes,'Viernes'));		
			    	echo "Viernes a las : ".$horaViernes." , ";
						}
				} else {
					if ($obj->temp !== "Disponible") {
					//	echo "no esta disponible";
						$restrict=false;
					 }  
				}
			    
			} 
			if (Input::get('rbHorariosSabado')) {
				$horaSabado=$_POST['rbHorariosSabado'];
				$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaSabado,'Sabado'));
				$obj = $validador[0];
				if ($obj->temp=="Disponible" and $restrict==false ) {
					
			    	if ($restrictFinal==false) {
						DB::select('call insertarCargaAcademica_cl(?,?,?,?,?,?,?,?,?,?,?,?)'
				    	,array($codCursoCl,$codDocente,$turno,$grupo,$semestre,$fechaInicio,$fechaFin,$estado,$minimo,$aula,$horaSabado,'Sabado'));		
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

	