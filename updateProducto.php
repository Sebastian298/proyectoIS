<?php session_start();

$mysqly;
if(isset($_SESSION['usuario'])){
    header('location: index.php');  
}

error_reporting(0);

$id=$_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];

	$conexion = new mysqli('localhost', 'root', '');
	$db = mysqli_select_db($conexion,'laredohits');
	$conexion->set_charset('utf8');

	if(!$conexion){
		$respuesta = ['error' => true];
	} else {
		if($db){
			$query = "UPDATE producto SET nombre='$nombre',descripcion='$descripcion',precio='$precio',imagen='$imagen' WHERE id='$id'";
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