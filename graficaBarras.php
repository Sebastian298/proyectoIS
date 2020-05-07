<?php session_start();

if(isset($_SESSION['usuario'])){
  require 'views/graficaBarras.view.php';
}else{
    header('Location: inicioSesion.php');
}

?>