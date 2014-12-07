@extends('layouts.base_admin')
@section('title')
MATENIMIENTO DE GRUPO
@stop

@section('breadcrumb')
  <li class="active todos"><i class="fa fa-th-list"></i>{{HTML::linkAction('GrupoController@index', 'Todos')}}</li>
  <li class="nuevo"><i class="fa fa-plus"></i>{{HTML::linkAction('GrupoController@create', 'Nuevo')}}</li>
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
                        <h3 class="text-muted" align="center">Datos de Grupo {{ $grupo -> nombre }}</h3>
                    </div>
					<table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
		                <thead>
		                    <tr role="row">
		                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 190px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
		                            Atributos
		                        </th>
		                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 275px;" aria-label="Browser: activate to sort column ascending">
		                            Datos
		                        </th>
		                    </tr>
		                </thead>
		                <tbody role="alert" aria-live="polite" aria-relevant="all">
		                    <tr class="odd">
		                        <td class=" sorting_1" align="center">ID </td>
		                        <td class="" align="center">{{ $grupo -> id }}</td>
		                    </tr>
		                    <tr class="odd">
		                        <td class=" sorting_1" align="center">NOMBRE</td>
		                        <td class="" align="center">{{ $grupo -> nombre }}</td>
		                    </tr>
		                </tbody>
            		</table>
					<p align="center">{{HTML::linkAction('GrupoController@index', 'Regresar')}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop