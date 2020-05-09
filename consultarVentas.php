<?php session_start();

if(isset($_SESSION['usuario'])){
  include('views/ConsultarVentas.view.php');
}else{
    header('Location: inicioSesion.php');
}

?>