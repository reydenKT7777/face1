<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>Red de librerias</title>

	<link rel="icon" type="image/png" href="<?=base_url()?>/assets/images/tienda.png" />


	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
  <!-- Libreria de iconos-->
  <link href="<?=base_url()?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/animate.min.css" rel="stylesheet">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
	<link href="<?=base_url()?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/datatables/jquery.dataTables.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
		<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
</head>
<input type="hidden" id="base" value="<?=base_url()?>">
<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="Red de librerias"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="<?=$v1?>"><a href="<?=base_url()?>">Inicio <i class="fa fa-home"></i> </a></li>
					<li class="<?=$v2?>"><a href="<?=base_url()?>index.php/admin/productos">Lista de productos <i class="fa fa-cubes"></i> </a></li>

					<?php
					if ($this->session->nombres) {
						?>
						<li class="<?=$v3?>"><a href="<?=base_url()?>index.php/admin/misPedidos">Mis pedidos <i class="fa fa-send (alias)"></i> </a></li>
						<li><a class="btn" href="<?=base_url()?>index.php/admin/logout">Cerrar sesion</a></li>
						<?php
					}
					else {
						?>
						<li><a class="btn" href="<?=base_url()?>index.php/admin/login">INGRESAR / REGISTRARSE</a></li>
						<?php
					}
					 ?>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->
<?php $this->load->view($vista);?>

	<!-- Social links. @TODO: replace by link/instructions in template -->
	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
	</section>
	<!-- /social links -->


	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">

					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>+7000000<br>
								<a href="mailto:#">some.email@somewhere.com</a><br>
								<br>
								234 Hidden Pond Road, Ashland City, TN 37015
							</p>
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Follow me</h3>
						<div class="widget-body">
							<p class="follow-me-icons">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-dribbble fa-2"></i></a>
								<a href=""><i class="fa fa-github fa-2"></i></a>
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Text widget</h3>
						<div class="widget-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
							<p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="#">Inicio <i class="fa fa-home"></i> </a> |
								<a href="about.html">Productos <i class="fa fa-cubes"></i> </a> |
								<a href="sidebar-right.html">Sidebar</a> |
								<a href="contact.html">Contact</a> |
								<b><a href="signup.html">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2014, Your name. Designed by <a href="http://gettemplate.com/" rel="designer">gettemplate</a>
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>





	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->

	<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/js/headroom.min.js"></script>
	<script src="<?=base_url()?>assets/js/jQuery.headroom.min.js"></script>
	<script src="<?=base_url()?>assets/js/template.js"></script>
	<script src="<?=base_url()?>assets/js/datatables/jquery.dataTables.js"></script>

</body>
</html>
