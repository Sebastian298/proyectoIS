<?php session_start();

if(isset($_SESSION['usuario'])){
  require 'views/vistaGraficas.view.php';
}else{
    header('Location: inicioSesion.php');
}

?>