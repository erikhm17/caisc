@extends('layouts.base_admin')
@section('title')
Agregar Personal <small> NUEVO PERSONAL </small>
@stop
@section('breadcrumb')
<li>Agregar</li>
@stop
@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>principal</title>
	<title>principal</title>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>
	{{HTML::style('css/styleCargaIndex.css')}}
	{{HTML::style('css/styleCargaIndex.css')}}

</head>
<body>

	
	<table id="table_id" class="display">
		 <thead>
		        <tr>
		            <th>Codigo de la carga</th>
		            <th>Codigo del curso</th>
		            <th>Codigo del docente</th>
		            <th>Semestre</th>
		            <th>Turno</th>
		            <th>Grupo</th>
		            <th>Aula</th>
		            <th>hora</th>
		            <th>Dia</th>
		            <th>Controles</th>
		        </tr>
		    </thead>
		    <tbody>
		   	    @if ($elementosCarga)
			    	@foreach ($elementosCarga as $user)
			        <tr>
			            <td> {{ ($user->codCargaAcademica_ct);}}</td>
			            <td> {{ ($user->codCurso_ct);		  }}</td>
			            <td> {{ ($user->docente_id);		  }}</td>
			            <td> {{ ($user->semestre);			  }}</td>
			            <td> {{ ($user->turno); 			  }}</td>
			            <td> {{ ($user->grupo);			      }}</td>
			            <td> {{ ($user->aula);				  }}</td>
			            <td> {{ ($user->hora);      		  }}</td>
			            <td> {{ ($user->dia);		          }}</td>
			            <td>{{ HTML::link(URL::to('/eliminarCarga/'.$user->codCargaAcademica_ct), 'Eliminar') }}</td>
			        </tr>

			        @endforeach
		        @else
				    <p> No hay usuarios cargados </p>
				@endif
			</tbody>
	</table>
			{{ HTML::link(URL::to('/crearCargaCt'), 'Regresar') }}

	<script type="text/javascript">
		$(document).ready( function () {
	    $('#table_id').DataTable();
	} );
	</script>
	
</body>
</html>
@stop