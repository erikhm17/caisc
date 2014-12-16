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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</head>
<body>
	{{ Form::open(array('url' => '/horarios')) }}
	<p class="lbls">{{Form::label('lblSemestre','Semestre:')}}</p>
    <div class="inputs">{{ Form::select('comboSemestres', $varElementosComboSemestre) }}</div>
    <p class="lbls">{{Form::label('lblDia','Dia:')}}</p>
	<div class="inputs">{{Form::select('comboDias', array('lunes' => 'lunes', 'martes' => 'martes','miercoles'=>'miercoles','jueves'=>'jueves','viernes'=>'viernes','sabado'=>'sabado'))}}</div>
	<p>{{Form::submit('Ver horarios')}}</p>
	{{ Form::close()}}
	<div lass="table-responsive">	
   
			{{ HTML::link(URL::to('/crearCargaCt'), 'Regresar') }}
			

	</div>
			
	
	
</body>
</html>
@stop