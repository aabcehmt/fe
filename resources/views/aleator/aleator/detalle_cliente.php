<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Aleator Software</title>

        <!-- Bootstrap Core CSS -->
        <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../dist/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Custom Fonts -->
        <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <!-- /#wrapper -->
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./">Aleator 2.0</a>
                    <a class="navbar-brand" href="./">InTv</a>
                </div>
                <!-- /.navbar-header -->

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Atención al Cliente</a></li>
                        <li><a href="#">Cobranza</a></li>
                        <li><a href="#">Técnica</a></li>
                        <li><a href="#">Stock</a></li>
                        <li><a href="#">Tabla de Datos</a></li>
                        <li><a href="#">Informes</a></li>
                    </ul>

                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="#">
                                        <div>
                                            <span class="text-muted small">Usuario</span>
                                            <span class="text-warning pull-right">@user_name</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <span class="text-muted small">Empresa</span>
                                            <span class="text-warning pull-right">@empresa</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-gear fa-fw"></i> Cambiar Empresa
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <span class="text-muted small">Empresa de Venta</span>
                                            <span class="text-warning pull-right">@empresa_venta</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <span class="text-muted small">Agencia de Venta</span>
                                            <span class="text-warning pull-right">@agencia_venta</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <span class="text-muted small">Agencia Técnica</span>
                                            <span class="text-warning pull-right">@agencia_tecnica</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-gear fa-fw"></i> Configurar
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="login.html">
                                        <i class="fa fa-sign-out fa-fw"></i> Logout
                                    </a>
                                </li>
                            </ul>
                            <!-- /.dropdown-alerts -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                    <!-- /.navbar-top-links -->
                </div>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <!--<li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                </div>-->
                                <!-- /input-group -->
                            <!--</li>-->
                            <li class="active">
                                <a href="index.html">
                                    <i class="fa fa-search fa-fw"></i> Consulta de Clientes
                                </a>
                            </li>

                            <li>
                                <a href="index.html">
                                    <i class="fa fa-sitemap fa-fw"></i> Gestiones de Atención
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#"> Gestiones</a>
                                    </li>
                                    <li>
                                        <a href="#"> Listado</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="fa fa-plus-circle fa-fw"></i> Alta de Clientes
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#">Gestiones de Alta
                                            <span class="fa arrow"></span>
                                        </a>
                                        <!-- Opciones de Gestiónes de Alta -->
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#">Clientes Normales</a>
                                            </li>
                                            <li>
                                                <a href="#">Clientes Especiales</a>
                                            </li>
                                            <li>
                                                <a href="#">Clientes Prepagos</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#">Solicitudes <small>de Alta/Reconexión</small>
                                            <span class="fa arrow"></span>
                                        </a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#">Revisión</a>
                                            </li>
                                            <li>
                                                <a href="#">Listado</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#">
                                    <i class="fa fa-file-text-o fa-fw"></i> Consulta de Partes
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#"> Movimiento de Planes
                                            <span class="fa arrow"></span>
                                        </a>
                                        <!-- Opciones de Gestiónes de Alta -->
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#">Consulta</a>
                                            </li>
                                            <li>
                                                <a href="#">Listado</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#"> Ordenes
                                            <span class="fa arrow"></span>
                                        </a>
                                        <!-- Opciones de Gestiónes de Alta -->
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#">Consulta</a>
                                            </li>
                                            <li>
                                                <a href="#">Listado</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#"> Reclamos
                                            <span class="fa arrow"></span>
                                        </a>
                                        <!-- Opciones de Gestiónes de Alta -->
                                        <ul class="nav nav-third-level">    
                                            <li>
                                                <a href="#">Listado</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="#"> Suspensiones
                                            <span class="fa arrow"></span>
                                        </a>
                                        <!-- Opciones de Gestiónes de Alta -->
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#">Consulta</a>
                                            </li>
                                            <li>
                                                <a href="#">Listado</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#">
                                    <i class="fa fa-cloud-download fa-fw"></i> Exportaciones
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#"> Tarjetas y Clientes</a>
                                    </li>
                                    <li>
                                        <a href="#"> Clientes y Conexiones</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <!-- Navigation -->

            <!-- /#page-wrapper -->
            <div id="page-wrapper">

                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header">Detalle del Clientes</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-4">
                            <div class="row">
                                <dl class="dl-horizontal">
                                    <dt class="small text-muted">Id</dt>
                                    <dd><kbd>100010</kbd></dd>
                                    
                                    <dt class="small text-muted">Código Externo</dt>
                                    <dd>01000339426860</dd>

                                    <dt class="small text-muted">Tratamiento</dt>
                                    <dd><abbr class="small" title="Tratamiento">Sra.</abbr></dd>

                                    <dt class="small text-muted">Nombre</dt>
                                    <dd><strong>INFANTE MARIELA</strong></dd>

                                    <dt class="small text-muted">Nacimiento</dt>
                                    <dd>27-01-1988</dd>
                                </dl>

                                <dl class="dl-horizontal">
                                    <dt class="small text-muted">País Documento</dt>
                                    <dd>AR Argentina</dd>

                                    <dt class="small text-muted">Tipo Documento</dt>
                                    <dd>1 DNI</dd>

                                    <dt class="small text-muted">Nº Documento</dt>
                                    <dd>33.942.686</dd>

                                    <dt class="small text-muted">Condición Físcal</dt>
                                    <dd>3 Cons. Final</dd>
                                </dl>

                                <dl class="dl-horizontal">
                                    <dt class="small text-muted">Tipo Cliente</dt>
                                    <dd>Normal</dd>

                                    <dt class="small text-muted">Estado</dt>
                                    <dd><strong>Conectado</strong></dd>

                                    <dt class="small text-muted">Saldo CC.</dt>
                                    <dd>$ 0,00</dd>

                                    <dt class="small text-muted">Estado Prepago</dt>
                                    <dd><strong>Desactivado</strong></dd>

                                    <dt class="small text-muted">Saldo Prepago</dt>
                                    <dd>$ 0,00</dd>
                                </dl>

                                <dl class="dl-horizontal">
                                    <dt class="small text-muted">Forma de Págo</dt>
                                    <dd>Débito Automático</dd>

                                    <dt class="small text-muted">Entidad de Débito</dt>
                                    <dd>1 Visa</dd>

                                    <dt class="small text-muted">Nº de Cuenta <small>Déb. Auto.</small></dt>
                                    <dd>4508430027440369</dd>

                                    <dt class="small text-muted">Vencimiento <small>Déb. Auto.</small></dt>
                                    <dd>01-12-2017</dd>

                                    <dt class="small text-muted">CBU <small>Déb. Directo</small></dt>
                                    <dd></dd>
                                </dl>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="">
                                    <a data-toggle="tab" href="#profile" aria-expanded="false">Datos Personales</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#home" aria-expanded="false">Datos de Contacto</a>
                                </li>
                                <li class="active"><a data-toggle="tab" href="#messages" aria-expanded="true">Messages</a>
                                </li>
                                <li><a data-toggle="tab" href="#settings">Settings</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade">
                                    <h4>Home Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div id="profile" class="tab-pane fade">
                                    <h4>Profile Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div id="messages" class="tab-pane fade active in">
                                    <h4>Messages Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div id="settings" class="tab-pane fade">
                                    <h4>Settings Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->


        <!-- jQuery -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
        
        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>
        <!-- DataTables JavaScript -->
        <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                    responsive: true
            });
        });
        </script>
    </body>
</html>
