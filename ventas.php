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
	$statement = $conexion->prepare("SELECT * FROM venta WHERE DATE(fecha) = CURRENT_DATE()");
	$statement->execute();
	$resultados = $statement->get_result();
	
	$respuesta = [];
	
	while($fila = $resultados->fetch_assoc()){
		$usuario = [
			'IdProducto' => $fila['idProducto'],
			'Precio' 	=> $fila['Precio'],
			'fecha' => fecha($fila['fecha']),
		];
		array_push($respuesta, $usuario);
	}
 }

 echo json_encode($respuesta);

}



function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

	$dia = date('d', $timestamp);

	// -1 porque los meses en la funcion date empiezan desde el 1
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = $dia . ' de ' . $meses[$mes] . ' del ' . $year;
	return $fecha;
}

?>


