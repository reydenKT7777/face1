<!DOCTYPE html>
<html lang="es">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?=base_url()?>/assets/images/tienda.png" />

	<!--libreria Bootstrap-->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Libreria de iconos-->
    <link href="<?=base_url()?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/animate.min.css" rel="stylesheet">
    <!-- colores fondos y estilos css EDITAR PARA MANIPULACION -->
    <link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/css/jquery-ui.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/css/datatables/jquery.dataTables.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/css/estilos.css" rel="stylesheet">


    <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
		<script src="<?=base_url()?>assets/js/jquery-ui.js"></script>
		<script src="<?=base_url()?>assets/js/datatables/jquery.dataTables.js"></script>
		<script src="<?=base_url()?>assets/js/datatables/dataTables.responsive.min.js"></script>




	<title>Libreria</title>
</head>
<body class="nav-md">

    <div class="container body">
        <div class="main_container">


        <!--Menu a la izquierda-->
         	<div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-home"></i> <span><?=$this->session->sucursal?></span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?=base_url()?>assets/images/user.png" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bienvenido,</span>
                            <h2><?=$this->session->nombres?> <?=$this->session->apellidos?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Sucursales <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
																				<li><a href="<?=base_url()?>index.php/admin/administrador">Inicio</a></li>
                                        <li><a href="<?=base_url()?>index.php/controlador_sucursal">Sucursal</a>
                                        </li>

                                    </ul>
                                </li>
                                <li><a><i class="fa fa-users"></i> Personal <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
																				<li><a href="<?=base_url()?>index.php/controlador_tipo_contrato">Tipo Contrato</a>
																				</li>
																				<li><a href="<?=base_url()?>index.php/controlador_personal">Personal</a>
																				</li>
                                        <li><a href="<?=base_url()?>index.php/controlador_contrato">Contrato</a></li>
                                    </ul>
                                </li>
																<li><a><i class="fa fa-dollar"></i> Cajas <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
																				<li><a href="<?=base_url()?>index.php/controlador_caja">Caja</a>
																				</li>
                                    </ul>
                                </li>
																<li><a><i class="fa fa-cubes"></i> Almacenes<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
																				<li><a href="<?=base_url()?>index.php/controlador_almacen">Almacenes</a></li>
																				<li><a href="<?=base_url()?>index.php/controlador_proveedor">Proveedores</a></li>
																				<li><a href="<?=base_url()?>index.php/controlador_producto">Producto</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-shopping-cart"></i> Ventas <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?=base_url()?>index.php/controlador_cliente">Clientes</a>
                                        </li>
                                        <li><a href="<?=base_url()?>index.php/ventaPedido/reportesVenta">Ventas</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="tables.html">Tables</a>
                                        </li>
                                        <li><a href="tables_dynamic.html">Table Dynamic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="chartjs.html">Chart JS</a>
                                        </li>
                                        <li><a href="chartjs2.html">Chart JS2</a>
                                        </li>
                                        <li><a href="morisjs.html">Moris JS</a>
                                        </li>
                                        <li><a href="echarts.html">ECharts </a>
                                        </li>
                                        <li><a href="other_charts.html">Other Charts </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3>Live On</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="e_commerce.html">E-commerce</a>
                                        </li>
                                        <li><a href="projects.html">Projects</a>
                                        </li>
                                        <li><a href="project_detail.html">Project Detail</a>
                                        </li>
                                        <li><a href="contacts.html">Contacts</a>
                                        </li>
                                        <li><a href="profile.html">Profile</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="page_404.html">404 Error</a>
                                        </li>
                                        <li><a href="page_500.html">500 Error</a>
                                        </li>
                                        <li><a href="plain_page.html">Plain Page</a>
                                        </li>
                                        <li><a href="login.html">Login Page</a>
                                        </li>
                                        <li><a href="pricing_tables.html">Pricing Tables</a>
                                        </li>

                                    </ul>
                                </li>
                                <li><a><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
        <!--__________________________________________________-->


        <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?=base_url()?>assets/images/user.png" alt=""><?=$this->session->nombres?> <?=$this->session->apellidos?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?=base_url()?>index.php/admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
        <!--_____________________________________________-->

<?php $this->load->view($vista); ?>

        <!--_____________________________________________-->
				<!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right">Gentelella Alela! a Bootstrap 3 template by <a>Kimlabs</a>. |
                            <span class="lead"> <i class="fa fa-paw"></i> Gentelella Alela!</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

        </div>
            <!-- /page content -->
         </div>
    </div>
 <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>

    </div>
 <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
 <script src="<?=base_url()?>assets/js/custom.js"></script>
 <script src="<?=base_url()?>assets/js/numeric/jquery.numeric.min.js"></script>
 <!-- chart js -->
 <script src="<?=base_url()?>assets/js/chartjs/chart.min.js"></script>
 <!-- bootstrap progress js -->
 <script src="<?=base_url()?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
 <script src="<?=base_url()?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>
</body>
</html>
