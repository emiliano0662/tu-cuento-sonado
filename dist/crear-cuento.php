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

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
	<link rel="stylesheet" href="./assets/plugin/book-block-master/css/bookblock.css">
	<link rel="stylesheet" href="./assets/css/bundle.min.css">
	
	<script type="text/javascript" src="./assets/plugin/book-block-master/js/modernizr.custom.js"></script>

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
								<a href="index.html">Como funciona</a>
							</li>
							<li>
								<a href="index.html">Opiniones</a>
							</li>
							<li>
								<a href="preguntas-frecuentes.html">Preguntas frecuentes</a>
							</li>
							<li>
								<a href="index.html">Nuestros cuentos</a>
							</li>
							<li>
								<a href="index.html">Como son</a>
							</li>
							<li>
								<a href="index.html">Contacto</a>
							</li>
							<li>
								<a href="index.html">Tienda</a>
							</li>
						</ul>
					</div>

				</div>

			</div>

		</div>

	</nav>
</header>

<main>

	<form id="form-crear-cuento" action="./generate-image/script-create-story.php" method="POST">
		<input type="hidden" id="hidde_value_skin" name="hidde_value_skin" value="1">
		<input type="hidden" id="hidde_value_eyes" name="hidde_value_eyes" value="1">
		<input type="hidden" id="hidde_value_hair" name="hidde_value_hair" value="1">

		<input type="hidden" id="hidden_croppie_img_file" name="hidden_croppie_img_file">

		<section class="create-story-block container-create-story-1">
			<div class="container">
		
				<div class="row">

					<div class="col-md-7">

						<div class="container-box">

							<div class="row">
								<div class="col-md-12">
									
									<h2>Nombre del protagonista</h2>

								</div>
							</div>

							<div class="row">
								<div class="col-md-12">

									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="Nombre" data-validation="required" data-validation-error-msg="* Campo requerido" maxlength="11" value="<?=(empty($_POST['home_name']))? '' : strtolower($_POST['home_name'])?>">
									</div>

								</div>
							</div>

							<div class="row">
								<div class="col-md-12">

									<h2>Género</h2>

								</div>
							</div>

							<div class="row">

								<div class="col-md-6">

									<div class="form-group">
										<div class="radio">
											<label>
												<input type="radio" name="gender" value="boy"> Niño
											</label>
										</div>
									</div>

								</div>

								<div class="col-md-6">

									<div class="form-group">
										<div class="radio">
											<label>
												<input type="radio" name="gender" value="girl" checked="checked"> Niña
											</label>
										</div>
									</div>
								
								</div>
							
							</div>

							<div class="row">
								<div class="col-md-12">
							
									<h2>Tipografía</h2>
							
								</div>
							</div>

							<div class="row">
							
								<div class="col-md-6">
							
									<div class="form-group">
										<div class="radio">
											<label>
												<input type="radio" name="typography" value="1" checked="checked"> Normal
											</label>
										</div>
									</div>
							
								</div>
							
								<div class="col-md-6">
							
									<div class="form-group">
										<div class="radio">
											<label>
												<input type="radio" name="typography" value="2"> Mayúsculas
											</label>
										</div>
									</div>
							
								</div>
							
							</div>

						</div>

					</div>

					<div class="col-md-5">

						<div class="container-box">
							<p>Te recomendamos indicar el nombre por el que habitualmente llamáis al niño.</p>
							<p>Ten en cuenta que el nombre del protagonista se repite a lo largo del cuento y usar nombres largos puede resultar repetitivo y poco natural.</p>
							<p>Evita las faltas de ortografía ya que es un regalo que suele perdurar en el tiempo.</p>
						</div>

					</div>

				</div>

				<div class="container-btn">
		
					<div class="row">
						
						<div class="col-md-6">

							<!--<button type="button" class="btn btn-default btn-change-create-story"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Apariencia</button>-->

						</div>
						
						<div class="col-md-6">
								
							<button type="button" class="btn btn-default btn-change-create-story" data-item="2">Ahora dale vida a tu protagonista <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></button>
							
						</div>
						
					</div>
				
				</div>

			</div>
		</section>

		<section class="create-story-block container-create-story-2">
			<div class="container">
		
				<div class="row">
		
					<div class="col-md-4">

						<div class="owl-carousel carousel-create-story-items">
						
							<div class="item content-items-skin">

								<div class="carousel-title">
									<h3>Piel</h3>
								</div>

								<div class="carousel-item active" data-item="skin" data-type="1">
									<div class="content-color" style="background-color: #ffdfbf;"></div>
								</div>
								
								<div class="carousel-item" data-item="skin" data-type="2">
									<div class="content-color" style="background-color: #f0b390;"></div>
								</div>
								
								<div class="carousel-item" data-item="skin" data-type="3">
									<div class="content-color" style="background-color: #af6d55;"></div>
								</div>

							</div>

							<div class="item content-items-ayes">
								
								<div class="carousel-title">
									<h3>Ojos</h3>
								</div>

								<div class="carousel-item active" data-item="ayes" data-type="1">
									<div class="content-color" style="background-color: #36708c;"></div>
								</div>
								
								<div class="carousel-item" data-item="ayes" data-type="2">
									<div class="content-color" style="background-color: #9f5b47;"></div>
								</div>
								
								<div class="carousel-item" data-item="ayes" data-type="3">
									<div class="content-color" style="background-color: #746661;"></div>
								</div>
								
								<div class="carousel-item" data-item="ayes" data-type="4">
									<div class="content-color" style="background-color: #a46400;"></div>
								</div>
								
								<div class="carousel-item" data-item="ayes" data-type="5">
									<div class="content-color" style="background-color: #6a6867;"></div>
								</div>
								
								<div class="carousel-item" data-item="ayes" data-type="6">
									<div class="content-color" style="background-color: #607a3d;"></div>
								</div>
								
							</div>

							<div class="item content-items-hair">
							
								<div class="carousel-title">
									<h3>Cabello</h3>
								</div>
							
								<div class="carousel-item active" data-item="hair" data-type="1">
									<div class="content-color" style="background-color: #da8d16;"></div>
								</div>
								
								<div class="carousel-item" data-item="hair" data-type="2">
									<div class="content-color" style="background-color: #4b4b4b;"></div>
								</div>
								
								<div class="carousel-item" data-item="hair" data-type="3">
									<div class="content-color" style="background-color: #bc5120;"></div>
								</div>
								
								<div class="carousel-item" data-item="hair" data-type="4">
									<div class="content-color" style="background-color: #ffd635;"></div>
								</div>
							
							</div>

						</div>

						<a href="#" class="btn-carousel-create-story btn-left"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
						<a href="#" class="btn-carousel-create-story btn-right"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>

					</div>

					<div class="col-md-8">
						
						<div id="create-story-avatar">
							<img src="./generate-image/script-avatar.php?type=girl&skin=1&eyes=1&hair=1" id="img-select-avatar" class="img-responsive">
						</div>

					</div>
		
				</div>
		
				<div class="container-btn">
		
					<div class="row">
		
						<div class="col-md-6">
		
							<button type="button" class="btn btn-default btn-change-create-story" data-item="1"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Nombre</button>
		
						</div>
		
						<div class="col-md-6">
		
							<button type="button" class="btn btn-default btn-change-create-story" data-item="3">Dedicatoria <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></button>
		
						</div>
		
					</div>
		
				</div>
		
			</div>
		</section>

		<section class="create-story-block container-create-story-3">
			<div class="container">
		
				<div class="row">
		
					<div class="col-md-7">

						<div class="container-box">

							<div class="row">
								<div class="col-md-12">
							
									<h2>¿Que le quieres decir al protagonista?</h2>
									<p class="subline">Esta es una plantilla estándar que puedes modificar</p>
							
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
							
									<div class="form-group">
										<textarea class="form-control" name="dedication" placeholder="Nombre" rows="6">Éste es un cuento mágico para un niño especial como tú. Esperamos que vivas fantásticas aventuras rodeado de los que más te quieren.</textarea>
									</div>
							
								</div>
							</div>

						</div>
		
					</div>
		
					<div class="col-md-5">

						<div class="container-box box-photo">
							<h2>¿Deseas agregar una foto del niño(a)?</h2>
							<p class="subline">Esta foto permitirá que el niño(a) se identifique dentro de la historia.</p>
							<div id="upload-croppie"></div>
							<img src="" id="img-avatar-pre-select" class="img-responsive">
							<input type="file" id="croppie-img-file" accept="image/*">
							<div class="content-btn-box-photo">
								<button type="button" id="btn-croppie-file-add" class="btn btn-default">Añadir foto</button>
								<button type="button" id="btn-croppie-file-cancel" class="btn btn-default">Cancelar</button>
								<button type="button" id="btn-croppie-file-accept" class="btn btn-success">Aceptar</button>
							</div>
						</div>
		
						<div class="container-box">
							<p>Colorín colorado este hermoso cuento a finalizado…una vez más revisa detenidamente que tu dedicatoria no presente errores y así dar por terminado este bonito proyecto. Ahora puedes continuar con el proceso de compra y muy pronto te lo llevaremos a casa.</p>
						</div>
		
					</div>
		
				</div>
		
				<div class="container-btn">
		
					<div class="row">
		
						<div class="col-md-6">
		
							<button type="button" class="btn btn-default btn-change-create-story" data-item="5"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Apariencia</button>
		
						</div>
		
						<div class="col-md-6">
		
							<button type="submit" id="btn-crear-cuento" class="btn btn-success" data-loading-text="Cargando..." data-item="4">Crea tu cuento</button>
		
						</div>
		
					</div>
		
				</div>
		
			</div>
		</section>

		<section class="create-story-block container-create-story-4">
			<div class="container">
		
				<div class="row">
					<div class="col-md-12">

						<div class="box-bookblock">	
							<div id="bb-bookblock" class="bb-bookblock bb-vertical">
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-1.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-2.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-3.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-4.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-5.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-6.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-7.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-8.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-9.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-10.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-11.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-12.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-13.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-14.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-15.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-16.php" class="img-responsive img-bookblock">
								</div>
								<div class="bb-item">
									<img src="http://localhost/tu-cuento-sonado/dist/generate-image/script-create-image/page-17.php" class="img-responsive img-bookblock">
								</div>
							</div>

							<div class="btn-bookblock-left"></div>
							<div class="btn-bookblock-right"></div>
							<div class="arrow">
								<img class="img-type-one" src="./assets/img/arrow.png">
								<img class="img-type-two" src="./assets/img/arrow2.png">
								Toca para pasar página
							</div>

						</div>

					</div>
				</div>

				<div class="container-btn">
		
					<div class="row">
		
						<div class="col-md-6">

							<a href="./crear-cuento.php" class="btn btn-default"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Regresar</a>

						</div>
		
						<div class="col-md-6">
		
							<button type="button" id="btn-ir-carrito" class="btn btn-danger" data-loading-text="Cargando..." data-href="./generate-image/script-add-cart.php">Ir al carrito</button>
		
						</div>
		
					</div>
		
				</div>

			</div>
		</section>

	</form>

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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>

<script type="text/javascript" src="./assets/plugin/book-block-master/js/jquery.bookblock.min.js"></script>

<script type="text/javascript" src="./assets/js/bundle.min.js"></script>

</body>
</html>