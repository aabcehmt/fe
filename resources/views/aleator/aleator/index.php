<!DOCTYPE html>
<html lang="en">

    <?php include_once('partials/header.php'); ?>

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
                    <a class="navbar-brand" href="./" style="padding: 5px;">
                        <img style="padding: 0px" alt="InTv" src="../../logo/aleator.png">
                    </a>
                    <a class="navbar-brand" href="./" style="padding: 5px;">
                        <img style="padding: 0px" alt="InTv" src="../../logo/intv.png">
                    </a>
                    <a class="navbar-brand" href="./" style="padding: 5px;">
                        <img style="padding: 0px" alt="InTv" src="../../logo/mp.png">
                    </a>
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
                        <h4 class="page-header">Consulta de Clientes</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="well">
                            <form role="form">
                                <div class="row form-group">
                                    <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                        <label><small>Id Cliente</small></label>
                                        <input class="form-control input-sm" type="text" id="AT_ID" name="AT_ID">
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                        <label><small>Id Conexión</small></label>
                                        <input class="form-control input-sm" type="text" id="Cnx_ID" name="Cnx_ID">
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                        <label><small>Cód. Ext.</small></label>
                                        <input class="form-control input-sm" type="text" id="CODIGO_EXPORTAR" name="CODIGO_EXPORTAR">
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                        <label><small>Documento</small></label>
                                        <input class="form-control input-sm" type="text" id="DOCU_NUMERO" name="DOCU_NUMERO">
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                        <label><small>Tarjeta</small></label>
                                        <input class="form-control input-sm" type="text" id="DEBAUT_CUENTA" name="DEBAUT_CUENTA">
                                    </div>  
                                    <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                        <label><small>Teléfono</small></label>
                                        <input class="form-control input-sm" type="text" id="TELEFONO" name="TELEFONO">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <label><small>Nombre</small></label>
                                        <input class="form-control input-sm" type="text" id="APENOM" name="APENOM">
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-4">
                                        <label><small>Domicilio</small></label>
                                        <input class="form-control input-sm" type="text" id="CALLE_NRO" name="CALLE_NRO">
                                    </div>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                        <label><small>Correo</small></label>
                                        <input class="form-control input-sm" type="text" id="EMAIL" name="EMAIL">
                                    </div>
                                </div>

                                <button class="btn btn-warning btn-xs" type="submit">Buscar</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#id</th>
                                        <th>Código Externo</th>
                                        <th>Apellido y Nombre</th>
                                        <th>Domicilio Facturación</th>
                                        <th>Localidad</th>
                                        <th>Estado</th>
                                        <th>Deuda</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center"><kbd>100013</kbd></td>
                                        <td align="center"><small>01000330594919</small></td>
                                        <td align="left">PAEZ MATIAS ALEJANDRO</td>
                                        <td align="left">QUIROZ 1360</td>
                                        <td align="left">Rawson (San Juan)</td>
                                        <td align="left">Desconectado</td>
                                        <td align="right">$ 0,00</td>
                                    </tr>
                                    <tr>
                                        <td align="center"><kbd>100010</kbd></td>
                                        <td align="center"><small>01000339426860</small></td>
                                        <td align="left">INFANTE MARIELA</td>
                                        <td align="left">Gatica 255</td>
                                        <td align="left">Zapala</td>
                                        <td align="left">Conectado</td>
                                        <td align="right">$ 0,00</td>
                                    </tr>
                                    <tr>
                                        <td align="center"><kbd>100013</kbd></td>
                                        <td align="center"><small>01000330594919</small></td>
                                        <td align="left">PAEZ MATIAS ALEJANDRO</td>
                                        <td align="left">QUIROZ 1360</td>
                                        <td align="left">Rawson (San Juan)</td>
                                        <td align="left">Desconectado</td>
                                        <td align="right">$ 0,00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
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
