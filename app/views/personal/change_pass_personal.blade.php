@extends('layouts.base_admin')
@section('title')
Cambiar Contraseña <small> {{$personal->nombre}} </small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('personal','Personal')}} </li>
<li>{{ HTML::link('personal/profile/'.$personal->id,$personal->nombre)}}</li>
<li>Editar</li>
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'personal/update.html','class'=>'form-horizontal','role'=>'form')) }}
	<p>{{$personal->nombre}} </p>
	<p>{{$personal->apellidos}}</p>
	
	<div class="form-group">
		{{ Form::label('password','Password-Anterior:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::password('password',array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('password','Password New:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::password('password',array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('repassword','Confirme-Password-New:',array('class'=>'col-sm-4 control-label')) }}
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
