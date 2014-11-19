@extends('layouts.base_admin')
@section('title')
Mantenimiento Modalidad
@stop
@section('content')
  <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li ><a href="/caisc/public/modalidad/index">Todos</a></li>
              <li><a href="/caisc/public/modalidad/create">Nuevo</a></li>
            </ul>
          </div>
        </div>
    </nav>

  <div class="panel panel-success">
      <div class="panel-heading">
        <h4>Editar Modalidad</h4>
      </div>

      <div class="panel-body">
        @if (!empty($modalidad))
          <form method="post" action="/caisc/public/modalidad/update/{{ $modalidad->id}}">
          <p>
            <input value="{{ $modalidad->id }}" type="text" name="id" placeholder="Nombre" class="form-control" required>
          </p>
          <p>
            <input value="{{ $modalidad->descripcion }}" type="text" name="descripcion" placeholder="Descripcion" class="form-control" required>
          </p>
           <p>
            <input value="{{ $modalidad->monto }}" type="text" name="monto" placeholder="Monto" class="form-control" required>
          </p>
          <input type="submit" value="Guardar" class="btn btn-success">
          @else
          <p>
            No existe información para éste usuario.
          </p>
          @endif
      </form>
    </div>
  </div>

  @if(Session::has('message'))
    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
@stop
