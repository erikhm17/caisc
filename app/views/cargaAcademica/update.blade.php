@extends('layouts.base_admin')
@section('title')
Crear Carga<small>carga</small>
@stop
@section('content')
<?php 
	
	require 'database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	}
	
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
		if ( empty($docente)) {
			$docenteError = 'ingrese Docente';
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
	
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO tabla_temporal_carga (dia,hora,docente,aula,asignatura,grupo,semestre) values(?,?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($dia,$hora,$docente,$aula,$asignatura,$grupo,$semestre));
			Database::disconnect();
			header("Location: index.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM tabla_temporal_carga where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$dia = $data['dia'];
		$hora = $data['hora'];
		$docente = $data['docente'];
		$aula = $data['aula'];
		$asignatura = $data['asignatura'];
		$grupo = $data['grupo'];
		$semestre = $data['semestre'];

		Database::disconnect();
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Update a Customer</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">

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
					      	<input name="docente" type="text"  placeholder="Docente" value="<?php echo !empty($docente)?$docente:'';?>">
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
					      	<input name="semestre" type="text"  placeholder="Semestre" value="<?php echo !empty($semestre)?$semestre:'';?>">
					      	<?php if (!empty($semestreError)): ?>
					      		<span class="help-inline"><?php echo $semestreError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-primary">Actualizar</button>
						  <a class="btn btn-primary" href="index.php">Regresar</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>
 
@stop