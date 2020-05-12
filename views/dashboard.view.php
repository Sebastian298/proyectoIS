<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <script src="https://kit.fontawesome.com/8b850b0e85.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/index.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
        <h1><i class="fas fa-user-tie text-center font-weight-bold text-info"><br>Administrador</h1></i>
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

<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper" style="width: 150px; height: 150px;">
<div class="list-group list-group-flush">
    <a href="contenido.php" class="list-group-item list-group-item-action bg-light text-center font-weight-bold text-primary"><h4><i class="fas fa-cash-register"></i><br>Registrar Venta</h4></a>
    <a href="registroEmpleado.php" class="list-group-item list-group-item-action bg-light text-center font-weight-bold text-success"><h4><i class="fas fa-user-edit"></i><br>Registrar Empleado</h4></a>
    <a href="registrarProducto.php" class="list-group-item list-group-item-action bg-light text-center font-weight-bold text-danger"><h4><i class="fas fa-tv"></i><br>Registrar Producto</h4></a>
    <a href="ConsultarVentas.php" class="list-group-item list-group-item-action bg-light text-center font-weight-bold text-info"><h4><i class="fas fa-file-invoice-dollar"></i><br>Consultar Ventas</h4></a>
    <a href="graficas.php" class="list-group-item list-group-item-action bg-light text-center font-weight-bold text-danger"><h4><i class="fas fa-chart-line"></i><br>Estadísticas de Ventas</h4></a>
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div> -->
        </li>
      </ul>
    </div>
  <br>
  <br>
  <div class="container" id="padre">
    <div class="row ">
      <div class="col-sm-6 col-md-4">
        <div class="card text-warning bg-info mb-3" style="max-width: 300px" id="ventasDia">
           <div class="card-header text-center text-warning font-weight-bold"><h3>Ventas del día</h3></div>
           <div class="card-body"><h1><i class="fas fa-hand-holding-usd"></i></h1>
             <h5 id="cantidad" class="card-tittle text-warning"></h5>
             <p class="card-text"></p>
           </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="card text-warning bg-primary mb-3" style="max-width: 320px" id="totalVentas">
           <div class="card-header text-warning text-center font-weight-bold"><h3>Ganancias del día</h3></div>
           <div class="card-body"><h1><i class="fas fa-coins"></i></h1>
             <h5  id="ganancias" class="card-tittle text-warning"></h5>
             <p class="card-text"></p>
           </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="card text-warning bg-danger mb-3" style="max-width: 320px" id="existencia">
           <div class="card-header text-center text-warning font-weight-bold"><h4>Productos Disponibles</h4></div>
           <div class="card-body"><h1><i class="fas fa-laptop-house"></i></h1> <h5 class="card-tittle text-warning"></h5>
             <p class="card-text"></p>
           </div>
        </div>
      </div>
    </div>
    <div class="w-100"></div>
    <div class="row">
      <div class="col-sm-6 col-md-4 align-self-center">
      <div class="card text-warning bg-primary mb-3" style="max-width: 320px">
           <div class="card-header text-center text-warning font-weight-bold"><h3>Administradores</h3></div>
           <div class="card-body"><h1><i class="fas fa-user-tie"></i>    2</h1>
             <h5 class="card-tittle text-warning"></h5>
             <p class="card-text"></p>
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
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
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

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3 dark-grey-text">

      <!-- Grid column -->
      <div class="col-md-12 col-lg-4 col-xl-3 col-sm-12">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Company name</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
          consectetur
          adipisicing elit.</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-12 col-lg-2 col-xl-3 col-sm-12">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Products</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="#!">MDBootstrap</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-12 col-lg-2 col-xl-3 col-sm-12">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="#!">Your Account</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-12 col-lg-2 col-xl-3 col-sm-12">

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
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center text-black-50 py-3">© 2020 Copyright:
    <a class="dark-grey-text" href="https://mdbootstrap.com/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>

<script src="js/ventasAdm.js"></script>
</body>
</html>