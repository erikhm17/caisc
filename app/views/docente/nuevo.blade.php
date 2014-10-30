@extends('layouts.base_admin')
@section('title')
Agregar Docentes
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ HTML::link('docente','Volver a listar') }}
{{ Form::open(array('method'=> 'POST','url'=> 'docente/crear')) }}

<div class="form-group">DocDocente
{{Form::text('codDocente','',array('class'=>'form-control'))}}
</div>
<div class="form-group"> Nombre: 
{{Form::text('nombre','',array('class'=>'form-control'))}}
</div>
<div class="form-group"> DNI: 
{{Form::text('dni','',array('class'=>'form-control'))}}
</div>
<div class="form-group"> Apellidos: 
{{Form::text('apellidos','',array('class'=>'form-control'))}}
</div>
<div class="form-group"> Dirección: 
{{Form::text('direccion','',array('class'=>'form-control'))}}
</div>
<div class="form-group"> Teléfono: 
{{Form::text('telefono','',array('class'=>'form-control'))}}
</div>
<div class="form-group"> E-mail:
{{Form::email('email','',array('class'=>'form-control'))}}
</div>
<div class="form-group"> Password: 
{{Form::password('password',array('class'=>'form-control'))}}
</div>
<div class="form-group">
	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
		<button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
		<button class="btn btn-lg btn-primary btn-block" type="reset">Nuevo</button>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
		<button class="btn btn-lg btn-primary btn-block" type="reset">Listar</button>
	</div>
</div>
{{Form::close()}}
</div>
@stop
