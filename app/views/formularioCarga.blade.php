@extends('layouts.base_admin')
@section('title')
Mostar carga academica<small>carga</small>
@stop
@section('content')
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="CargaAcademica/css/bootstrap.min.css" rel="stylesheet">
    <script src="CargaAcademica/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    		<div class="row">
    			<h3>Garga Academica</h3>
    		</div>
			<div class="row">
				<p>
					<li><a href="" class="btn btn-primary">{{ HTML::link('crear.html','Crear') }}</a></li>
				</p>
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Dia</th>
		                  <th>Hora</th>
		                  <th>Docente</th>
		                  <th>Aula</th>
		                  <th>Asignatura</th>
		                  <th>Grupo</th>
		                  <th>Ciclo</th>
		                </tr>
		              </thead>
		         
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>

@stop
