<?php

 error_reporting(0);
 header('Content-type: application/json; charset=utf-8');

 include 'db_data.php';
 $conexion = new mysqli($db_dom, $db_user, $db_pass, $db_name);
 if($conexion->connect_errno){
	$respuesta = [
		'error' => true
	];
  } else {
	$conexion->set_charset("utf8");
	$statement = $conexion->prepare("SELECT concat(SUM(round((idProducto/Precio*100),2)),'%')AS Porcentaje FROM venta");
	$statement->execute();
	$resultados = $statement->get_result();
	
	$respuesta = [];
	
	while($fila = $resultados->fetch_assoc()){
		$usuario = [
			'Porcentaje' => $fila['Porcentaje'],
		];
		array_push($respuesta, $usuario);
	}
 }

 echo json_encode($respuesta);




?>