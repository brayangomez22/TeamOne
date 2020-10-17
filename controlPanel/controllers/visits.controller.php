<?php

class ControladorVisitas{

	/*=============================================
	MOSTRAR TOTAL VISITAS
	=============================================*/

	public function ctrMostrarTotalVisitas(){

		$tabla = "visitaspaises";

		$respuesta = ModeloVisitas::mdlMostrarTotalVisitas($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR PAISES DE VISITAS
	=============================================*/
	
	static public function ctrMostrarPaises($orden){

		$tabla = "visitaspaises";
	
		$respuesta = ModeloVisitas::mdlMostrarPaises($tabla, $orden);
		
		return $respuesta;
	}

	/*==============================================
	 MOSTRAR VISITAS 
	/*=============================================*/

	public function ctrMostrarVisitas(){

		$tabla = "visitaspersonas";
	
		$respuesta = ModeloVisitas::mdlMostrarVisitas($tabla);
		
		return $respuesta;

	}

}