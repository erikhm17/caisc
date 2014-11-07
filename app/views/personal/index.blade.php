@extends('layouts.base_admin')
@section('title')
Lista de Personal <small>Usuarios con privilegios</small>
@stop
@section('breadcrumb')
<li>Personal</li>
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
        				<label>Search: <input aria-controls="example1" type="text"></label>
                        {{ HTML::link('personal/add.html','Agregar Personal') }}
        			</div>
        		</div>
        	</div>
            <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                    <tr role="row">
                    	<th aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting_asc">Cod Docente</th>
                    	<th aria-label="Browser: activate to sort column ascending" style="width: 283px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Apellidos y Nombres</th>
                    	<th aria-label="Platform(s): activate to sort column ascending" style="width: 244px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">E-mail</th>
                    	<th aria-label="Engine version: activate to sort column ascending" style="width: 163px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Teléfono</th>
                    	<th aria-label="CSS grade: activate to sort column ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" role="columnheader" class="sorting">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    	<th colspan="1" rowspan="1">Id</th>
                    	<th colspan="1" rowspan="1">Apellidos y Nombres</th>
                    	<th colspan="1" rowspan="1">E-mail</th>
                    	<th colspan="1" rowspan="1">Teléfono</th>
                    	<th colspan="1" rowspan="1">Action</th>
                    </tr>
                </tfoot>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
            	@foreach( $personal as $persona)
            	<tr class="odd">
                        <td class="  sorting_1">{{ HTML::link('personal/profile/'.$persona->id,$persona->id) }}</td>
                        <td class=" "><b>{{ $persona->apellidos }}</b> {{ $persona->nombre }}</td>
                        <td class=" ">{{ $persona->email }}</td>
                        <td class=" ">{{ $persona->telefono }}</td>
                        <td class=" ">
                        	{{ HTML::link('personal/edit/'.$persona->id,'Actualizar') }}
                        	{{ HTML::link('personal/delete/'.$persona->id,'Eliminar') }}
                        	{{ HTML::link('personal/profile/'.$persona->id,'Detalles') }}
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
            	<div class="col-xs-6">
            		<div id="example1_info" class="dataTables_info">Showing 1 to 10 of 57 entries</div>
            	</div>
            	<div class="col-xs-6">
            		<div class="dataTables_paginate paging_bootstrap">
            			<ul class="pagination">
            				<li class="prev disabled"><a href="#">← Previous</a></li>
            				<li class="active"><a href="#">1</a></li>
            				<li><a href="#">2</a></li>
            				<li><a href="#">3</a></li>
            				<li><a href="#">4</a></li>
            				<li><a href="#">5</a></li>
            				<li class="next"><a href="#">Next → </a>
            				</li>
            			</ul>
            		</div>
            	</div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>
@stop
