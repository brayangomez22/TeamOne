<?php

require_once "../controllers/user.controller.php";
require_once "../models/user.model.php";

require_once "../models/route.php";

class TablaUsuarios{

 	/*=============================================
  	MOSTRAR LA TABLA DE USUARIOS
  	=============================================*/ 

	public function mostrarTabla(){	

		$item = null;
 		$valor = null;

        $usuarios = ControllerUser::ctrShowUsers($item, $valor);

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($usuarios); $i++){

	 		/*=============================================
			TRAER FOTO USUARIO
			=============================================*/

			$urlLMS = Route::ctrRouteLearningManagementSystem();

			if($usuarios[$i]["foto"] != "" ){

				$foto = "<img class='img-circle' src='".$urlLMS.$usuarios[$i]["foto"]."' width='60px'>";

			}else{

				$foto = "<img class='img-circle' src='".$urlLMS."assets/img/default/anonymous.jpg' width='60px'>";
            
            }

			/*=============================================
  			REVISAR ESTADO
  			=============================================*/

			if($usuarios[$i]["verificacion"] == 1){

				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado";
				$estadoUsuario = 0;

			}else{

				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoUsuario = 1;

			}

			$estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idUsuario='". $usuarios[$i]["id"]."' estadoUsuario='".$estadoUsuario."'>".$textoEstado."</button>";

	 		/*=============================================
			 DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				"'.($i+1).'",
				"'.$usuarios[$i]["id_institucion"].'",
				"'.$usuarios[$i]["nombre"].'",
				"'.$usuarios[$i]["labor"].'",
				"'.$usuarios[$i]["grupo"].'",
				"'.$usuarios[$i]["password"].'",
				"'.$usuarios[$i]["email"].'",
				"'.$foto.'",
				"'.$estado.'",
				"'.$usuarios[$i]["fecha"].'"    
			],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE VENTAS
=============================================*/ 

$activar = new TablaUsuarios();
$activar -> mostrarTabla();