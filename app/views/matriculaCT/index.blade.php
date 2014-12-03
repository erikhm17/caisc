@extends('layouts.base_admin')
@section('title')
Lista de Matriculas
@stop
@section('breadcrumb')
<li>Matriculas</li>
@stop
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title"> </h3>
    </div>
    <div class="box-body table-responsive">
    	<div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
        	<div class="row">
        		<div class="col-xs-6">
        			<div class="dataTables_length" id="example1_length">
        				<label><select aria-controls="example1" size="1" name="example1_length">
        					<option selected="selected" value="10">10</option>
        					<option value="25">25</option>
        					<option value="50">50</option>
        					<option value="100">100</option>
        				</select> records per page</label>
        			</div>
        		</div>
        		<div class="col-xs-6">
        			<div id="example1_filter" class="dataTables_filter">
                        {{ HTML::link('matriculas/add.html','Agregar Matricula') }}
        			</div>
        		</div>
        	</div>
            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                        <th colspan="1" rowspan="1">Codigo Matricula CT</th>
                    	<th colspan="1" rowspan="1">Codigo Alumno</th>
                        <th colspan="1" rowspan="1">Codigo Carga Academica</th>
                        <th colspan="1" rowspan="1">Modulo</th>
                        <th colspan="1" rowspan="1">Action</th>
                    </tr>
                </thead>
                <tbody aria-relevant="all" aria-live="polite" role="alert">
                	@foreach( $matriculas as $matricula)
                	<tr class="odd">
                            <td class=" "><b>{{ $matricula->id }}</b></td>
                            <td class=" "><b>{{ $matricula->codAlumno }}</b></td>
                            <td class=" ">{{ $matricula->codCargaAcademica_ct }}</td>
                            <td class=" ">{{ $matricula->modulo }}</td>
                            <td class=" ">
                            {{ HTML::link('matriculas/edit/'.$matricula->id,'Modificar') }}
                            {{ HTML::link('matriculas/delete/'.$matricula->id,'Eliminar') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>
@stop