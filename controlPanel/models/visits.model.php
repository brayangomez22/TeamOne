<?php

require_once "connection.php";

class ModeloVisitas{

	/*=============================================
	MOSTRAR EL TOTAL DE Visitas
	=============================================*/	

	static public function mdlMostrarTotalVisitas($tabla){

		$stmt = Connection::connect()->prepare("SELECT SUM(cantidad) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR PAISES DE VISITAS
	=============================================*/
	
	static public function mdlMostrarPaises($tabla, $orden){
		
		$stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	
	}

	/*==============================================
	 MOSTRAR VISITAS 
	/*=============================================*/

	static public function mdlMostrarVisitas($tabla){

		$stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

}