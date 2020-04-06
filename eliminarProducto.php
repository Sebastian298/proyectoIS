<?php session_start();
$mysqly;
if(isset($_SESSION['usuario'])){
    header('location: index.php');  //Es por si el usuario inicia sesion e intenta entrar al formulario de registro no pueda acceder a ellos
}

error_reporting(0);
// header('Content-type: application/json; charset=utf-8');



$id=$_POST['id'];

	$conexion = new mysqli('localhost', 'root', '');
	$db = mysqli_select_db($conexion,'laredohits');
	$conexion->set_charset('utf8');

	if(!$conexion){
		$respuesta = ['error' => true];
	} else {
		if($db){
			$query = "DELETE from producto WHERE id='$id'";
			$ejec = mysqli_query($conexion,$query);
			if($ejec){
				$respuesta = [];
				echo 'Actualizado';	
			} else{
				echo 'Error';	
				$respuesta = ['error' =>true];
			}
	
		} else {
			$respuesta = ['error' =>true];
		}
	}

require 'views/registrarProducto.view.php';


?>