@extends('layouts.base_admin')
@section('title')
Agregar <small> NUEVO SILAB0 </small>
@stop

@section('breadcrumb')
<li>Silabo de Cursos tecnicos </li>
<li>Agregar Silabo</li>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'SilaboCarreraTecnica/insert.html','class'=>'form-horizontal','role'=>'form')) }}
	
	<div class="form-group">
	<div class="col-sm-1">
		{{ Form::number('codCargaAcademica_ct',$id,array('class'=>'form-control','placeholder'=>'','required','readonly'=>'readonly'))}}
	</div></div>

	<div class="form-group">
		{{ Form::label('capitulo','Capitulo :',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::number('capitulo','',array('class'=>'form-control','placeholder'=>'','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('titulo','Titulo del Silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('titulo','',array('class'=>'form-control','placeholder'=>'','required'))}}
		</div>
	</div>

<div class="form-group">
		{{ Form::label('objetivos','Objetivos:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::textarea('objetivos','',array('class'=>'form-control','placeholder'=>'','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('descripcion','Descripcion  del Silabo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::textarea('descripcion','',array('class'=>'form-control','placeholder'=>'','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('numeroclases','Numero de clases requeridas :',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('numeroclases','',array('class'=>'form-control','placeholder'=>'','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('orden','Orden del silabus:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::number('orden','',array('class'=>'form-control','placeholder'=>'','required'))}}
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
