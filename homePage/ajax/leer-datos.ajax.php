<?php


error_reporting(0);
header('Content-type: application/json; charset=utf-8');

$conexion = new mysqli('localhost', 'root', '', 'pagina_asistencias');

if($conexion->connect_errno){
	$respuesta = [
		'error' => true
	];
} else {
	$conexion->set_charset("utf8");
	$statement = $conexion->prepare("SELECT * FROM tabla_usuarios");
	$statement->execute();
	$resultados = $statement->get_result();

	$respuesta = [];
	
	while($fila = $resultados->fetch_assoc()){
		$usuario = [
			'id' 		      => $fila['ID'],
			'nombre' 	 => $fila['nombre'],
			'edad'			=> $fila['edad'],
			'pais'		     => $fila['pais'],
			'correo'	   => $fila['correo']
		];
		array_push($respuesta, $usuario);
	}
}

echo json_encode($respuesta);