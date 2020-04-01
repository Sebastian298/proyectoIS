<?php session_start();

if(isset($_SESSION['usuario'])){
  require 'views/registrarProducto.view.php';
}else{
    header('Location: inicioSesion.php');
}

?>