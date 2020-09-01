<?php

class ControladorComentarios{

    /*==============================================
     CREAR COMENTARIOS 
    /*=============================================*/

	public function ctrCrearComentarios(){

		if(isset($_POST["mensaje"])){
		
			$item = "email";
			$valor = $_SESSION["email"];
			
			$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);		

			if($respuesta["foto"] != ""){
				$foto = $respuesta["foto"];
			}else{
				$foto = "http://localhost/TeamOne/backend/vistas/img/default/anonymous.png";
			}
		
			$tabla2 = "comentarios";
		
			$datos = array("id_usuario"=>$respuesta["id"],
									"nombre"=>$respuesta["nombre"],
									"me_gustas"=>0,
									"comentarios"=>$_POST["mensaje"],
									"foto"=>$foto);
		
			$respuesta2 = ModeloComentarios::mdlPeticionComentarios($tabla2, $datos);		

			if($respuesta2 == "ok"){

				echo '<script> 
					swal({
						type: "success",
						title: "¡OK!",
						text: "¡Gracias por tu comentario!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",		
						}).then((result) => {
						if (result.value) {
							window.location = "gestorComentarios";
						}
					})
				</script>';

			}
		
		}
		
	}

	/*==============================================
	 MOSTRAR COMENTARIOS 
	/*=============================================*/

	public function ctrMostrarComentarios(){

		$tabla = "comentarios";

		$respuesta = ModeloComentarios::mdlMostrarComentarios($tabla);

		return $respuesta;

	}

	/*==============================================
	 RESPUESTA DE LOS COMENTARIO 
	/*=============================================*/

	public function ctrRespuestasComentarios(){

		if(isset($_POST["respuesta_comentario"])){

			/*==============================================
			 HACER LA CONSIDENCIA PARA TRAER AL USUARIO ESPECIFICO 
			/*=============================================*/
		
			$item = "email";
			$valor = $_SESSION["email"];
		
			$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);	

			if($respuesta["foto"] != ""){

				$foto = $respuesta["foto"];

			}else{

				$foto = "http://localhost/TeamOne/frontend/vistas/img/default/anonymous.png";

			}

			/*==============================================
			 TRAER ID_COMENTARIOS  
			/*=============================================*/

			$tabla2 = "comentarios";

			$item2 = "id";
			$valor2 = $_POST["oculto"];

			$respuesta2 = ModeloComentarios::mdlSeleccionarComentario($tabla2, $item2, $valor2);	

			/*==============================================
			 ACTULIZAR LAS RESPUESTAS EN LA TABLA DE COMENTARIOS 
			/*=============================================*/

			$incrementoRespuestas = $respuesta2["respuestas"];
			$respuestas = "respuestas";
			$valorNuevoRespuestas = round($incrementoRespuestas) + 1;
			$idComentario = "id";
			$valorComentario = $respuesta2["id"];

			$update = ModeloComentarios::mdlActualizarRespuestas($tabla2, $respuestas, $valorNuevoRespuestas, $idComentario, $valorComentario);

			/*==============================================
			  CREAR LAS RESPUESTAS DE LOS COMENTARIOS
			/*=============================================*/
			
			$datos = array("id_usuario"=>$respuesta["id"],
									"id_comentario"=>$respuesta2["id"],
									"nombre"=>$respuesta["nombre"],
									"comentario"=>$_POST["respuesta_comentario"],
									"foto"=>$foto);

			$tabla3 = "respuestas_comentarios";
		
			$respuesta3 = ModeloComentarios::mdlRespuestasComentarios($tabla3, $datos);		

			if($respuesta3 == "ok"){

				echo '<script> 
					swal({
						type: "success",
						title: "¡OK!",
						text: "¡Gracias por tu comentario!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",		
						}).then((result) => {
						if (result.value) {
							window.location = "gestorComentarios";
						}
					})
				</script>';

			}

		}

	}

	/*==============================================
	 MOSTRAR TODAS LAS RESPUESTAS DE LOS COMENTARIOS 
	/*=============================================*/

	static public function ctrMostrarRespuestasComentarios($item, $valor){

		$tabla = "respuestas_comentarios";

		$respuesta = ModeloComentarios::mdlMostrarRespuestasComentarios($tabla, $item, $valor);

		return $respuesta;

	}

}