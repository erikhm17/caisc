@extends('layouts.base_admin')
@section('title')
Crear Carga<small>carga</small>
@stop
@section('content')
<?php 
	
	/*require 'database.php';*/

	if ( !empty($_POST)) {
		// keep track validation errors

		//$diaError = null;
		//$horaError = null;
		$docenteError = null;
		$aulaError = null;
		$asignaturaError = null;
		//$grupoError = null;
		//$semestreError = null;

		// keep track post values

		$dia = $_POST['dia'];
		$hora = $_POST['hora'];
		$docente = $_POST['docente'];
		$aula = $_POST['aula'];
		$asignatura = $_POST['asignatura'];
		$grupo = $_POST['grupo'];
		$semestre = $_POST['semestre'];
		
		// validate input
	
		$valid = true;
	/*	if (empty($dia)) {
			$diaError = 'ingrese Dia';
			$valid = false;
		}
		
		if (empty($hora)) {
			$horaError = 'Please enter Email Address';
			$valid = false;
		} */
		if ( empty($docente)) {
			$docenteError = 'Please enter a valid Email Address';
			$valid = false;
		}
		
		if (empty($aula)) {
			$aulaError = 'Please enter Mobile Number';
			$valid = false;
		}
		if (empty($asignatura)) {
			$asignaturaError = 'Please enter Email Address';
			$valid = false;
		} 
// insertando los datos
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO tabla_temporal_carga (dia,hora,docente,aula,asignatura,grupo,semestre) values(?,?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($dia,$hora,$docente,$aula,$asignatura,$grupo,$semestre));
			Database::disconnect();
			header("Location: index.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
	.listaBotones li{
		display: inline;

	}
	</style>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    
	<script type="text/javascript" src="js/motor.js"></script>
	<script type="text/javascript" src ="js/validador.js"></script>

</head>

<body>
    	<div class="table-responsive" >
		    <table class="table">
		    	<tr>
		    		<td>Hora</td>
		    		<td>Lunes</td>
		    		<td>Martes</td>
		    		<td>Miercoles</td>
		    		<td>Jueves</td>
		    		<td>Viernes</td>
		    		<td>Sabado</td>
		    	</tr>
				<tr>
					<td class="active">
						<form class="form-horizontal" action="create.php" method="post">
					        <div class="control-group <?php echo !empty($diaError)?'error':'';?>">
							    <label class="control-label">Dia</label>
							    <div class="controls">
							      	<input name="dia" type="text"  placeholder="Dia" value="<?php echo !empty($dia)?$dia:'';?>">
							      	<?php if (!empty($diaError)): ?>
							      		<span class="help-inline"><?php echo $diaError;?></span>
							      	<?php endif; ?>
							    </div>
					        </div>

							<div class="control-group <?php echo !empty($horaError)?'error':'';?>">
							    <label class="control-label">Hora</label>
							    <div class="controls">
							      	<input name="hora" type="text"  placeholder="Hora" value="<?php echo !empty($hora)?$hora:'';?>">
							      	<?php if (!empty($horaError)): ?>
							      		<span class="help-inline"><?php echo $horaError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($docenteError)?'error':'';?>">
							    <label class="control-label">docente</label>
							    <div class="controls">
							      	<input name="docente" type="text"  placeholder="docente" value="<?php echo !empty($docente)?$docente:'';?>">
							      	<?php if (!empty($docenteError)): ?>
							      		<span class="help-inline"><?php echo $docenteError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($aulaError)?'error':'';?>">
							    <label class="control-label">aula</label>
							    <div class="controls">
							      	<input name="aula" type="text"  placeholder="Aula" value="<?php echo !empty($aula)?$aula:'';?>">
							      	<?php if (!empty($aulaError)): ?>
							      		<span class="help-inline"><?php echo $aulaError;?></span>
							      	<?php endif; ?>
								</div>
							</div>

							<div class="control-group <?php echo !empty($asignaturaError)?'error':'';?>">
							    <label class="control-label">asignatura</label>
							    <div class="controls">
							      	<input name="asignatura" type="text"  placeholder="Asignatura" value="<?php echo !empty($asignatura)?$asignatura:'';?>">
							      	<?php if (!empty($asignaturaError)): ?>
							      		<span class="help-inline"><?php echo $asignaturaError;?></span>
							      	<?php endif; ?>
								</div>
							</div>

							<div class="control-group <?php echo !empty($grupoError)?'error':'';?>">
							    <label class="control-label">grupo</label>
							    <div class="controls">
							      	<input name="grupo" type="text"  placeholder="Grupo" value="<?php echo !empty($grupo)?$grupo:'';?>">
							      	<?php if (!empty($grupoError)): ?>
							      		<span class="help-inline"><?php echo $grupoError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($semestreError)?'error':'';?>">
							    <label class="control-label">semestre</label>
							    <div class="controls">
							      	<input name="semestre" type="text"  placeholder="Semestre" value="<?php echo !empty($ciclo)?$ciclo:'';?>">
							      	<?php if (!empty($semestreError)): ?>
							      		<span class="help-inline"><?php echo $semestreError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

						    <div class="form-actions">
								  <button type="submit" class="btn btn-primary">Crear</button>
								  <a class="btn btn-primary" href="">Regresar</a>
							</div>
						</form>
					</td>
					<td class="active">
						<form class="form-horizontal" action="create.php" method="post">
					        <div class="control-group <?php echo !empty($diaError)?'error':'';?>">
							    <label class="control-label">Dia</label>
							    <div class="controls">
							      	<input name="dia" type="text"  placeholder="Dia" value="<?php echo !empty($dia)?$dia:'';?>">
							      	<?php if (!empty($diaError)): ?>
							      		<span class="help-inline"><?php echo $diaError;?></span>
							      	<?php endif; ?>
							    </div>
					        </div>

							<div class="control-group <?php echo !empty($horaError)?'error':'';?>">
							    <label class="control-label">Hora</label>
							    <div class="controls">
							      	<input name="hora" type="text"  placeholder="Hora" value="<?php echo !empty($hora)?$hora:'';?>">
							      	<?php if (!empty($horaError)): ?>
							      		<span class="help-inline"><?php echo $horaError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($docenteError)?'error':'';?>">
							    <label class="control-label">docente</label>
							    <div class="controls">
							      	<input name="docente" type="text"  placeholder="docente" value="<?php echo !empty($docente)?$docente:'';?>">
							      	<?php if (!empty($docenteError)): ?>
							      		<span class="help-inline"><?php echo $docenteError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($aulaError)?'error':'';?>">
							    <label class="control-label">aula</label>
							    <div class="controls">
							      	<input name="aula" type="text"  placeholder="Aula" value="<?php echo !empty($aula)?$aula:'';?>">
							      	<?php if (!empty($aulaError)): ?>
							      		<span class="help-inline"><?php echo $aulaError;?></span>
							      	<?php endif; ?>
								</div>
							</div>

							<div class="control-group <?php echo !empty($asignaturaError)?'error':'';?>">
							    <label class="control-label">asignatura</label>
							    <div class="controls">
							      	<input name="asignatura" type="text"  placeholder="Asignatura" value="<?php echo !empty($asignatura)?$asignatura:'';?>">
							      	<?php if (!empty($asignaturaError)): ?>
							      		<span class="help-inline"><?php echo $asignaturaError;?></span>
							      	<?php endif; ?>
								</div>
							</div>

							<div class="control-group <?php echo !empty($grupoError)?'error':'';?>">
							    <label class="control-label">grupo</label>
							    <div class="controls">
							      	<input name="grupo" type="text"  placeholder="Grupo" value="<?php echo !empty($grupo)?$grupo:'';?>">
							      	<?php if (!empty($grupoError)): ?>
							      		<span class="help-inline"><?php echo $grupoError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($semestreError)?'error':'';?>">
							    <label class="control-label">ciclo</label>
							    <div class="controls">
							      	<input name="semestre" type="text"  placeholder="Semestre" value="<?php echo !empty($ciclo)?$ciclo:'';?>">
							      	<?php if (!empty($semestreError)): ?>
							      		<span class="help-inline"><?php echo $semestreError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

						    <div class="form-actions">
								  <button type="submit" class="btn btn-primary">Crear</button>
								  <a class="btn btn-primary" href="index.php">Regresar</a>
							</div>
						</form>
					</td>
					<td class="active">
						<form class="form-horizontal" action="create.php" method="post">
					        <div class="control-group <?php echo !empty($diaError)?'error':'';?>">
							    <label class="control-label">Dia</label>
							    <div class="controls">
							      	<input name="dia" type="text"  placeholder="Dia" value="<?php echo !empty($dia)?$dia:'';?>">
							      	<?php if (!empty($diaError)): ?>
							      		<span class="help-inline"><?php echo $diaError;?></span>
							      	<?php endif; ?>
							    </div>
					        </div>

							<div class="control-group <?php echo !empty($horaError)?'error':'';?>">
							    <label class="control-label">Hora</label>
							    <div class="controls">
							      	<input name="hora" type="text"  placeholder="Hora" value="<?php echo !empty($hora)?$hora:'';?>">
							      	<?php if (!empty($horaError)): ?>
							      		<span class="help-inline"><?php echo $horaError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($docenteError)?'error':'';?>">
							    <label class="control-label">docente</label>
							    <div class="controls">
							      	<input name="docente" type="text"  placeholder="docente" value="<?php echo !empty($docente)?$docente:'';?>">
							      	<?php if (!empty($docenteError)): ?>
							      		<span class="help-inline"><?php echo $docenteError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($aulaError)?'error':'';?>">
							    <label class="control-label">aula</label>
							    <div class="controls">
							      	<input name="aula" type="text"  placeholder="Aula" value="<?php echo !empty($aula)?$aula:'';?>">
							      	<?php if (!empty($aulaError)): ?>
							      		<span class="help-inline"><?php echo $aulaError;?></span>
							      	<?php endif; ?>
								</div>
							</div>

							<div class="control-group <?php echo !empty($asignaturaError)?'error':'';?>">
							    <label class="control-label">asignatura</label>
							    <div class="controls">
							      	<input name="asignatura" type="text"  placeholder="Asignatura" value="<?php echo !empty($asignatura)?$asignatura:'';?>">
							      	<?php if (!empty($asignaturaError)): ?>
							      		<span class="help-inline"><?php echo $asignaturaError;?></span>
							      	<?php endif; ?>
								</div>
							</div>

							<div class="control-group <?php echo !empty($grupoError)?'error':'';?>">
							    <label class="control-label">grupo</label>
							    <div class="controls">
							      	<input name="grupo" type="text"  placeholder="Grupo" value="<?php echo !empty($grupo)?$grupo:'';?>">
							      	<?php if (!empty($grupoError)): ?>
							      		<span class="help-inline"><?php echo $grupoError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($semestreError)?'error':'';?>">
							    <label class="control-label">ciclo</label>
							    <div class="controls">
							      	<input name="semestre" type="text"  placeholder="Semestre" value="<?php echo !empty($ciclo)?$ciclo:'';?>">
							      	<?php if (!empty($semestreError)): ?>
							      		<span class="help-inline"><?php echo $semestreError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

						    <div class="form-actions">
								  <button type="submit" class="btn btn-primary">Crear</button>
								  <a class="btn btn-primary" href="index.php">Regresar</a>
							</div>
						</form>
					</td>
					<td class="active">
						<form class="form-horizontal" action="create.php" method="post">
					        <div class="control-group <?php echo !empty($diaError)?'error':'';?>">
							    <label class="control-label">Dia</label>
							    <div class="controls">
							      	<input name="dia" type="text"  placeholder="Dia" value="<?php echo !empty($dia)?$dia:'';?>">
							      	<?php if (!empty($diaError)): ?>
							      		<span class="help-inline"><?php echo $diaError;?></span>
							      	<?php endif; ?>
							    </div>
					        </div>

							<div class="control-group <?php echo !empty($horaError)?'error':'';?>">
							    <label class="control-label">Hora</label>
							    <div class="controls">
							      	<input name="hora" type="text"  placeholder="Hora" value="<?php echo !empty($hora)?$hora:'';?>">
							      	<?php if (!empty($horaError)): ?>
							      		<span class="help-inline"><?php echo $horaError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($docenteError)?'error':'';?>">
							    <label class="control-label">docente</label>
							    <div class="controls">
							      	<input name="docente" type="text"  placeholder="docente" value="<?php echo !empty($docente)?$docente:'';?>">
							      	<?php if (!empty($docenteError)): ?>
							      		<span class="help-inline"><?php echo $docenteError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($aulaError)?'error':'';?>">
							    <label class="control-label">aula</label>
							    <div class="controls">
							      	<input name="aula" type="text"  placeholder="Aula" value="<?php echo !empty($aula)?$aula:'';?>">
							      	<?php if (!empty($aulaError)): ?>
							      		<span class="help-inline"><?php echo $aulaError;?></span>
							      	<?php endif; ?>
								</div>
							</div>

							<div class="control-group <?php echo !empty($asignaturaError)?'error':'';?>">
							    <label class="control-label">asignatura</label>
							    <div class="controls">
							      	<input name="asignatura" type="text"  placeholder="Asignatura" value="<?php echo !empty($asignatura)?$asignatura:'';?>">
							      	<?php if (!empty($asignaturaError)): ?>
							      		<span class="help-inline"><?php echo $asignaturaError;?></span>
							      	<?php endif; ?>
								</div>
							</div>

							<div class="control-group <?php echo !empty($grupoError)?'error':'';?>">
							    <label class="control-label">grupo</label>
							    <div class="controls">
							      	<input name="grupo" type="text"  placeholder="Grupo" value="<?php echo !empty($grupo)?$grupo:'';?>">
							      	<?php if (!empty($grupoError)): ?>
							      		<span class="help-inline"><?php echo $grupoError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($semestreError)?'error':'';?>">
							    <label class="control-label">ciclo</label>
							    <div class="controls">
							      	<input name="semestre" type="text"  placeholder="Semestre" value="<?php echo !empty($ciclo)?$ciclo:'';?>">
							      	<?php if (!empty($semestreError)): ?>
							      		<span class="help-inline"><?php echo $semestreError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

						    <div class="form-actions">
								  <button type="submit" class="btn btn-primary">Crear</button>
								  <a class="btn btn-primary" href="index.php">Regresar</a>
							</div>
						</form>
					</td>
					<td class="active">
						<form class="form-horizontal" action="create.php" method="post">
					        <div class="control-group <?php echo !empty($diaError)?'error':'';?>">
							    <label class="control-label">Dia</label>
							    <div class="controls">
							      	<input name="dia" type="text"  placeholder="Dia" value="<?php echo !empty($dia)?$dia:'';?>">
							      	<?php if (!empty($diaError)): ?>
							      		<span class="help-inline"><?php echo $diaError;?></span>
							      	<?php endif; ?>
							    </div>
					        </div>

							<div class="control-group <?php echo !empty($horaError)?'error':'';?>">
							    <label class="control-label">Hora</label>
							    <div class="controls">
							      	<input name="hora" type="text"  placeholder="Hora" value="<?php echo !empty($hora)?$hora:'';?>">
							      	<?php if (!empty($horaError)): ?>
							      		<span class="help-inline"><?php echo $horaError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($docenteError)?'error':'';?>">
							    <label class="control-label">docente</label>
							    <div class="controls">
							      	<input name="docente" type="text"  placeholder="docente" value="<?php echo !empty($docente)?$docente:'';?>">
							      	<?php if (!empty($docenteError)): ?>
							      		<span class="help-inline"><?php echo $docenteError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($aulaError)?'error':'';?>">
							    <label class="control-label">aula</label>
							    <div class="controls">
							      	<input name="aula" type="text"  placeholder="Aula" value="<?php echo !empty($aula)?$aula:'';?>">
							      	<?php if (!empty($aulaError)): ?>
							      		<span class="help-inline"><?php echo $aulaError;?></span>
							      	<?php endif; ?>
								</div>
							</div>

							<div class="control-group <?php echo !empty($asignaturaError)?'error':'';?>">
							    <label class="control-label">asignatura</label>
							    <div class="controls">
							      	<input name="asignatura" type="text"  placeholder="Asignatura" value="<?php echo !empty($asignatura)?$asignatura:'';?>">
							      	<?php if (!empty($asignaturaError)): ?>
							      		<span class="help-inline"><?php echo $asignaturaError;?></span>
							      	<?php endif; ?>
								</div>
							</div>

							<div class="control-group <?php echo !empty($grupoError)?'error':'';?>">
							    <label class="control-label">grupo</label>
							    <div class="controls">
							      	<input name="grupo" type="text"  placeholder="Grupo" value="<?php echo !empty($grupo)?$grupo:'';?>">
							      	<?php if (!empty($grupoError)): ?>
							      		<span class="help-inline"><?php echo $grupoError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($semestreError)?'error':'';?>">
							    <label class="control-label">ciclo</label>
							    <div class="controls">
							      	<input name="semestre" type="text"  placeholder="Semestre" value="<?php echo !empty($ciclo)?$ciclo:'';?>">
							      	<?php if (!empty($semestreError)): ?>
							      		<span class="help-inline"><?php echo $semestreError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

						    <div class="form-actions">
								  <button type="submit" class="btn btn-primary">Crear</button>
								  <a class="btn btn-primary" href="index.php">Regresar</a>
							</div>
						</form>
					</td>
					<td class="active">
						<form class="form-horizontal" action="create.php" method="post">
					        <div class="control-group <?php echo !empty($diaError)?'error':'';?>">
							    <label class="control-label">Dia</label>
							    <div class="controls">
							      	<input name="dia" type="text"  placeholder="Dia" value="<?php echo !empty($dia)?$dia:'';?>">
							      	<?php if (!empty($diaError)): ?>
							      		<span class="help-inline"><?php echo $diaError;?></span>
							      	<?php endif; ?>
							    </div>
					        </div>

							<div class="control-group <?php echo !empty($horaError)?'error':'';?>">
							    <label class="control-label">Hora</label>
							    <div class="controls">
							      	<input name="hora" type="text"  placeholder="Hora" value="<?php echo !empty($hora)?$hora:'';?>">
							      	<?php if (!empty($horaError)): ?>
							      		<span class="help-inline"><?php echo $horaError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($docenteError)?'error':'';?>">
							    <label class="control-label">docente</label>
							    <div class="controls">
							      	<input name="docente" type="text"  placeholder="docente" value="<?php echo !empty($docente)?$docente:'';?>">
							      	<?php if (!empty($docenteError)): ?>
							      		<span class="help-inline"><?php echo $docenteError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($aulaError)?'error':'';?>">
							    <label class="control-label">aula</label>
							    <div class="controls">
							      	<input name="aula" type="text"  placeholder="Aula" value="<?php echo !empty($aula)?$aula:'';?>">
							      	<?php if (!empty($aulaError)): ?>
							      		<span class="help-inline"><?php echo $aulaError;?></span>
							      	<?php endif; ?>
								</div>
							</div>

							<div class="control-group <?php echo !empty($asignaturaError)?'error':'';?>">
							    <label class="control-label">asignatura</label>
							    <div class="controls">
							      	<input name="asignatura" type="text"  placeholder="Asignatura" value="<?php echo !empty($asignatura)?$asignatura:'';?>">
							      	<?php if (!empty($asignaturaError)): ?>
							      		<span class="help-inline"><?php echo $asignaturaError;?></span>
							      	<?php endif; ?>
								</div>
							</div>

							<div class="control-group <?php echo !empty($grupoError)?'error':'';?>">
							    <label class="control-label">grupo</label>
							    <div class="controls">
							      	<input name="grupo" type="text"  placeholder="Grupo" value="<?php echo !empty($grupo)?$grupo:'';?>">
							      	<?php if (!empty($grupoError)): ?>
							      		<span class="help-inline"><?php echo $grupoError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

							<div class="control-group <?php echo !empty($semestreError)?'error':'';?>">
							    <label class="control-label">ciclo</label>
							    <div class="controls">
							      	<input name="semestre" type="text"  placeholder="Semestre" value="<?php echo !empty($ciclo)?$ciclo:'';?>">
							      	<?php if (!empty($semestreError)): ?>
							      		<span class="help-inline"><?php echo $semestreError;?></span>
							      	<?php endif; ?>
							    </div>
							</div>

						    <div class="form-actions">
								  <button type="submit" class="btn btn-primary">Crear</button>
								  <a class="btn btn-primary" href="index.php">Regresar</a>
							</div>
						</form>
					</td>
				</tr>
				
			</table>
			
		</div>
	<section id="content">
		 <div>
            	<ul class="listaBotones">
            		<li><a href="" class="btn btn-primary"> Primer Ciclo</a></li>
            		<li><a href="" class="btn btn-primary"> Segundo Ciclo</a></li>
            		<li><a href="" class="btn btn-primary"> Tercer Ciclo</a></li>
            		<li><a href="" class="btn btn-primary"> Cuarto Ciclo</a></li>
            		<li><a href="" class="btn btn-primary"> Quinto Ciclo</a></li>
            		<li><a href="" class="btn btn-primary"> Sexto Ciclo</a></li>
            	</ul>
         </div>
    </section><!-- content -->

    </div> <!-- /container -->
  </body>
</html>
@stop

