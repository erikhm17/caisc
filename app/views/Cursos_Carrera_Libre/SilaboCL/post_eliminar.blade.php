@extends('layouts.base_admin')
@extends('layouts.base_admin')
@section('title')
Eliminar <small>SILABO DE CURSOS LIBRES </small>
@stop
@section('breadcrumb')
<li>Silabo Cursos Libres</li>
@stop
@section('content')
{{ Form::open(array('method'=> 'POST','url'=> 'SilaboCarreraLibre/eliminar.html','class'=>'form-horizontal','role'=>'form')) }}
<div class="form-group">
		{{ Form::label('id','Esta seguro de eliminar este silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-3">
			{{ Form::text('id',$silabocurso_cl->id,array('class'=>'form-control','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('titulo','Titulo del Silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('titulo',$silabocurso_cl->titulo,array('class'=>'form-control','readonly'=>'readonly','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('descripcion','Descripcion  del Silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-6">
			{{ Form::textarea('descripcion',$silabocurso_cl->descripcion,array('class'=>'form-control','readonly'=>'readonly','required'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('orden','Orden del silabus:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-6">
			{{ Form::number('orden',$silabocurso_cl->orden,array('class'=>'form-control','readonly'=>'readonly','required'))}}
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-info btn-block" type="reset">{{ HTML::link('SilaboCarreraLibre/index.html','Cancelar') }}</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-primary btn-block" type="submit">Eliminar</button>
		</div>
	</div>
{{Form::close()}}
@stop