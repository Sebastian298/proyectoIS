<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graficas Estadísticas</title>
    <script src="https://kit.fontawesome.com/8b850b0e85.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/index.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
        <h1><i class="fas fa-user-tie text-center font-weight-bold text-info"><br><a class="nav-link font-weight-bold text-info" href="dashboard.php">Administrador</h1></a></i>
          <a href="cerrar.php" class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" href="cerrar.php"></span>
                Cerrar Sesión</a>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <h1><a class="nav-link font-weight-bold text-danger" href="cerrar.php">Cerrar Sesión
                      <span class="sr-only">(current)</span>
                    </a></h1>
              </li>
            </ul>
          </div>
        </div>
  </nav>
  <br>
  <br>
  <h1 class="text-center font-weight-bold text-info">Vista Estadística de las ventas</h1>
  
  <div class="container my-5" style="background: black; width: 940px; padding: 25px;">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                 <div class="card text-white bg-dark text-center" style="width: 18rem;">
                     <img src="img/graficaLineas.png" style="height: 150px;" class="card-img-top" alt="Gráfica">
                       <div class="card-body">
                         <h5 class="card-title text-warning">Ventas de Hoy y Ayer</h5><br>
                          <p class="card-text" style="font-size: 20px;">Se visualizara por medio de una gráfica de puntos las ventas que se realizaron, mostrando el Id del producto vendido y su precio</p>
                         <a href="graficaLineas.php" class="btn btn-info align-self-center">Entrar</a>
                        </div>
                    </div>
            </div>
            <div class="col-md-4 col-sm-4">
                 <div class="card text-white bg-dark text-center" style="width: 18rem;">
                     <img src="img/graficaBarras.webp" style="height: 150px;" class="card-img-top" alt="Gráfica">
                       <div class="card-body">
                         <h5 class="card-title text-warning">Productos con más ventas</h5><br>
                          <p class="card-text" style="font-size: 20px;">Se van a poder visualizar por medio de una gráfica de barras la cantidad de ventas de cada producto basado en la jornada laboral actual</p>
                         <a href="graficaBarras.php" class="btn btn-info align-self-center">Entrar</a>
                        </div>
                    </div>
            </div>
            <div class="col-md-4 col-sm-4">
                 <div class="card text-white bg-dark text-center" style="width: 18rem;">
                     <img src="img/graficaPastel.png" style="height: 150px;" class="card-img-top" alt="Gráfica">
                       <div class="card-body">
                         <h5 class="card-title text-warning">Ganancias totales por producto</h5>
                          <p class="card-text" style="font-size: 20px;">Se van a poder visualizar por medio de una gráfica circular las ganancias totales de los productos actuales, basado en las ventas del mes</p>
                         <a href="graficaCircular.php" class="btn btn-info align-self-center">Entrar</a>
                        </div>
                    </div>
            </div>
       </div>
    </div>
  
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer class="page-footer font-small blue-grey lighten-5">

 <div style="background-color: #21d192;">
  <div class="container">

    <!-- Grid row-->
    <div class="row py-4 d-flex align-items-center">

      <!-- Grid column -->
      <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
        <h6 class="mb-0">Get connected with us on social networks!</h6>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-6 col-lg-7 text-center text-md-right">

        <!-- Facebook -->
        <a class="fb-ic">
          <i class="fab fa-facebook-f white-text mr-4"> </i>
        </a>
        <!-- Twitter -->
        <a class="tw-ic">
          <i class="fab fa-twitter white-text mr-4"> </i>
        </a>
        <!-- Google +-->
        <a class="gplus-ic">
          <i class="fab fa-google-plus-g white-text mr-4"> </i>
        </a>
        <!--Linkedin -->
        <a class="li-ic">
          <i class="fab fa-linkedin-in white-text mr-4"> </i>
        </a>
        <!--Instagram-->
        <a class="ins-ic">
          <i class="fab fa-instagram white-text"> </i>
        </a>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->

  </div>
 </div>

 
 <div class="container text-center text-md-left mt-5">

  <!-- Grid row -->
  <div class="row mt-3 dark-grey-text">

    <!-- Grid column -->
    <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

      <!-- Content -->
      <h6 class="text-uppercase font-weight-bold">Company name</h6>
      <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
      <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
        consectetur
        adipisicing elit.</p>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

      <!-- Links -->
      <h6 class="text-uppercase font-weight-bold">Products</h6>
      <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
      <p>
        <a class="dark-grey-text" href="#!">MDBootstrap</a>
      </p>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

      <!-- Links -->
      <h6 class="text-uppercase font-weight-bold">Useful links</h6>
      <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
      <p>
        <a class="dark-grey-text" href="#!">Your Account</a>
      </p>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

      <!-- Links -->
      <h6 class="text-uppercase font-weight-bold">Contact</h6>
      <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
      <p>
        <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
      <p>
        <i class="fas fa-envelope mr-3"></i> info@example.com</p>
    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

 </div>
 

 
 <div class="footer-copyright text-center text-black-50 py-3">© 2020 Copyright:
  <a class="dark-grey-text" href="https://mdbootstrap.com/"> MDBootstrap.com</a>
 </div>


 </footer>
 

     
 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>