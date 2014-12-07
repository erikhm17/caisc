@extends('layouts.base_admin')
@section('title')
Agregar <small> NUEVO SILAB0 </small>
@stop

@section('breadcrumb')
<li>Silabo de Cursos Libres </li>
<li>Agregar Silabo</li>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'SilaboCarreraLibre/insert.html','class'=>'form-horizontal','role'=>'form')) }}
	
	<div class="form-group">
		{{ Form::label('codSilabus_cl','Codigo del Silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::select('codSilabus_cl',$codSilabo,null,array('class'=>'form-control','required'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('titulo','Titulo del Silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('titulo','',array('class'=>'form-control','placeholder'=>'','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('descripcion','Descripcion  del Silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::textarea('descripcion','',array('class'=>'form-control','placeholder'=>'','required'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('orden','Orden del silabus:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('orden','',array('class'=>'form-control','placeholder'=>'','required'))}}
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
