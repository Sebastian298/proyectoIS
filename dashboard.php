<?php session_start();

if(isset($_SESSION['usuario'])){
  require 'views/dashboard.view.php';
}else{
    header('Location: inicioSesion.php');
}

?>