<?php session_start();

if(isset($_SESSION['usuario'])){
  require 'views/consultarVentas.view.php';
}else{
    header('Location: inicioSesion.php');
}

?>