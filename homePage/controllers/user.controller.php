<?php

class ControllerUser{

    /*=============================================
	REGISTRO DE USUARIO
    =============================================*/
    
    public function ctrRegistryUser(){

        if(isset($_POST["regUser"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regUser"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])){

				$encrypt = crypt($_POST["regPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$encryptEmail = md5($_POST["regEmail"]);
	
				$data = array("id_institucion"=>0,
								"nombre"=>$_POST["regUser"],
								"labor"=>"",
								"grupo"=>"",
								"password"=> $encrypt,
								"email"=> $_POST["regEmail"],
								"foto"=>"",
								"modo"=> "directo",
								"verificacion"=> 1,
								"emailEncriptado"=>$encryptEmail,
								"session_actual"=>0,
								"en_linea"=>0);

				$table = "usuarios";

				$reply = ModeloUsuarios::mdlRegistroUsuario($table, $data);
	
					if($reply == "ok"){
	
						/*=============================================
						VERIFICACIÓN CORREO ELECTRÓNICO
						=============================================*/
	
						date_default_timezone_set("America/Bogota");
	
						$url = Ruta::ctrRuta();	
	
						$mail = new PHPMailer;
	
						$mail->CharSet = 'UTF-8';
	
						$mail->isMail();
	
						$mail->setFrom('TeamOne.com', 'La realidad deja mucho a tu imaginacion');
	
						$mail->addReplyTo('TeamOne.com', 'La realidad deja mucho a tu imaginacion');
	
						$mail->Subject = "Por favor verifique su dirección de correo electrónico";
	
						$mail->addAddress($_POST["regEmail"]);
	
						$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
							
							<center>
								
								<img style="padding:20px; width:10%" src="http://tutorialesatualcance.com/tienda/logo.png">
	
							</center>
	
							<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
							
								<center>
								
								<img style="padding:20px; width:15%" src="http://tutorialesatualcance.com/tienda/icon-email.png">
	
								<h3 style="font-weight:100; color:#999">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>
	
								<hr style="border:1px solid #ccc; width:80%">
	
								<h4 style="font-weight:100; color:#999; padding:0 20px">Para comenzar a usar su cuenta de TeamOne, debe confirmar su dirección de correo electrónico</h4>
	
								<a href="'.$url.'verify/'.$encryptEmail.'" target="_blank" style="text-decoration:none">
	
								<div style="line-height:60px; background:#0aa; width:60%; color:white">Verifique su dirección de correo electrónico</div>
	
								</a>
	
								<br>
	
								<hr style="border:1px solid #ccc; width:80%">
	
								<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>
	
								</center>
	
							</div>
	
						</div>');
	
						$envio = $mail->Send();
	
						if(!$envio){
	
							echo '<script> 
	
								swal({
									  title: "¡ERROR!",
									  text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a '.$_POST["regEmail"].$mail->ErrorInfo.'!",
									  type:"error",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},
	
									function(isConfirm){
	
										if(isConfirm){
											history.back();
										}
								});
	
							</script>';
	
						}else{
	
							echo '<script> 
	
								swal({
									  title: "¡OK!",
									  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["regEmail"].' para verificar la cuenta!",
									  type:"success",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},
	
									function(isConfirm){
	
										if(isConfirm){
											history.back();
										}
								});
	
							</script>';
	
						}
	
					}

				
                
            }else{

				echo '<script> 

                    swal({
                            title: "¡ERROR!",
                            text: "¡Error al registrar el usuario, no se permiten caracteres especiales!",
                            type:"error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },

                    function(isConfirm){

                        if(isConfirm){
                            history.back();

                        }

                    });

                </script>';
                
            }

        }

	}
	
	/*==============================================
	 MOSTRAR USUARIOS 
	/*=============================================*/

	static public function ctrMostrarUsuario($item, $valor){

		$table = "usuarios";

		$reply = ModeloUsuarios::mdlMostrarUsuario($table, $item, $valor);

		return $reply;

	}

	/*==============================================
	  ACTULIZAR USUARIO 
	/*=============================================*/

	static public function ctrActualizarUsuario($id, $item, $valor){

		$table = "usuarios";

		$reply = ModeloUsuarios::mdlActualizarUsuario($table, $id, $item, $valor);

		return $reply;

	}

	/*==============================================
	 INGRESO DE USUARIOS 
	/*=============================================*/

	public function ctrIngresoUsuario(){

		if(isset($_POST["ingEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

				$encrypt = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$table = "usuarios";
				$item = "email";
				$valor = $_POST["ingEmail"];

				$reply = ModeloUsuarios::mdlMostrarUsuario($table, $item, $valor);

				if($reply["email"] == $_POST["ingEmail"] && $reply["password"] == $encrypt){

					if($reply["verificacion"] == 1){

						echo'<script>

							swal({
								  title: "¡NO HA VERIFICADO SU CORREO ELECTRÓNICO!",
								  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo para verififcar la dirección de correo electrónico '.$reply["email"].'!",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    history.back();
									  } 
							});

							</script>';

					}else{

						$_SESSION["validarSesion"] = "ok";
						$_SESSION["id"] = $reply["id"];
						$_SESSION["nombre"] = $reply["nombre"];
						$_SESSION["labor"] = $reply["labor"];
						$_SESSION["grupo"] = $reply["grupo"];
						$_SESSION["foto"] = $reply["foto"];
						$_SESSION["email"] = $reply["email"];
						$_SESSION["password"] = $reply["password"];
						$_SESSION["modo"] = $reply["modo"];

						echo '<script>
							
							window.location = localStorage.getItem("rutaActual");

						</script>';

					}

				}else{

					echo'<script>

							swal({
								  title: "¡ERROR AL INGRESAR!",
								  text: "¡Por favor revise que el email exista o la contraseña coincida con la registrada!",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = localStorage.getItem("rutaActual");
									  } 
							});

							</script>';

				}

			}else{

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡Error al ingresar al sistema, no se permiten caracteres especiales!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

			}

		}

	}

	/*==============================================
	 OLVIDO DE CONTRASEÑA DEL USUARIO 
	/*=============================================*/

	public function ctrOlvidoPassword(){

		if(isset($_POST["passEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["passEmail"])){

				/*=============================================
				GENERAR CONTRASEÑA ALEATORIA
				=============================================*/

				function generarPassword($longitud){

					$key = "";
					$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";

					$max = strlen($pattern)-1;	

					for($i = 0; $i < $longitud; $i++){

						$key .= $pattern{mt_rand(0,$max)};

					}

					return $key;

				}

				$nuevaPassword = generarPassword(11);

				$encrypt = crypt($nuevaPassword, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$table = "usuarios";
				
				$item1 = "email";
				$valor1 = $_POST["passEmail"];

				$reply1 = ModeloUsuarios::mdlMostrarUsuario($table, $item1, $valor1);

				if($reply1){

					$id = $reply1["id"];
					$item2 = "password";
					$valor2 = $encrypt;

					$reply2 = ModeloUsuarios::mdlActualizarUsuario($table, $id, $item2, $valor2);

					if($reply2  == "ok"){

						/*=============================================
						CAMBIO DE CONTRASEÑA
						=============================================*/

						date_default_timezone_set("America/Bogota");

						$url = Ruta::ctrRuta();	

						$mail = new PHPMailer;

						$mail->CharSet = 'UTF-8';

						$mail->isMail();

						$mail->setFrom('TeamOne.com', 'La realidad deja mucho a tu imaginacion');

						$mail->addReplyTo('TeamOne.com', 'La realidad deja mucho a tu imaginacion');

						$mail->Subject = "Solicitud de nueva contraseña";

						$mail->addAddress($_POST["passEmail"]);

						$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
	
								<center>
									
									<img style="padding:20px; width:10%" src="http://tutorialesatualcance.com/tienda/logo.png">

								</center>

								<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
								
									<center>
									
									<img style="padding:20px; width:15%" src="http://tutorialesatualcance.com/tienda/icon-pass.png">

									<h3 style="font-weight:100; color:#999">SOLICITUD DE NUEVA CONTRASEÑA</h3>

									<hr style="border:1px solid #ccc; width:80%">

									<h4 style="font-weight:100; color:#999; padding:0 20px"><strong>Su nueva contraseña: </strong>'.$nuevaPassword.'</h4>

									<a href="'.$url.'" target="_blank" style="text-decoration:none">

									<div style="line-height:60px; background:#0aa; width:60%; color:white">Ingrese nuevamente al sitio</div>

									</a>

									<br>

									<hr style="border:1px solid #ccc; width:80%">

									<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

									</center>

								</div>

							</div>');

						$envio = $mail->Send();

						if(!$envio){

							echo '<script> 

								swal({
									  title: "¡ERROR!",
									  text: "¡Ha ocurrido un problema enviando cambio de contraseña a '.$_POST["passEmail"].$mail->ErrorInfo.'!",
									  type:"error",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											history.back();
										}
								});

							</script>';

						}else{

							echo '<script> 

								swal({
									  title: "¡OK!",
									  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["passEmail"].' para su cambio de contraseña!",
									  type:"success",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											history.back();
										}
								});

							</script>';

						}

					}

				}else{

					echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡El correo electrónico no existe en el sistema!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

					</script>';


				}

			}else{

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡Error al enviar el correo electrónico, está mal escrito!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

			}

		}

	}

	/*=============================================
	REGISTRO CON REDES SOCIALES
	=============================================*/

	static public function ctrRegistroRedesSociales($data){

		$table = "usuarios";
		$item = "email";
		$valor = $data["email"];
		$emailRepetido = false;

		$reply0 = ModeloUsuarios::mdlMostrarUsuario($table, $item, $valor);

		if($reply0){

			if($reply0["modo"] != $data["modo"]){

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡El correo electrónico '.$data["email"].', ya está registrado en el sistema con un método diferente a Google!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

				$emailRepetido = false;

			}

			$emailRepetido = true;

		}else{

			$reply1 = ModeloUsuarios::mdlRegistroUsuario($table, $data);

		}

		if($emailRepetido || $reply1 == "ok"){

			$reply2 = ModeloUsuarios::mdlMostrarUsuario($table, $item, $valor);

			if($reply2["modo"] == "facebook"){

				session_start();

				$_SESSION["validarSesion"] = "ok";
				$_SESSION["id"] = $reply2["id"];
				$_SESSION["nombre"] = $reply2["nombre"];
				$_SESSION["labor"] = $reply2["labor"];
				$_SESSION["grupo"] = $reply2["grupo"];
				$_SESSION["foto"] = $reply2["foto"];
				$_SESSION["email"] = $reply2["email"];
				$_SESSION["password"] = $reply2["password"];
				$_SESSION["modo"] = $reply2["modo"];

				echo "ok";

			}else if($reply2["modo"] == "google"){

				$_SESSION["validarSesion"] = "ok";
				$_SESSION["id"] = $reply2["id"];
				$_SESSION["nombre"] = $reply2["nombre"];
				$_SESSION["labor"] = $reply2["labor"];
				$_SESSION["grupo"] = $reply2["grupo"];
				$_SESSION["foto"] = $reply2["foto"];
				$_SESSION["email"] = $reply2["email"];
				$_SESSION["password"] = $reply2["password"];
				$_SESSION["modo"] = $reply2["modo"];

				echo "<span style='color:white'>ok</span>";

			}

			else{

				echo "";
				
			}

		}

	}

	/*==============================================
	 ACTUALIZAR CAMPO DE LABOR PARA EL MODO FACEBOOK Y GOOGLE 
	/*=============================================*/

	static public function ctrActualizarLabor($item1, $valor1){

		if(isset($_POST["laborRedes"])){

			$reply = ControladorCodigo::ctrMostrarCodigo();

			$codigo = $reply["codigo"];

			if($codigo != $_POST["codigoRedes"] && $_POST["laborRedes"] == "profesor"){

				echo '<script> 

					swal({
						title: "¡ERROR!",
						text: "¡Error codigo de seguridad invalido!",
						type:"error",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){

							if(isConfirm){
								history.back();
							}

					});

				</script>';

			}else{

				$table = "usuarios";
				$item2 = "labor";
				$valor2 = $_POST["laborRedes"];
				$item3 = "grupo";

				if($_POST["laborRedes"] == "profesor"){
					$valor3 = "null";	
				}else{
					$valor3 = $_POST["grupoRedes"];	
				}

				$reply = ModeloUsuarios::mdlActualizarLabor($table, $item1, $valor1, $item2, $valor2,  $item3, $valor3);

				if($reply == "ok"){

					echo '<script> 

						swal({
								title: "¡OK!",
								text: "¡Gracias, ahora puedes entrar tranquilamente a tu perfil!",
								type:"success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

					</script>';

				}

			}

		}

	}
	
	/*=============================================
	FORMULARIO CONTACTENOS
	=============================================*/

	public function ctrFormularioContactenos(){

		if(isset($_POST['mensajeContactenos'])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreContactenos"]) &&
			preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["mensajeContactenos"]) &&
			preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailContactenos"])){

				/*=============================================
				ENVÍO CORREO ELECTRÓNICO
				=============================================*/

					date_default_timezone_set("America/Bogota");

					$url = Ruta::ctrRuta();	

					$mail = new PHPMailer;

					$mail->CharSet = 'UTF-8';

					$mail->isMail();

					$mail->setFrom('teamOne@gmail.com', 'El amor inmaduro dice: "te amo porque te necesito". ');

					$mail->addReplyTo('teamOne@gmail.com', 'El amor inmaduro dice: "te amo porque te necesito". ');

					$mail->Subject = "Ha recibido una consulta";

					$mail->addAddress("contacto@teamOne.com");

					$mail->msgHTML('

						<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

						<center><img style="padding:20px; width:10%" src="http://www.tutorialesatualcance.com/tienda/logo.png"></center>

						<div style="position:relative; margin:auto; width:600px; background:white; padding-bottom:20px">

							<center>

							<img style="padding-top:20px; width:15%" src="http://www.tutorialesatualcance.com/tienda/icon-email.png">

							<h3 style="font-weight:100; color:#999;">HA RECIBIDO UNA CONSULTA</h3>

							<hr style="width:80%; border:1px solid #ccc">

							<h4 style="font-weight:100; color:#999; padding:0px 20px; text-transform:uppercase">'.$_POST["nombreContactenos"].'</h4>

							<h4 style="font-weight:100; color:#999; padding:0px 20px;">De: '.$_POST["emailContactenos"].'</h4>

							<h4 style="font-weight:100; color:#999; padding:0px 20px">'.$_POST["mensajeContactenos"].'</h4>

							<hr style="width:80%; border:1px solid #ccc">

							</center>

						</div>

					</div>');

					$envio = $mail->Send();

					if(!$envio){

						echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡Ha ocurrido un problema enviando el mensaje!",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';

					}else{

						echo '<script> 

							swal({
							  title: "¡OK!",
							  text: "¡Su mensaje ha sido enviado, muy pronto le responderemos!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	  
											history.back();
										}
							});

						</script>';

					}

			}else{

				echo'<script>

					swal({
						  title: "¡ERROR!",
						  text: "¡Problemas al enviar el mensaje, revise que no tenga caracteres especiales!",
						  type: "error",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							   	window.location =  history.back();
							  } 
					});

					</script>';


			}

		}

	}	
	
}