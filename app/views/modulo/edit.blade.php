@extends('layouts.base_admin')
@section('title')
MATENIMIENTO DE MODULO
@stop

@section('breadcrumb')
  <li class="active todos"><i class="fa fa-th-list"></i>{{HTML::linkAction('ModuloController@index', 'Todos')}}</li>
  <li class="nuevo"><i class="fa fa-plus"></i>{{HTML::linkAction('ModuloController@create', 'Nuevo')}}</li>
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
                        <h3 class="text-muted" align="center">Editar Grupo {{ $modulo -> nombre }}</h3>
                    </div>
                <section class="content">
                    <ul>
                  {{ Form::open(array('url' => 'modulo/' . $modulo->id, 'method' =>'put')) }}
                  {{ Form::text('nombre', $modulo->nombre) }} <br/>
                  <br/>
                  {{ Form::submit('Modificar')}} 
                  &nbsp;&nbsp;&nbsp;&nbsp;
                            {{HTML::linkAction('ModuloController@index', 'Cancelar')}}
                  {{ Form::close()}} 
                    </ul>
                </section><!-- /.content -->
                </div>
            </div>
        </div>
    </div>
</div>
@stop