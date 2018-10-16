<?php session_start(); ?>
<!doctype html>
<html lang="es">
<head>
  	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="author" content="www.suwwweb.com">
	
	<title>Tu Cuento Soñado</title>
	
	<!-- Favicons -->
	
	<meta name="theme-color" content="#FFFFFF">
	
	<meta name="description" content="">
	<meta name="keywords" content="">

  	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<link rel="stylesheet" href="./assets/css/bundle.min.css">

</head>
<body>

<header>

	<nav class="navbar navbar-default">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-2">

					<div class="navbar-header">

						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" href="index.html" target="_self">
							<img class="img-responsive" src="./assets/img/logo.png">
						</a>

					</div>

				</div>

				<div class="col-xs-12 col-sm-12 col-md-10">

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="index.html">Inicio</a>
							</li>
							<li>
								<a href="index.html#como-funciona">Como funciona</a>
							</li>
							<li>
								<a href="index.html#comentarios">Opiniones</a>
							</li>
							<li>
								<a href="preguntas-frecuentes.html">Preguntas frecuentes</a>
							</li>
							<li>
								<a href="index.html#nuestros-cuentos">Nuestros cuentos</a>
							</li>
							<li>
								<a href="index.html#como-son">Como son</a>
							</li>
							<li>
								<a href="#" class="btn-link-main" data-seccion="#contacto">Contacto</a>
							</li>
							<li>
								<a href="#">Tienda</a>
							</li>
						</ul>
					</div>

				</div>

			</div>

		</div>

	</nav>
</header>

<main class="bg-blue">

	<section class="home-block-5">
		<div class="container">
	
			<div class="row">
				<div class="col-md-12">

					<h1>Tu carrito</h1>

				</div>
			</div>

		</div>
	</section>

	<section class="order-cart-block">
		<div class="container">
	
			<div class="row">

				<div class="col-md-8">
				
					<div class="container-box">

						<div class="row">

							<div class="col-xs-12 col-sm-3 col-md-3">
								<img src="./generate-image/script-avatar.php?type=<?= (empty($_SESSION['hidde_value_type']))? 1 : $_SESSION['hidde_value_type'] ?>&skin=<?= (empty($_SESSION['hidde_value_skin']))? 1 : $_SESSION['hidde_value_skin'] ?>&eyes=<?= (empty($_SESSION['hidde_value_eyes']))? 1 : $_SESSION['hidde_value_eyes'] ?>&hair=<?= (empty($_SESSION['hidde_value_hair']))? 1 : $_SESSION['hidde_value_hair'] ?>" class="img-responsive">
							</div>

							<div class="col-xs-12 col-sm-5 col-md-5">

								<h2>Planeta Gelatina</h2>
								<p><?= (empty($_SESSION['name']))? 1 : $_SESSION['name'] ?></p>

								<?php if(empty($_SESSION['image_user'])): ?>

								<small class="label label-danger">Sin foto</small>

								<?php else: ?>

								<small class="label label-success">Con foto</small>

								<?php endif ?>
							
							</div>

							<div class="col-xs-12 col-sm-4 col-md-4">

								<h3>$32.00</h3>
								<a href="./crear-cuento.php" target="_self">Editar opciones</a>

							</div>

						</div>

					</div>

					<h2 class="subtitle">Opciones de envío</h2>

					<div class="container-box delivery-time">

						<div class="content">

							<div class="row">
								
								<div class="col-xs-12 col-sm-7 col-md-7">
									<p>Tiempo de entrega estimado<br><b>8 - 12 días</b></p>
								</div>
								
								<div class="col-xs-12 col-sm-5 col-md-5">
									<p>Envío<br><b>$3.00</b></p>
								</div>
								
							</div>
						
						</div>

					</div>

				</div>

				<div class="col-md-4">
				
					<div class="container-box">
						
						<h2 class="subtitle">Resumen</h2>
						
						<table>
						
							<thead>
						
								<tr>
									<th class="text-right">Subtotal:</th>
									<th class="text-left"><span>$21.25</span></th>
								</tr>
						
								<tr>
									<th class="text-right">Envío:</th>
									<th class="text-left"><span>$0.00</span></th>
								</tr>
						
								<tr>
									<th colspan="2"></th>
								</tr>

							</thead>
						
							<tbody>
						
								<tr>
									<td class="text-right">Total:</td>
									<td class="text-left"><span>$21.25</span></td>
								</tr>
						
							</tbody>
						
						</table>

					</div>

					<a href="./order-cart-payment.html" target="_self" class="btn btn-danger">REALIZAR PEDIDO</a>
				
				</div>

			</div>
	
		</div>
	</section>

</main>

<footer id="contacto">

	<div class="footer-body">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-4">

					<img src="./assets/img/logo-footer.png" class="img-responsive">

				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					
					<ul>
						<li><a href="tel:01573219606037" target="_blank"><img src="./assets/img/icon-whatsapp-footer.png"> 01 +57 321 960 6037</a></li>
						<li><a href="mailto:info@tucuentosoñado.com" target="_blank"><img src="./assets/img/icon-mail-footer.png"> info@tucuentosoñado.com</a></li>
					</ul>

				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					
					<a href="crear-cuento.php" target="_self" class="btn btn-default">Crea tu cuento</a>

				</div>

			</div>

		</div>

	</div>

	<div class="footer-bottom">
		<div class="container">

			<div class="row">
				<div class="col-md-12">

					<p>Hecho por <a href="https://www.suwwweb.com/" target="_blank"><img src="./assets/img/icon-suwwweb.png"></a> - Páginas web</p>

				</div>
			</div>

		</div>
	</div>

</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<script type="text/javascript" src="./assets/js/bundle.min.js"></script>

</body>
</html>