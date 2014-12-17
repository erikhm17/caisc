@extends('layouts.base_admin')
@section('title')
Agregar Personal <small> NUEVO PERSONAL </small>
@stop
@section('breadcrumb')
<li>Agregar</li>
@stop
@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>principal</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

	<!-- este codigo blade llama al style.css comenzando de la carpeta public como raiz-->
	{{HTML::style('css/styleCargaIndex.css')}}
</head>
<body>
	<header id="inicio">
		<h2>horario</h2>
	</header>
	@if ($elementosHorario)
	<div class="table-responsive">
		<table border="1px" class="table table-hover">
		 <thead>
            <tr class="warning">
                <th>Horario</th>
                <th>Aula-101</th>
                <th>Aula-102</th>
                <th>Aula-103</th>
                <th>Aula-104</th>
                <th>Aula-105</th>
                <th>Aula-106</th>
                <th>Aula-107</th>
                <th>Aula-108</th>
                <th>Aula-109</th>
                <th>Aula-110</th>
            </tr>
        </thead>
			@foreach ($elementosHorario as $user)
			<tr>
				<td>{{($user->horario);}}</td> 
				<td>{{($user->Aula101);}}</td>			
				<td>{{($user->Aula102);}}</td>			
				<td>{{($user->Aula103);}}</td>			
				<td>{{($user->Aula104);}}</td>			
				<td>{{($user->Aula105);}}</td>			
				<td>{{($user->Aula106);}}</td>			
				<td>{{($user->Aula107);}}</td>			
				<td>{{($user->Aula108);}}</td>			
				<td>{{($user->Aula109);}}</td>			
				<td>{{($user->Aula110);}}</td>			
			</tr>
			@endforeach
		</table>
	</div>
		@else
		   <p> No hay usuarios cargados </p>
		@endif

</body>
</html>
@stop