<?php

class ControladorUsuarios{

    /*==============================================
     MOSTRAR EL TOTAL DE USUARIOS 
    /*=============================================*/

    static public function ctrMostrarTotalUsuarios($item, $valor, $item2, $valor2, $orden){

        $tabla = "usuarios";

        $respuesta = ModeloUsuarios::mdlMostrarTotalUsuarios($tabla, $item, $valor, $item2, $valor2, $orden);

        return $respuesta;

    }

	/*==============================================
	 MOSTRAR USUARIOS 
	/*=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;

	}

    /*==============================================
	 ACTUALIZAR DATOS DEL USUARIO 
	/*=============================================*/

	public function ctrActualizarPerfil(){

		if(isset($_POST["editarNombre"])){

			/*------- VALIDAR IMAGEN --------*/

			$ruta = $_POST["fotoUsuario"];

			if(isset($_FILES["datosImagen"]["tmp_name"]) && !empty($_FILES["datosImagen"]["tmp_name"])){

				/*------- PRIMERO PREGUNTAMOS SI EXISTE UNA IMAGEN EN LA BASE DE DTOS --------*/

				$directorio = "assets/img/users/".$_POST["idUsuario"];

				if(!empty($_POST["fotoUsuario"])){

					unlink($_POST["fotoUsuario"]);
				
				}else{

					mkdir($directorio, 0755);

				}

				/*------- GUARDAMOS LA IMAGEN EN EL DIRECTORIO --------*/

				list($ancho, $alto) = getimagesize($_FILES["datosImagen"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				$aleatorio = mt_rand(100, 999);

				if($_FILES["datosImagen"]["type"] == "image/jpeg"){

					$ruta = "assets/img/users/".$_POST["idUsuario"]."/".$aleatorio.".jpg";

					/*------- MOFICAMOS TAMAÑO DE LA FOTO --------*/

					$origen = imagecreatefromjpeg($_FILES["datosImagen"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);

				}

				if($_FILES["datosImagen"]["type"] == "image/png"){

					$ruta = "assets/img/users/".$_POST["idUsuario"]."/".$aleatorio.".png";

					/*------- MOFICAMOS TAMAÑO DE LA FOTO --------*/

					$origen = imagecreatefrompng($_FILES["datosImagen"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
    			
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}

			}

			if($_POST["editarPassword"] == ""){

				$password = $_POST["passUsuario"];

			}else{

				$password = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			}

			/*==============================================
			 ACTUALIZAR LA TABLA DE USUARIOS 
			/*=============================================*/

			$datos = array("nombre" => $_POST["editarNombre"],
						   "email" => $_POST["editarEmail"],
						   "password" => $password,
						   "foto" => $ruta,
						   "id" => $_POST["idUsuario"]);

			$tabla = "usuarios";

			$respuesta = ModeloUsuarios::mdlActualizarPerfil($tabla, $datos);

			/*==============================================
			 ACTUALIZAR LA TABLA DE COMENTARIOS 
			/*=============================================*/

			$tabla2 = "comentarios";

			$respuesta2 = ModeloComentarios::mdlActualizarTablaComentarios($tabla2, $datos);

			/*==============================================
			 ACTUALIZAR LA TABLA DE RESPUESTAS_COMENTARIOS 
			/*=============================================*/

			$tabla3 = "respuestas_comentarios";

			$respuesta3 = ModeloComentarios::mdlActualizarTablaRespuestasComentarios($tabla3, $datos);

			/*==============================================
			 ACTUALIZAR LA TABLA DE CHAT GROUP 
			/*=============================================*/

			$tabla4 = "chat_group";

			$respuesta4 = ModeloChatGroup::mdlActualizarPerfil($tabla4, $datos);

			if($respuesta == "ok" && $respuesta2 == "ok" && $respuesta3 == "ok" && $respuesta4 == "ok"){

				$_SESSION["validarSesion"] = "ok";
				$_SESSION["id"] = $datos["id"];
				$_SESSION["nombre"] = $datos["nombre"];
				$_SESSION["foto"] = $datos["foto"];
				$_SESSION["email"] = $datos["email"];
				$_SESSION["password"] = $datos["password"];

				echo '<script> 
					swal({
						type: "success",
						title: "¡OK!",
						text: "¡Su cuenta ha sido actualizada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",		
						}).then((result) => {
						if (result.value) {
							window.location = "verPerfil";
						}
					})
				</script>';

			}

		}

	}

	/*=============================================*/
	/* ELIMINAR USUARIO */
	/*=============================================*/
	
	public function ctrEliminarUsuario(){

		if(isset($_GET["id"])){

			$tabla1 = "usuarios";			

			$id = $_GET["id"];

			if($_GET["foto"] != ""){

				unlink($_GET["foto"]);

			}

			$respuesta = ModeloUsuarios::mdlEliminarUsuario($tabla1, $id);

			if($respuesta == "ok"){

		    	$url = Ruta::ctrRutaLMS();

		    	echo'<script>

					swal({
						title: "¡LA CUENTA HA SIDO BORRADA!",
						text: "¡Debe registrarse nuevamente si desea ingresar!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
					},

					function(isConfirm){
						if (isConfirm) {	   
							window.location = "'.$url.'salir";
						} 
					});

				</script>';

		    }

		}

    }
    
}