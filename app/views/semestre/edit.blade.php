@extends('layouts.base_admin')
@section('title')
MATENIMIENTO DE SEMESTRE
@stop

@section('breadcrumb')
  <li class="active todos"><i class="fa fa-th-list"></i>{{HTML::linkAction('SemestreController@index', 'Todos')}}</li>
  <li class="nuevo"><i class="fa fa-plus"></i>{{HTML::linkAction('SemestreController@create', 'Nuevo')}}</li>
@stop

@section('content')
<div>
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <div class="box">
            <div class="panel panel-success">
                <div class="panel-body" align="">
                    <div class="panel-default" align="center">
                        <h3 class="text-muted" align="center">Editar Semestre {{ $semestre -> nombre }}</h3>
                    </div>
            		<section class="content">
                		<ul>
        					{{ Form::open(array('url' => 'semestre/' . $semestre->id, 'method' =>'put')) }}
        					{{ Form::text('nombre', $semestre->nombre) }} <br/>
        					<br/>
        					{{ Form::submit('Modificar')}} 
        					&nbsp;&nbsp;&nbsp;&nbsp;
                            {{HTML::linkAction('SemestreController@index', 'Cancelar')}}
        					{{ Form::close()}} 
                		</ul>
            		</section><!-- /.content -->
                </div>
            </div>
        </div>
    </div>
</div>
@stop