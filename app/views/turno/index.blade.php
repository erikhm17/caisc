@extends('layouts.base_admin')
@section('title')
MATENIMIENTO DE TURNO
@stop

@section('breadcrumb')
	<li class="active todos"><i class="fa fa-fw fa-th-list"></i>Listar</li>
	<li class="nuevo"><i class="fa fa-fw fa-plus"></i>{{HTML::linkAction('TurnoController@create', 'Nuevo')}}</li>
@stop
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
     <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <div class="box">
            <div class="panel panel-success">
                <div class="panel-body" align="">
                    <div class="panel-default" align="center">
                        <h3 class="text-muted" align="center">Lista de Turnos</h3>
                    </div>
                    <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                    Turno
                                </th>
                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">
                                    Accion(Editar)
                                </th>
                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                                    Accion(Eliminar)
                                </th>
                            </tr>
                        </thead>
						@foreach($turnos as $turno)
							<tr>
								<td align = "center">
									<a href="turno/{{ $turno->id }}">{{ $turno->nombre }}</a>  
								</td>
								<td  align = "center">
									<a href="turno/{{ $turno->id }}/edit"><span class="label label-success">Editar</a>
								</td>
								<td align = "center"> 
									{{ Form::open(array('url'=>'turno/'.$turno->id, 'method'=>'delete')) }}
									{{ Form::submit('Eliminar') }}
									{{ Form::close() }}
								</td>
							</tr>
						@endforeach
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop