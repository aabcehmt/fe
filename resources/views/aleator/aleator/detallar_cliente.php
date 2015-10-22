<!DOCTYPE html>
<html lang="en">
 
    <?php include_once('partials/header.php'); ?>
 
    <body>
        <!-- /#wrapper -->
        <div id="wrapper">

            <!-- Navigation -->
            <?php include_once('partials/topbar.php'); ?>

            <?php include_once('partials/sidebar.php'); ?>
            <!-- Navigation -->


            <!-- /#page-wrapper -->
            <div id="page-wrapper">
 				<div class="container-fluid">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <h4 class="page-header">Detalle del Cliente</h4>
	                    </div>
	                    <!-- /.col-lg-12 -->
	                </div>
	                <!-- /.row -->
	 
	                <div class="row">
	                    <div class="col-lg-12">

	                        <div class="col-lg-3">
	                            <div class="row">
	                            	<div class="panel panel-default">
							  			<div class="panel-body" style="border:0px">
							  				<div class="well well-sm" style="padding-top:0px; padding-bottom:0px; border:0px">
								  				<dl>
								  					<h5>
				                                        <dt class=" text-muted"><small>ID</small></dt>
				                                        <dd><strong><kbd>100010</kbd></strong></dd>
				                                        
				                                        <dt class=" text-muted"><small>CLIENTE</small></dt>
				                                        <dd><strong>Gonzalo Martinez Vogt</strong></dd>
				                                       
				                                        <dt class=" text-muted"><small>TIPO DE CLIENTE</small></dt>
				                                        <dd><strong>Normal</strong></dd>
				                                        
				                                        <dt class=" text-muted"><small>ESTADO</small></dt>
				                                        <dd><strong>Conectado</strong></dd>
				                                       
				                                        <dt class=" text-muted"><small>FORMA DE PAGO</small></dt>
				                                        <dd><strong>Débito Automático</strong></dd>
				                                       
				                                        <dt class=" text-muted"><small>SALDO CC.</small></dt>
				                                        <dd><strong><samp>$ 0,00</samp></strong></dd>
			                                   		</h5>
			                                   	</dl>
		                                   	</div>

	                                   	    <ul class="nav nav-pills nav-stacked">
			                                    <li class="active"><a data-toggle="pill" href="#maintab_info">Información</a></li>
			                                    <li><a data-toggle="pill" href="#maintab_ctacte">Cuenta Corriente</a></li>
			                                    <li><a data-toggle="pill" href="#maintab_gestiones">Gestiones At.Cliente</a></li>
			                                    <li><a data-toggle="pill" href="#maintab_histpartes">Historial Partes</a></li>
			                                    <li><a data-toggle="pill" href="#maintab_pagoelect">Códigos de Pago Electrónico</a></li>
			                                    <li><a data-toggle="pill" href="#maintab_histdeb">Historial Débito Automático</a></li>
			                                    <li><a data-toggle="pill" href="#maintab_gestcobro">Historial Gestiones Cobro</a></li>
			                                    <li><a data-toggle="pill" href="#maintab_facturasmail">Histrorial de envío de facturas por mail</a></li>
			                                    <li><a data-toggle="pill" href="#maintab_datagrabacion">Datos de Grabación</a></li>
			                                </ul>
			                            </div>
	                                </div>
	                            </div>
	                        </div>

	                        
		                    <div class="col-lg-9">
		                        <div class="tab-content">
									<div id="maintab_info" class="tab-pane fade in active">
				                            <!-- Nav tabs -->
				                            <ul class="nav nav-tabs">
				                                <li class="active">
				                                    <a data-toggle="tab" href="#client" aria-expanded="true">Datos del Cliente</a>
				                                </li>
				 
				                                <li>
				                                    <a data-toggle="tab" href="#profile" aria-expanded="false">Datos Personales</a>
				                                </li>
				 
				                                <li>
				                                    <a data-toggle="tab" href="#contact" aria-expanded="false">Datos de Contacto</a>
				                                </li>
				                               
				                                <li><a data-toggle="tab" href="#settings">Settings</a>
				                                </li>
				                            </ul>
				                            <!-- Tab panes -->
				                            <div class="tab-content">
				                                <div id="client" class="tab-pane fade active in">
				                                	<div class="row">
				                                		<div class="col-lg-6">
						                                    <h6 class="text-muted">IDENTIFICACION</h6>
						                                    <hr style="margin-top: -5px; margin-bottom: 5px;">
					                                    	<dl class="dl-horizontal">
						                                        <dt class="small text-muted">Id</dt>
						                                        <dd><kbd>100010</kbd></dd>
						                                       
						                                        <dt class="small text-muted">Código Externo</dt>
						                                        <dd>01000339426860</dd>

						                                        <dt class="small text-muted">Tipo Cliente</dt>
						                                        <dd>Normal</dd>
						 
						                                        <dt class="small text-muted">Estado</dt>
						                                        <dd><strong>Conectado</strong></dd>
						                                    </dl>
					                                    </div>
					                                    <div class="col-lg-6">
						                                    <h6 class="text-muted">VENTA E INSTALACIÓN</h6>
						                                    <hr style="margin-top: -5px; margin-bottom: 5px;">
							                                <dl class="dl-horizontal">
						                                        <dt class="small text-muted">Empresa de Venta</dt>
						                                        <dd>7 Oficina Mulchén</dd>
						 
						                                        <dt class="small text-muted">Agencia de Venta</dt>
						                                        <dd>7 Oficina Comercial Mulchén</dd>
						 
						                                        <dt class="small text-muted">Empresa de Instalación</dt>
						                                        <dd>7 Oficina Mulchén</dd>
						 
						                                        <dt class="small text-muted">Agencia de Instalación</dt>
						                                        <dd>7 Oficina Técnica Mulchén</dd>
						                                    </dl>
					                                    </div>
				                                    </div>
				                                    <div class="row">
					                                    <div class="col-lg-6">
						                                    <h6 class="text-muted">FORMA DE PAGO</h6>
						                                    <hr style="margin-top: -5px; margin-bottom: 5px;">
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
					                                    <div class="col-lg-6">
						                                    <h6 class="text-muted">SALDOS</h6>
						                                    <hr style="margin-top: -5px; margin-bottom: 5px;">
						                                    <dl class="dl-horizontal">
						 
						                                        <dt class="small text-muted">Saldo CC.</dt>
						                                        <dd>$ 0,00</dd>
						 
						                                        <dt class="small text-muted">Estado Prepago</dt>
						                                        <dd><strong>Desactivado</strong></dd>
						 
						                                        <dt class="small text-muted">Saldo Prepago</dt>
						                                        <dd>$ 0,00</dd>
						 
						                                        <dt class="small text-muted">Estado Informe Deudor</dt>
						                                        <dd></dd>
						                                    </dl>
					                                    </div>
				                                    </div>
				                                </div>
				 
				                                <div id="profile" class="tab-pane fade">
				                                    <h4>Identificación</h4>
				                                    <dl class="dl-horizontal">
				                                        <dt class="small text-muted">Tratamiento</dt>
				                                        <dd>Sra.</dd>
				 
				                                        <dt class="small text-muted">Nombre</dt>
				                                        <dd><strong>INFANTE MARIELA</strong></dd>
				                                    </dl>
				 
				                                    <h4>Datos Fiscales</h4>
				                                    <dl class="dl-horizontal">
				                                        <dt class="small text-muted">País Documento</dt>
				                                        <dd>AR Argentina</dd>
				 
				                                        <dt class="small text-muted">Tipo Documento</dt>
				                                        <dd>1 DNI</dd>
				 
				                                        <dt class="small text-muted">Nº Documento</dt>
				                                        <dd><samp>33.942.686</samp></dd>
				 
				                                        <dt class="small text-muted">Condición Físcal</dt>
				                                        <dd>3 Cons. Final</dd>
				                                    </dl>
				 
				                                    <h4>Otros Datos</h4>
				                                    <dl class="dl-horizontal">
				                                        <dt class="small text-muted">Genero</dt>
				                                        <dd>Femenino</dd>
				 
				                                        <dt class="small text-muted">Nacimiento</dt>
				                                        <dd>27-01-1988</dd>
				 
				                                        <dt class="small text-muted">Estado Civil</dt>
				                                        <dd></dd>
				 
				                                        <dt class="small text-muted">Oficio</dt>
				                                        <dd></dd>
				                                    </dl>
				                                </div>
				 
				                                <div id="contact" class="tab-pane fade">
				                                    <h4>Domicilio de Facturación</h4>
				                                    <dl class="dl-horizontal">
				                                        <dt class="small text-muted">Tipo de Calle</dt>
				                                        <dd>Calle</dd>
				 
				                                        <dt class="small text-muted">Calle</dt>
				                                        <dd>EL CISNE</dd>
				 
				                                        <dt class="small text-muted">Altura</dt>
				                                        <dd>554</dd>
				 
				                                        <dt class="small text-muted">Piso, Dpto., etc.</dt>
				                                        <dd></dd>
				                                    </dl>
				 
				                                    <dl class="dl-horizontal">
				                                        <dt class="small text-muted">Localidad</dt>
				                                        <dd>Darregueira</dd>
				 
				                                        <dt class="small text-muted">Provincia</dt>
				                                        <dd>Buenos Aires</dd>
				 
				                                        <dt class="small text-muted">País</dt>
				                                        <dd>Argtentina</dd>
				                                    </dl>
				                                </div>
				 
				                                <div id="settings" class="tab-pane fade">
				                                    <h4>Settings Tab</h4>
				                                    <p>DD</p>
				                                </div>
				                            </div>
									</div>
									<div id="maintab_ctacte" class="tab-pane fade">
										<h3>Cuenta Corriente</h3>
									</div>
									<div id="maintab_gestiones" class="tab-pane fade">
										<h3>Gestiones At.Cliente</h3>
									</div>
									<div id="maintab_histpartes" class="tab-pane fade">
										<h3>Historial Partes</h3>
									</div>
									<div id="maintab_pagoelect" class="tab-pane fade">
										<h3>Códigos de Pago Electrónico</h3>
									</div>
									<div id="maintab_histdeb" class="tab-pane fade">
										<h3>Historial Débito Automático</h3>
									</div>
									<div id="maintab_gestcobro" class="tab-pane fade">
										<h3>Historial Gestiones Cobro</h3>
									</div>
									<div id="maintab_facturasmail" class="tab-pane fade">
										<h3>Histrorial de envío de facturas por mail</h3>
									</div>
									<div id="maintab_datagrabacion" class="tab-pane fade">
										<h3>Datos de Grabación</h3>
									</div>
								</div>
							</div>		
	                    </div>
	                    <!-- /.col-lg-12 -->
	                </div>
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


