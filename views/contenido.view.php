<?php

include_once 'conexionContenido.php';

$sql = 'SELECT * FROM producto';

$sentencia = $pdo->prepare($sql);

$sentencia->execute();

$resultado = $sentencia->fetchAll();

$productosPagina = 3;

$totalProductos=$sentencia->rowCount();

$paginas=$totalProductos/$productosPagina;
// var_dump($resultado);
$paginas=ceil($paginas);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenido</title>
    <script src="https://kit.fontawesome.com/8b850b0e85.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/estilosBootstrap.css"> -->
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
          
          <a href="cerrar.php" class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" href="cerrar.php"></span>
                Cerrar Sesión</a>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="cerrar.php">Cerrar Sesión
                      <span class="sr-only">(current)</span>
                    </a>
              </li>
            </ul>
          </div>
        </div>
</nav>

<div class="container my-5">

<h1 class="text-center font-weight-bold text-primary">Registrar Venta</h1>

<?php
if(!$_GET){
  header('Location:contenido.php?pagina=1');
}

if($_GET['pagina']>$paginas||$_GET['pagina']<=0){

  header('Location:contenido.php?pagina=1');
}

$iniciar = ($_GET['pagina']-1)*$productosPagina;

$sqlProductos = 'SELECT * FROM producto LIMIT :iniciar,:narticulos';
$sentenciaProductos=$pdo->prepare($sqlProductos);
$sentenciaProductos->bindParam(':iniciar', $iniciar,PDO::PARAM_INT);
$sentenciaProductos->bindParam(':narticulos',$productosPagina,PDO::PARAM_INT);
$sentenciaProductos->execute();
$resultadoProductos=$sentenciaProductos->fetchAll();
?>
<br>
<br>
<div class="container" >
    <div class="row ">
        
      <div class=" row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 justify-content-center align-self-center">
      <?php foreach($resultadoProductos AS $producto):?>
       
           <div class="card col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="max-width:319px;">
                <img src="img/<?php echo $producto['imagen']?>"
                     class="card-img-top" alt="Card image"/>

                <div class="card-block">
                    <h4 class="card-title">Nombre: <?php echo $producto['nombre']?></h4>
                    <p class="card-text">ID: <?php echo $producto['id']?></p>
                    <p class="card-text">Descripción: <?php echo $producto['descripcion']?></p>
                    <p class="card-text">Precio: <?php echo $producto['precio']?></p>
                    <button class="btn btn-primary btn-lg active" onclick="registrarProducto('<?php echo ($producto['id'])?>','<?php  echo($producto['precio'])?>')">Registrar</button>
                </div>
            </div>
            <?php endforeach?>
          </div>
    </div>
    
</div>

<br>
<br>
</div>

<div class="container">
  <nav aria-label="...">
  <ul class="pagination pagination-lg  justify-content-center">
    <li class="page-item
    <?php echo $_GET['pagina'] <= 1? 'disabled' : '' ?>">
      <a class="page-link" 
      href="contenido.php?pagina=<?php echo $_GET['pagina']-1?>" 
      tabindex="-1">Anterior</a>
    </li>
    <?php for($i=0;$i<$paginas;$i++):?>
    <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active': '' ?>"><a class="page-link" 
    href="contenido.php?pagina=<?php echo $i+1?>">
      <?php echo $i+1?></a></li>
    <?php endfor ?>
    <li class="page-item
    
    <?php echo $_GET['pagina']>=$paginas?'disabled':''?>">
      <a class="page-link" href="contenido.php?pagina=<?php echo $_GET['pagina']+1?>">Siguiente</a>
    </li>
  </ul>
</nav>
</div>


<br>
<br>
<br>
<!-- Footer -->
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
        <p>
          <a class="dark-grey-text" href="#!">MDWordPress</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">BrandFlow</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Bootstrap Angular</a>
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
        <p>
          <a class="dark-grey-text" href="#!">Become an Affiliate</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Shipping Rates</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Help</a>
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
        <p>
          <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
        <p>
          <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

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
<!-- Footer -->

<script src="js/venta.js"></script>
</body>
</html>