@extends('layouts.base_admin')
@section('title')
Actualizar <small> SILABO </small>
@stop

@section('breadcrumb')
<li>Silabo de Cursos Libres </li>
<li>Agregar Silabo</li>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'SilaboCarreraLibre/post_update.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('id','Codigo Detalle del Silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('id',$silabocurso_cl->id,array('class'=>'form-control','placeholder'=>'isc-01','required','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('titulo','Titulo del Silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('titulo',$silabocurso_cl->titulo,array('class'=>'form-control','placeholder'=>'isc-01','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('descripcion','Descripcion  del Silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::textarea('descripcion',$silabocurso_cl->descripcion,array('class'=>'form-control','placeholder'=>'Programacion en Android','required'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('orden','Orden del silabus:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::number('orden',$silabocurso_cl->orden,array('class'=>'form-control','placeholder'=>'30','required'))}}
		</div>
	</div>
	
	
	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-info btn-block" type="reset">Cancelar</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-primary btn-block" type="submit">Actualizar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
