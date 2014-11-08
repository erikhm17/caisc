<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        {{ HTML::style('assets/css/bootstrap.min.css') }}
        <!-- Morris chart -->
        {{ HTML::style('assets/css/morris/font-awesome.min.css') }}
        <!-- jvectormap -->
        {{ HTML::style('assets/css/jvectormap/jquery-jvectormap-1.2.2.css') }}
        <!-- Date Picker -->
        {{ HTML::style('assets/css/datepicker/datepicker3.css') }}
        <!-- Daterange picker -->
        {{ HTML::style('assets/css/daterangepicker/daterangepicker-bs3.css') }}
        <!-- bootstrap wysihtml5 - text editor -->
        {{ HTML::style('assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
        <!-- Theme style -->
        {{ HTML::style('assets/css/AdminLTE.css') }}
        {{ HTML::style('assets/css/inicons.min.css') }}
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div margin-top:20px; >
            <!-- <div class="header">TITULO</div>-->
            <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <div>
                                            Docentes
                                        </div>
                                        <div>... </div>
                                    </h3>
                                    <p>
                                        Login
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="docente/login.html" class="small-box-footer">
                                    Click <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <div>
                                            Alumnos
                                        </div>
                                        <div>.. </div>
                                    </h3>
                                    <p>
                                        Login
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="docente/login.html" class="small-box-footer">
                                    Click <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <div>
                                            Personal 
                                        </div>
                                        <div>Administrativo </div>
                                        
                                    </h3>
                                    <p>
                                        Login
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="docente/login.html" class="small-box-footer">
                                    Click <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        
                    </div><!-- /.row -->

                    
                    <!-- Widgets as boxes -->            

            
        </div>

        {{ HTML::script('assets/js/plugins/jquery.min.js') }}
        {{ HTML::script('assets/js/AdminLTE/app.js') }}
        {{ HTML::script('assets/js/AdminLTE/demo.js') }}
        {{ HTML::script('assets/js/plugins/bootstrap.min.js') }}
        

    </body>
</html>