<?php

require_once "../controllers/visits.controller.php";
require_once "../models/visits.model.php";

class TablaVisitas{

 	/*=============================================
  	MOSTRAR LA TABLA DE VISITAS
  	=============================================*/ 

 	public function mostrarTabla(){

 		$visitas = ControladorVisitas::ctrMostrarVisitas();

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($visitas); $i++){

		/*=============================================
		DEVOLVER DATOS JSON
		=============================================*/

		$datosJson	 .= '[
			      "'.($i+1).'",
			      "'.$visitas[$i]["ip"].'",
			      "'.$visitas[$i]["pais"].'",
			      "'.$visitas[$i]["visitas"].'",
			      "'.$visitas[$i]["fecha"].'"    
			    ],';

		}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
		  
		}'; 

		echo $datosJson;

 	}


}

/*=============================================
ACTIVAR TABLA DE VISITAS
=============================================*/ 

$activar = new TablaVisitas();
$activar -> mostrarTabla();