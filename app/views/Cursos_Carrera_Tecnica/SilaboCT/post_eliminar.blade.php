@extends('layouts.base_admin')
@extends('layouts.base_admin')
@section('title')
Eliminar <small>SILABO DE CARRERA TECNICA </small>
@stop
@section('breadcrumb')
<li>Silabo Carrera Tecnica</li>
@stop
@section('content')
{{ Form::open(array('method'=> 'POST','url'=> 'SilaboCarreraTecnica/eliminar.html','class'=>'form-horizontal','role'=>'form')) }}
<div class="form-group">
		{{ Form::label('id','Esta seguro de eliminar este silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('id',$silabocurso_ct->id,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>


	<div class="form-group">
		{{ Form::label('codSilabus_ct','Codigo del Silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('codSilabus_ct',$silabocurso_ct->codSilabus_ct,array('class'=>'form-control','placeholder'=>'isc-01','required','readonly'=>'readonly' ))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('titulo','Titulo del Silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('titulo',$silabocurso_ct->titulo,array('class'=>'form-control','placeholder'=>'isc-01','required','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('descripcion','Descripcion  del Silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::textarea('descripcion',$silabocurso_ct->descripcion,array('class'=>'form-control','placeholder'=>'Programacion en Android','required','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('orden','Orden del silabus:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::number('orden',$silabocurso_ct->orden,array('class'=>'form-control','placeholder'=>'30','required','readonly'=>'readonly'))}}
		</div>
	</div>
	

	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-info btn-block" type = "reset">{{ HTML::link('SilaboCarreraTecnica/create.html','Cancelar') }}</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-primary btn-block" type="submit">Eliminar</button>
		</div>
	</div>
{{Form::close()}}
@stop