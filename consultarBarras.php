<?php


realizar();


function realizar() {
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
	$statement = $conexion->prepare("SELECT * from venta 
  WHERE idProducto IN(SELECT idProducto FROM venta 
  WHERE idProducto IN(SELECT idProducto FROM venta GROUP BY idProducto HAVING COUNT(*) >=2)) AND DATE(fecha) = CURRENT_DATE() GROUP BY idProducto");
	$statement->execute();
	$resultados = $statement->get_result();
	
	$respuesta = [];
	
	while($fila = $resultados->fetch_assoc()){
		$usuario = [
			'Nombre' => $fila['Nombre_Producto'],
			'Precio' 	=> $fila['Precio'],
		];
		array_push($respuesta, $usuario);
	}
 }

 echo json_encode($respuesta);

}





?>