<?php

class ControllerAdministrator{

	/*=============================================
	INGRESO DE ADMINISTRADOR
	=============================================*/

	public function ctrEntryAdministrator(){

		if(isset($_POST["ingEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){
			   
				$encriptar = md5($_POST["ingPassword"]);
						
				$tabla = "administradores_cp";
				$item = "email";
				$valor = $_POST["ingEmail"];

				$reply = ModelAdministrator::mdlShowAdministrator($tabla, $item, $valor);

				if($reply["email"] == $_POST["ingEmail"] && $reply["password"] == $encriptar){

					if($reply["estado"] == 1){ 

						$_SESSION["validateSession"] = "ok";
						$_SESSION["id"] = $reply["id"];
						$_SESSION["nombre"] = $reply["nombre"];
						$_SESSION["foto"] = $reply["foto"];
						$_SESSION["email"] = $reply["email"];
						$_SESSION["password"] = $reply["password"];
						$_SESSION["perfil"] = $reply["perfil"];
					
						echo '<script>

							window.location = "home";

						</script>';

					}else{

						echo '<br>
						<div class="alert alert-warning">Este usuario aun no esta activado</div>';

					}

				}else{

					echo '<br>
					<div class="alert alert-danger">Error al ingresar vuelva a intentarlo</div>';

				}


			}

		}

	}

	/*==============================================
	 MOSTRAR ADMINISTRADORES 
	/*=============================================*/

	static public function ctrShowAdministrator($item, $valor){

		$tabla = "administradores_cp";

		$reply = ModelAdministrator::mdlShowAdministrator($tabla, $item, $valor);

		return $reply;

	}
	
	/*=============================================
	REGISTRO DE PERFIL
	=============================================*/

	static public function ctrCreateProfile(){

		if(isset($_POST["nuevoPerfil"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

			   	/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";

				if(isset($_FILES["newPhone"]["tmp_name"]) && !empty($_FILES["newPhone"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["newPhone"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["newPhone"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "assets/dist/img/profiles/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["newPhone"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["newPhone"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "assets/dist/img/profiles/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["newPhone"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "administradores_cp";

				$encriptar = md5($_POST["nuevoPassword"]);

				$data = array("nombre" => $_POST["nuevoNombre"],
							"email" => $_POST["nuevoEmail"],
							"password" => $encriptar,
							"perfil" => $_POST["nuevoPerfil"],			       
							"foto"=>$ruta,
							"estado" => 1);

				$reply = ModelAdministrator::mdlRegistryProfile($tabla, $data);
			
				if($reply == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El perfil ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "profiles";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El perfil no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "perfiles";

						}

					});
				

				</script>';

			}

		}

	}

	/*=============================================
	EDITAR PERFIL
	=============================================*/

	static public function ctrEditProfile(){

		if(isset($_POST["idProfile"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "assets/dist/img/profiles/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "assets/dist/img/profiles/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "administradores_cp";

				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

						$encriptar = md5($_POST["editarPassword"]);

					}else{

						echo'<script>

								swal({
									type: "error",
									title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"
									}).then(function(result) {
									if (result.value) {

										window.location = "Perfiles";

									}
								})

						</script>';

					}

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				$datos = array("id" => $_POST["idProfile"],
								"nombre" => $_POST["editarNombre"],
								"email" => $_POST["editarEmail"],
								"password" => $encriptar,
								"perfil" => $_POST["editarPerfil"],
								"foto" => $ruta);

				$reply = ModelAdministrator::mdlEditProfile($tabla, $datos);

				if($reply == "ok"){

					echo'<script>

						swal({
							type: "success",
							title: "El perfil ha sido editado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result) {
							if (result.value) {

								window.location = "profiles";

							}
						})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						type: "error",
						title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result) {
						if (result.value) {

							window.location = "perfiles";

						}
					})

			  	</script>';

			}

		}

	}

	/*=============================================
	ELIMINAR PERFIL
	=============================================*/

	static public function ctrDeleteProfile(){

		if(isset($_GET["idProfile"])){

			$tabla ="administradores_cp";
			$datos = $_GET["idProfile"];

			if($_GET["photoProfile"] != ""){

				unlink($_GET["photoProfile"]);
			
			}

			$reply = ModelAdministrator::mdlDeleteProfile($tabla, $datos);

			if($reply == "ok"){

				echo'<script>

					swal({
						type: "success",
						title: "El perfil ha sido borrado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then(function(result) {
						if (result.value) {

							window.location = "profiles";

						}
					})

				</script>';

			}		

		}

	}

}