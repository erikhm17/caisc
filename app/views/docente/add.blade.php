@extends('layouts.base_admin')
@section('title')
Agregar docente <small> NUEVO DOCENTE </small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('docentes','Docentes')}} </li>
<li>Agregar</li>
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'docente/insert.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('DocDocente','Código Docente:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('codDocente','',array('class'=>'form-control','placeholder'=>'123445'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('nombre','Nombre(s):',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('nombre','',array('class'=>'form-control','placeholder'=>'Juan'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('apellidos','Apellidos:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('apellidos','',array('class'=>'form-control','placeholder'=>'Huamani Mendoza'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('dni','DNI:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::number('dni','',array('class'=>'form-control','placeholder'=>'12345678'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('direccion','Dirección:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('direccion','',array('class'=>'form-control','placeholder'=>'Av. la cultura Nro 8'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('telefono','Teléfono:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('telefono','',array('class'=>'form-control','placeholder'=>'12345678'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('email','E-mail:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::email('email','',array('class'=>'form-control','placeholder'=>'correo@unsaac.edu.pe'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('password','Password:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::password('password',array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('repassword','Confirme-Password:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::password('repassword',array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-info btn-block" type="reset">Cancelar</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-primary btn-block" type="submit">Guardar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
