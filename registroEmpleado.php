<?php session_start();
$mysqly;
// if(isset($_SESSION['usuario'])){
//     header('location: index.php');
// }

error_reporting(0);
// header('Content-type: application/json; charset=utf-8');

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$pass = $_POST['password'];


function validarDatos($nombre, $apellidos, $pass){
	if($nombre == '' || is_numeric($nombre)){
		return false;
	} elseif($apellidos=='' || is_numeric($apellidos)){
		return false;
	} elseif($pass == ''){
		return false;
	} 
	return true;
}

if(validarDatos($nombre, $apellidos, $pass)){
	include 'db_data.php';
	$conexion = new mysqli($db_dom, $db_user, $db_pass, $db_name);
	$conexion->set_charset('utf8');

	if($conexion->connect_errno){
		$respuesta = ['error' => true];
	} else {
		$statement = $conexion->prepare("INSERT INTO empleado(nombre, password, apellidos) VALUES(?,?,?)");
		$statement->bind_param("sss", $nombre,$pass,  $apellidos);
		$statement->execute();

		if($conexion->affected_rows <= 0){
			$respuesta = ['error' => true];
		}

		$respuesta = [];
	}
} else {
	$respuesta = ['error' => true];
}

// echo json_encode($respuesta);


require 'views/registro.view.php';
?>