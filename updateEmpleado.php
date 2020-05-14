<?php session_start();

$mysqly;
if(isset($_SESSION['usuario'])){
    header('location: index.php');  
}

error_reporting(0);

$id=$_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];

	include 'db_data.php';
	$conexion = new mysqli($db_dom, $db_user, $db_pass);
	$db = mysqli_select_db($conexion,$db_name);
	$conexion->set_charset('utf8');

	if(!$conexion){
		$respuesta = ['error' => true];
	} else {
		if($db){
			$query = "UPDATE empleado SET nombre='$nombre',apellidos='$apellidos' WHERE ID='$id'";
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

require 'views/registro.view.php';
?>