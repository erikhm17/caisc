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
{{ Form::open(array('method'=> 'POST','url'=> 'docente/login','class'=>'form-horizontal','role'=>'form')) }}
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
        <div class="col-xs-12 col-sm-6 col-md-6">
            <button class="btn btn-info btn-block" type="reset">Reset</button>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <button class="btn btn-primary btn-block" type="submit">Iniciar Sessión</button>
        </div>
    </div>
{{Form::close()}}
</div>
@stop
