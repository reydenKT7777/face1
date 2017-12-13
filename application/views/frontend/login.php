<!DOCTYPE html PUBLIC>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Red de librerias</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/png" href="<?=base_url()?>/assets/images/tienda.png" />
	<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" type="text/css">
	<link href="<?=base_url()?>assets/css/lightbox.css" rel="stylesheet">
	<!-- Libreria de iconos-->
	<link href="<?=base_url()?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/animate.min.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>
<header class="header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 ">
				<div class="navbar-header">
					    <button type="button" class="navbar-toggle menu-button" data-toggle="collapse" data-target="#myNavbar">
					        <span class="glyphicon glyphicon-align-justify"></span>
					    </button>

    			</div>
			</div>
			<div class="col-md-8">
				<nav class="collapse navbar-collapse" id="myNavbar" role="navigation">
					<ul class="nav navbar-nav navbar-right menu">
							<!--li><a href="#page-top" class="page-scroll active">Home</a></li>
							<li><a href="#section2" class="page-scroll">Features</a></li>
							<li><a href="#work" class="page-scroll">Portfolio</a></li>
							<li><a href="#section4" class="page-scroll">Contact</a></li-->
					</ul>
				</nav>
			</div>
		</div>
	</div>
</header>
<!--------------------------->
<div class="container-fluid main" id="page-top">
	<div class="row">
		<div class="col-md-12 backg">
			<div class="col-md-4 col-md-offset-4 inner col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
				<div class="text-box">
                	<p class="intro">Ingreso al sistema</p>
                  <img src="<?=base_url()?>assets/images/user.png" alt="">
                    <form class="" action="<?=base_url()?>index.php/admin/log" method="post">
                      <h3><input type="text" class="form-control" name="usr" placeholder="usuario"></h3>
                      <p class="label-danger"><?php if (isset($error)) {
                        echo $error;
                      } ?></p>
                      <h3><input type="password" class="form-control" name="pas" placeholder="*******"></h3>
                      <p><input type="submit" class="btn btn-success link-button btn-block" value="Ingresar"></p>
											<p>
												<div class="col-md-6">
													<a href="<?=base_url()?>" class="btn btn-warning btn-block">Regresar <i class="fa fa-home"></i></a>
												</div>
												<div class="col-md-6">
													<a href="<?=base_url()?>index.php/admin/registrarse" class="btn btn-info btn-block">Registrarse <i class="fa fa-user"></i></a>
												</div>
											</p>
                    </form>
				</div>
  			</div>
		</div>
		<!--div class="col-md-12 some-notes">
			<div class="title">
                <h2>Welcome To Ravalic</h2>
            </div>
            <div class="desc">
                <p>Ravelic is a free responsive html5 templates released by <a href="http://www.html5templates">HTML5 Layouts</a>. You can use this template for personal as well as commercial purpose but you have to give us a credit link in footer.</p>
            </div>
		</div-->
	</div>
</div>
<div class="container-fluid footer">
	<div class="row">
		<div class="col-md-12">
			<p>Sistema de ventas ####### <a href="#">sin nombre</a></p>
		</div>
	</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.countTo.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.waypoints.min.js"></script>
    <!--script src="https://maps.googleapis.com/maps/api/js"></script-->
    <script src="<?=base_url()?>assets/js/lightbox.min.js"></script>

    <script>
	$(document).ready(function () {
		$(document).on("scroll", onScroll);

		$('a[href^="#"]').on('click', function (e) {
			e.preventDefault();
			$(document).off("scroll");

			$('a').each(function () {
				$(this).removeClass('active');
			})
			$(this).addClass('active');

			var target = this.hash;
			$target = $(target);
			$('html, body').stop().animate({
				'scrollTop': $target.offset().top
			}, 500, 'swing', function () {
				window.location.hash = target;
				$(document).on("scroll", onScroll);
			});
		});
	});

	function onScroll(event){
		var scrollPosition = $(document).scrollTop();
		$('nav a').each(function () {
			var currentLink = $(this);
			var refElement = $(currentLink.attr("href"));
			if (refElement.position().top <= scrollPosition && refElement.position().top + refElement.height() > scrollPosition) {
				$('nav ul li a').removeClass("active");
				currentLink.addClass("active");
			}
			else{
				currentLink.removeClass("active");
			}
		});
	}
	</script>
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
