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
	<!-- este codigo blade llama al style.css comenzando de la carpeta public como raiz-->
	{{HTML::style('css/styleCargaIndex.css')}}
</head>
<body>
	<header id="inicio">
		<h2>Ver detalle editando</h2>
	</header>
	<section id="formularioCarga">
			<form>
				{{Form::open(['route'=>['admin.news.update',$id],'method'=>'PUT'])}}
					<button type="submit">actualizar carga</button>
				{{Form::close()}}

			</form>
	</section>
</body>
</html>
@stop