<?php session_start();
$mysqly;
if(isset($_SESSION['usuario'])){
    header('location: index.php');  
}

error_reporting(0);

$id = $_POST['id'];
$nombreProducto=$_POST['nombreProducto'];
$precio = $_POST['precio'];
$fecha=getdate();



    include 'db_data.php';
	$conexion = new mysqli($db_dom, $db_user, $db_pass);
	$db = mysqli_select_db($conexion,$db_name);
	$conexion->set_charset('utf8');

	if(!$conexion){
		$respuesta = ['error' => true];
	} else {
		if($db){
			$query = "INSERT INTO venta(idProducto,Nombre_Producto,Precio) VALUES('$id','$nombreProducto','$precio')";
			$ejec = mysqli_query($conexion,$query);
			if($ejec){
				$respuesta = [];
				echo 'Insertado';
				echo('<h1>'.$fecha."</h1>");
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