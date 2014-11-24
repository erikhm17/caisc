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
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM tabla_temporal_carga where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
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
		    			<h3>leer tupla</h3>
		    		</div>
		    		
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">Dia</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['dia'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Hora</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['hora'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Docente</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['docente'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Aula</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['aula'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Asignatura</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['asignatura'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Grupo</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['grupo'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Semestre</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['semestre'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions">
						  <a class="btn btn-primary" href="index.php">Regresar</a>
					   </div>
					
					 
					</div>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>
@stop




