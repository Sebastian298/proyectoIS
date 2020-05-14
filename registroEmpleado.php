<?php session_start();
$mysqly;
// if(isset($_SESSION['usuario'])){
//     header('location: index.php');
// }

error_reporting(0);
// header('Content-type: application/json; charset=utf-8');

$nombre =$_POST['nombre'];
$apellidos = $_POST['apellidos'];
$pass = filter_var($_POST['password'],FILTER_SANITIZE_STRING);




	include 'db_data.php';
	$conexion = new mysqli($db_dom, $db_user, $db_pass, $db_name);
	$conexion->set_charset('utf8');

	if($conexion->connect_errno){
		$respuesta = ['error' => true];
	} else {
		$pass=hash('sha512',$pass);
		$statement = $conexion->prepare("INSERT INTO empleado(nombre, password, apellidos) VALUES(?,?,?)");
		$statement->bind_param("sss", $nombre,$pass,  $apellidos);
		$statement->execute();

		if($conexion->affected_rows <= 0){
			$respuesta = ['error' => true];
		}

		$respuesta = [];
	}


// echo json_encode($respuesta);


require 'views/registro.view.php';
?>