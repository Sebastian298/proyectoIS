<?php session_start();

if(isset($_SESSION['usuario'])){
  require 'views/portafolio.view.php';
}else{
    header('Location: inicioSesion.php');
}

?>