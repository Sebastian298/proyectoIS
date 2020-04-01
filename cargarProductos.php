<?php

error_reporting(0);
header('Content-type: application/json; charset=utf-8');

$conexion = new mysqli('localhost', 'root', '', 'laredohits');

if($conexion->connect_errno){
	$respuesta = [
		'error' => true
	];
} else {
	$conexion->set_charset("utf8");
	$statement = $conexion->prepare("SELECT * FROM producto");
	$statement->execute();
	$resultados = $statement->get_result();
	
	$respuesta = [];
	
	while($fila = $resultados->fetch_assoc()){
		$usuario = [
			'ID' 		=> $fila['id'],
			'nombre' 	=> $fila['nombre'],
			'descripcion' => $fila['descripcion'],
			'precio'		=> $fila['precio'],
			'imagen'		=> $fila['imagen'],
		];
		array_push($respuesta, $usuario);
	}
}

echo json_encode($respuesta);

?>