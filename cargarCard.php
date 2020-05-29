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
	$statement = $conexion->prepare("SELECT COUNT(*) AS Cuantos,Nombre_Producto,idProducto,Precio, SUM(Precio) AS Total_Ganancia, round((100.0 * ((SUM(Precio)) / (SUM(SUM(Precio)) OVER()))),2) AS Porcentaje_Ganancia FROM venta GROUP BY Nombre_Producto");
	$statement->execute();
	$resultados = $statement->get_result();
	
	$respuesta = [];
	
	while($fila = $resultados->fetch_assoc()){
		$usuario = [
			'Nombre_Producto'=> $fila['Nombre_Producto'],
			'idProducto' => $fila['idProducto'],
			'Precio' => $fila['Precio'],
			'Total_Ganancia'=> $fila['Total_Ganancia'],
			'Porcentaje_Ganancia'=> $fila['Porcentaje_Ganancia'],
		];
		array_push($respuesta, $usuario);
	}
}

echo json_encode($respuesta);

?>