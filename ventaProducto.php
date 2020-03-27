<?php session_start();
$mysqly;
if(isset($_SESSION['usuario'])){
    header('location: index.php');  
}

error_reporting(0);

$id=$_POST['id'];
$precio = $_POST['precio'];


	$conexion = new mysqli('localhost', 'root', '');
	$db = mysqli_select_db($conexion,'laredohits');
	$conexion->set_charset('utf8');

	if(!$conexion){
		$respuesta = ['error' => true];
	} else {
		if($db){
			$query = "INSERT INTO venta(idProducto,Precio) VALUES('$id','$precio')";
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

require 'views/contenido.view.php';
?>

?>