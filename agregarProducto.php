<?php session_start();
$mysqly;
if(isset($_SESSION['usuario'])){
    header('location: index.php');  
}

error_reporting(0);

$nombre=filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
$descripcion=filter_var($_POST['descripcion'],FILTER_SANITIZE_STRING);
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];

	include 'db_data.php';
	$conexion = new mysqli($db_dom, $db_user, $db_pass);
	$db = mysqli_select_db($conexion,$db_name);
	$conexion->set_charset('utf8');

	if(!$conexion){
		$respuesta = ['error' => true];
	} else {
		if($db){
			$query = "INSERT INTO producto(nombre,descripcion,precio,imagen) VALUES('$nombre','$descripcion','$precio','$imagen')";
			$ejec = mysqli_query($conexion,$query);
			if($ejec){
				$respuesta = [];
				echo 'Insertado';
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