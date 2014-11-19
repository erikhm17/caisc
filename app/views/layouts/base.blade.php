<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">

    <title>Panel de administración | ISC</title>

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-theme.min.css') }}
    {{ HTML::style('css/plantilla.css') }}

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="{{ HTML::style('js/ie8-responsive-file-warning.js') }}"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Panel de administración - ISC</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          @section('sidebar')
          <ul class="nav nav-sidebar">
            <li class="active"><a href="docente">Docentes</a></li>
            <li><a href="http://caisc.com/docente/agregar.html">Agregar Docentes</a></li>
            <li><a href="http://caisc.com/docente/actualizar.html">Actualizar Docentes</a></li>
            <li><a href="http://caisc.com/docente/eliminar.html">Eliminar Docentes</a></li>
            <li><a href="http://caisc.com/docente/perfil.html">Perfil Docentes</a></li>
            <li><a href="http://caisc.com/docente">Iniciar</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
          </ul>
          @show
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          @yield('content')
        </div>
      </div>
    </div>
    {{ HTML::script('js/jquery-2.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
  </body>
</html>
