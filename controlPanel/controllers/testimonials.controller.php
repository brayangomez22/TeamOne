<?php

class ControladorTestimonios{

    /*==============================================
     MOSTRAR LOS SERVICIOS 
    /*=============================================*/

    static public function ctrMostrarTestimonios($item, $valor){

        $tabla = "testimonios";

        $respuesta = ModeloTestimonios::mdlMostrarTestimonios($tabla, $item, $valor);

        return $respuesta;

    }

    /*==============================================
     CREAR SERVICIOS 
    /*=============================================*/

    public function ctrCrearTestimonio(){

        if(isset($_POST["nombreTestimonio"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreTestimonio"]) && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["opinion"]) ){

                /*=============================================
				VALIDAR IMAGEN TESTIMONIO
				=============================================*/

				$rutaTestimonio = "assets/dist/img/default/anonymous.jpg";

				if(isset($_FILES["fotoTestimonio"]["tmp_name"]) && !empty($_FILES["fotoTestimonio"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoTestimonio"]["tmp_name"]);

					$nuevoAncho = 200;
					$nuevoAlto = 200;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/	

					if($_FILES["fotoTestimonio"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaTestimonio = "assets/dist/img/testimonials/".$_POST["nombreTestimonio"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoTestimonio"]["tmp_name"]);	

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaTestimonio);

					}

					if($_FILES["fotoTestimonio"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaTestimonio = "assets/dist/img/testimonials/".$_POST["nombreTestimonio"].".png";

						$origen = imagecreatefrompng($_FILES["fotoTestimonio"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaTestimonio);

					}

                }
                
                $datos = array("imgTestimonio"=>$rutaTestimonio,
								"nombreTestimonio"=>$_POST["nombreTestimonio"],
								"opinionTestimonio"=>$_POST["opinion"]);

                $tabla = "testimonios";

                $respuesta = ModeloTestimonios::mdlCrearTestimonio($tabla, $datos);

                if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Testimonio guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "testimonials";

							}
						})

					</script>';

				}

            }else{

				echo'<script>
					swal({
                        type: "error",
                        title: "¡El campo del nombre de Testimonio no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
					})
			  	</script>';

			  	return;

			}

        }

    }

    /*==============================================
     EDITAR SERVICIO 
    /*=============================================*/

    public function ctrEditarTestimonio(){

        if(isset($_POST["editarTestimonio"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTestimonio"]) && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["opinion"]) ){

				/*=============================================
				VALIDAR IMAGEN PORTADA
				=============================================*/

				$rutaTestimonio = $_POST["antiguaFotoTestimonio"];

				if(isset($_FILES["fotoTestimonio"]["tmp_name"]) && !empty($_FILES["fotoTestimonio"]["tmp_name"])){

					/*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/

					unlink($_POST["antiguaFotoTestimonio"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoTestimonio"]["tmp_name"]);

					$nuevoAncho = 200;
					$nuevoAlto = 200;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/	

					if($_FILES["fotoTestimonio"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaTestimonio = "assets/dist/img/testimonials/".$_POST["editarTestimonio"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoTestimonio"]["tmp_name"]);	

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaTestimonio);

					}

					if($_FILES["fotoTestimonio"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaTestimonio = "assets/dist/img/testimonials/".$_POST["editarTestimonio"].".png";

						$origen = imagecreatefrompng($_FILES["fotoTestimonio"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaTestimonio);

					}

				}
										
				$datos = array("imgTestimonio"=>$rutaTestimonio,
								"nombreTestimonio"=>$_POST["editarTestimonio"],
								"opinionTestimonio"=>$_POST["opinion"],
								"id"=>$_POST["editarIdTestimonio"]);

                $tabla = "testimonios";

                $respuesta = ModeloTestimonios::mdlEditarTestimonio($tabla, $datos);

                if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Testimonio editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "testimonials";

							}
						})

					</script>';

                }
                
            }else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El campo del nombre de Testimonio no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;

			}

        }

    }

    /*==============================================
     ELIMINAR SERVICIO 
    /*=============================================*/

    static public function ctrEliminarTestimonio(){

        if(isset($_GET["idTestimonio"])){

			if($_GET["imgTestimonio"] != "" && $_GET["imgTestimonio"] != "assets/dist/img/default/anonymous.jpg"){

				unlink($_GET["imgTestimonio"]);		

			}

            $tabla = "testimonios";

            $respuesta = ModeloTestimonios::mdlEliminarTestimonio($tabla,  $_GET["idTestimonio"]);

            if($respuesta == "ok"){

                echo'<script>

                swal({
                        type: "success",
                        title: "Testimonio borrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                        if (result.value) {

                        window.location = "testimonials";

                        }
                    })

                </script>';

            }

        }

    }

}