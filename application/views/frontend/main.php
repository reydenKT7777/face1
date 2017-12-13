

<!DOCTYPE html PUBLIC>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="<?=base_url()?>/assets/images/tienda.png" />
<title><?=$this->session->sucursal?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" type="text/css">
	<link href="<?=base_url()?>assets/css/lightbox.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/estilos.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/select2/select2.min.css" type="text/css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/select2/s2-docs.css" type="text/css" rel="stylesheet" >
	<link href="<?=base_url()?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/datatables/jquery.dataTables.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/select2/prettify.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/select2/select2.full.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/select2/es.js"></script>
	<script src="<?=base_url()?>assets/js/datatables/jquery.dataTables.js"></script>
	<script src="<?=base_url()?>assets/js/datatables/dataTables.responsive.min.js"></script>
</head>
<body>

	<!--div class="container">
		<div class="row">
			<div class="col-md-4 ">
				<div class="navbar-header">
					    <button type="button" class="navbar-toggle menu-button" data-toggle="collapse" data-target="#myNavbar">
					        <span class="glyphicon glyphicon-align-justify"></span>
					    </button>

    			</div>
			</div>
			<div class="col-md-8">
				<nav class="collapse navbar-collapse navbar-static-top" id="myNavbar" role="navigation">
					<ul class="nav navbar-nav navbar-right menu">
							<li><a href="#page-top" class="page-scroll active">Home</a></li>
							<li><a href="#section2" class="page-scroll">Features</a></li>
							<li><a href="#work" class="page-scroll">Portfolio</a></li>
							<li><a href="<?=base_url()?>index.php/admin/logout" class="page-scroll">Cerrar sesion</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div-->
	<div class="navbar-wrapper">
		<div class="container">

			<nav class="navbar navbar-inverse navbar-fixed-top cabecera">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><i class="fa fa-home"></i> <?=$this->session->sucursal?></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="active"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Inicio</a></li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-user"></i>
									<span class="hidden-xs"><?=$this->session->nombres." ".$this->session->apellidos?></span><span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?=base_url()?>index.php/admin/logout"><i class="fa fa-sign-in"></i> Cerrar sesion</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>

<!--------------------------->

<?php $this->load->view($vista); ?>

<div class="container-fluid footer">
	<div class="row">
		<div class="col-md-12">
			<p>Sistema de ventas ####### <a href="#">sin nombre</a></p>
		</div>
	</div>
</div>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.countTo.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.waypoints.min.js"></script>
    <!--script src="https://maps.googleapis.com/maps/api/js"></script-->
    <script src="<?=base_url()?>assets/js/lightbox.min.js"></script>


	<script type="text/javascript">
    jQuery(function ($) {
      // custom formatting example
      $('.timer').data('countToOptions', {
        formatter: function (value, options) {
          return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
        }
      });

      // start all the timers
      $('#starts').waypoint(function() {
    $('.timer').each(count);
	});

      function count(options) {
        var $this = $(this);
        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
        $this.countTo(options);
      }
    });
  	</script>
</body>
</html>
