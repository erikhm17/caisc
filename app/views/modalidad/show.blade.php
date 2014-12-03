@extends('layouts.base_admin')
@section('title')
Mantenimiento Modalidad
@stop
@section('content')
  <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li >{{ HTML::link('/modalidad','Todos') }}</li>
              <li>{{ HTML::link('/modalidad/create','Nuevo') }}</li>
            </ul>
          </div>
        </div>
    </nav>

  <div class="panel panel-success" width = "50px">
      <div class="panel-body">
        @if (!empty($modalidad))
        <p>
          Nombre: <strong>{{ $modalidad->id }}</strong>
        </p>
        <p>
          Descripcion: <strong>{{ $modalidad->descripcion }}</strong>
        </p>
        <p>
          Monto: <strong>{{ $modalidad->monto }}</strong>
        </p>
        @else
        <p>
          No existe información para ésta modalidad.
        </p>
        @endif
    </div>
  </div>

  @if(Session::has('message'))
    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
@stop
