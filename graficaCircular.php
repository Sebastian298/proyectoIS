<?php session_start();

if(isset($_SESSION['usuario'])){
  require 'views/graficaCircular.view.php';
}else{
    header('Location: inicioSesion.php');
}

?>