<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Portafolio de Sebastián Ríos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link rel="stylesheet" href="css/fontello.css">
	<link rel="stylesheet" href="css/estilosPortafolio.css">
</head>
<body>
	<header>
		<div class="container">
			<!-- Logo + Menu -->
			<div class="nav row rounded-top align-items-strech justify-content-between">
				<!-- Logotipo -->
				<div class="col-md-12 col-lg logo d-flex align-items-center justify-content-center justify-content-lg-start">
					<h2>Sebastián Ríos</h2>
					<span class="icono icon-dot"></span>
					<p>Desarrollador Web</p>
				</div>

				<!-- Menu -->
				<nav class="col-md-12 col-lg-auto menu d-flex align-items-stretch flex-wrap flex-sm-nowrap">
					<a href="#" class="c-1 d-flex align-items-center">
						<div class="d-flex flex-column text-center">
							<span>Portafolio</span>
							<i class="icono icon-briefcase"></i>
						</div>
					</a>
					<a href="#" class="c-2 d-flex align-items-center">
						<div class="d-flex flex-column text-center">
							<span>Acerca de</span>
							<i class="icono icon-user"></i>
						</div>
					</a>
					<a href="#" class="c-3 d-flex align-items-center">
						<div class="d-flex flex-column text-center">
							<span>Contacto</span>
							<i class="icono icon-mail"></i>
						</div>
					</a>
				</nav>
			</div>

			<!-- Slider -->
			<div class="row slider">
				<div class="col">
					<div class="carousel slide" id="slider" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider" data-slide-to="0" class="active"></li>
							<li data-target="#slider" data-slide-to="1"></li>
							<li data-target="#slider" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="img/slide1.jpg" alt="Slide #1" class="d-block img-fluid">
							</div>
							<div class="carousel-item">
								<img src="img/slide2.jpg" alt="Slide #2" class="d-block img-fluid">
							</div>
							<div class="carousel-item">
								<img src="img/slide3.jpg" alt="Slide #3" class="d-block img-fluid">
							</div>
						</div>

						<a href="#slider" class="carousel-control-prev" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Anterior</span>
						</a>
						<a href="#slider" class="carousel-control-next" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Siguiente</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>

	<main>
		<div class="container">
			<!-- Seccion Portafolio -->
			<div class="row portafolio">
				<div class="col">
					<h2 class="titulo">Portafolio</h2>
					<div class="row galeria justify-content-center">
						<div class="contenedor-imagen col-6 col-lg-4">
							<a href="#" data-toggle="modal" data-target="#modal">
								<img src="img/img-1.jpg" class="img-fluid imagen" alt="">
							</a>
						</div>
						<div class="contenedor-imagen col-12 col-lg-8">
							<a href="#" data-toggle="modal" data-target="#modal">
								<img src="img/img-2.jpg" class="img-fluid imagen" alt="">
							</a>
						</div>
						<div class="contenedor-imagen col-12 col-lg-8">
							<a href="#" data-toggle="modal" data-target="#modal">
								<img src="img/img-3.jpg" class="img-fluid imagen" alt="">
							</a>
						</div>
						<div class="contenedor-imagen col-6 col-lg-4">
							<a href="#" data-toggle="modal" data-target="#modal">
								<img src="img/img-4.jpg" class="img-fluid imagen" alt="">
							</a>
						</div>
						<div class="contenedor-imagen col-6 col-lg-4">
							<a href="#" data-toggle="modal" data-target="#modal">
								<img src="img/img-5.jpg" class="img-fluid imagen" alt="">
							</a>
						</div>
						<div class="contenedor-imagen col-6 col-lg-4">
							<a href="#" data-toggle="modal" data-target="#modal">
								<img src="img/img-6.jpg" class="img-fluid imagen" alt="">
							</a>
						</div>
						<div class="contenedor-imagen col-6 col-lg-4">
							<a href="#" data-toggle="modal" data-target="#modal">
								<img src="img/img-7.jpg" class="img-fluid imagen" alt="">
							</a>
						</div>

						<!-- Ventana Modal -->
						<div class="modal fade" id="modal">
							<div class="modal-dialog d-flex justify-content-center align-items-center">
								<div class="modal-content">
									<img src="img/img-1.jpg" alt="" id="imagen-modal" class="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Seccion Acerca de -->
			<div class="row acerca-de align-items-center">
				<div class="col-12 col-lg-4 foto">
					<img src="img/imgDesarrollador.jpg" class="rounded-circle img-fluid" alt="">
					<p class="nombre">Sebastián Ríos</p>
				</div>
				<div class="col-12 col-lg-8 info">
					<h2 class="titulo">Acerca de</h2>
					<p class="resumen">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
					<p class="resumen">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>

					<p class="label">HTML</p>
					<div class="progress">
						<div class="progress-bar" style="width:80%;">80%</div>
					</div>

					<p class="label">CSS</p>
					<div class="progress">
						<div class="progress-bar" style="width:80%;">80%</div>
                    </div>
                    <p class="label">Bootstrap 4</p>
					<div class="progress">
						<div class="progress-bar" style="width:90%;">90%</div>
					</div>
					<p class="label">Javascript</p>
					<div class="progress">
						<div class="progress-bar" style="width:70%;">70%</div>
                    </div>
                    <p class="label">PHP</p>
					<div class="progress">
						<div class="progress-bar" style="width:60%;">60%</div>
                    </div>
                    <p class="label">c#</p>
					<div class="progress">
						<div class="progress-bar" style="width:90%;">90%</div>
                    </div>
				</div>
			</div>

			<!-- Seccion de Contacto -->
			<div class="row contacto justify-content-center">
				<div class="col-12 col-lg-8">
					<h2 class="titulo">Contacto</h2>
					<form action="" class="formulario">
						<div class="form-group row">
							<div class="col-12 col-md-6">
								<input type="text" name="" id="" placeholder="Nombre">
							</div>
							<div class="col-12 col-md-6">
								<input type="email" name="" id="" placeholder="Correo">
							</div>
						</div>
						<textarea name="" id="" placeholder="Mensaje"></textarea>
						<div class="form-group d-flex justify-content-center">
							<input type="submit" class="boton" value="Enviar">
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
	
	<footer>
		<div class="container">
			<div class="row redes-sociales justify-content-center">
				<div class="col-auto">
					<a href="#" class="icono icon-twitter twitter"></a>
					<a href="#" class="icono icon-instagram instagram"></a>
					<a href="#" class="icono icon-facebook facebook"></a>
				</div>
			</div>
		</div>
	</footer>
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="js/scripts.js"></script>
</body>
</html>
