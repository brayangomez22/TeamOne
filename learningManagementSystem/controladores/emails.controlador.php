<?php

class ControladorEmails{

    /*==============================================
     MOSTRAR LOS EMAILS 
    /*=============================================*/

    static public function ctrMostrarEmails($item, $valor, $item2, $valor2){

        $tabla = "bandeja_de_entrada";

        $respuesta = ModeloEmails::mdlMostrarEmails($tabla, $item, $valor, $item2, $valor2);

        return $respuesta;

    }

    /*==============================================
     CREAR EMAILS 
    /*=============================================*/

    public function ctrCrearEmail(){

        if(isset($_POST["mensajeEmail"]) && isset($_POST["nombreEmailUsuario"])){

            if(preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["mensajeEmail"]) &&
            preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nombreEmailUsuario"])){

                if(isset($_FILES["attachment"]["tmp_name"]) && !empty($_FILES["attachment"]["tmp_name"])){

                    $archivo_temporal = trim($_FILES["attachment"]["tmp_name"]);
                    $nombre_archivo = trim($_FILES["attachment"]["name"]);
                    $subir_carpeta = move_uploaded_file($archivo_temporal, 'assets/archivos_emails/' .$nombre_archivo);

                }else{
                    $nombre_archivo = "";
                }

                $mensajeEmail = htmlspecialchars($_POST["mensajeEmail"]);

                $tabla = "bandeja_de_entrada";
                $datos = array("id_institucion"=>$_SESSION["id_institucion"],
                                "id_usuario"=>$_SESSION["id"],
                                "nombre"=>$_SESSION["nombre"],
                                "labor"=>$_SESSION["labor"],
                                "para"=>$_POST["nombreEmailUsuario"],
                                "de"=>$_SESSION["email"],
                                "asunto"=>$_POST["asunto"],
                                "informacion"=>$mensajeEmail,
                                "archivo"=>$nombre_archivo,
                                "visto"=>"fa");

                $respuesta = ModeloEmails::mdlCrearEmail($tabla, $datos);

                var_dump($respuesta);

                if($respuesta == "ok"){
                    echo '<script> 
                        swal({
                            type: "success",
                            title: "Su mensaje se envio correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",		
                            }).then((result) => {
                            if (result.value) {
                                window.location = "componer";
                            }
                        })
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
                    }).then((result) => {
                        if (result.value) {
                            window.location = "componer";
                        }
                    });
				</script>';
			}

        }

    }

    /*==============================================
     EDITAR EMAILS 
    /*=============================================*/

    public function ctrEditarEmails(){

        if(isset($_POST["editarParaEmails"])){

            if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarParaEmails"]) && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarInformacion"])){

                $nombre_archivo = $_POST["archivoAntiguo"];
                
                if(isset($_FILES["editarArchivoEmail"]["tmp_name"]) && !empty($_FILES["editarArchivoEmail"]["tmp_name"])){

                    unlink('assets/archivos_emails/'.$_POST["archivoAntiguo"]);
        
                    $archivo_temporal = $_FILES["editarArchivoEmail"]["tmp_name"];
                    $nombre_archivo = $_FILES["editarArchivoEmail"]["name"];
                    $subir_carpeta = move_uploaded_file($archivo_temporal, 'assets/archivos_emails/' .$nombre_archivo);
        
                }

                $datos = array("para"=>$_POST["editarParaEmails"],
                                "informacion"=>$_POST["editarInformacion"],
                                "archivo"=>$nombre_archivo,
                                "id"=>$_POST["editarIdEmails"]);

                $tabla = "bandeja_de_entrada";

                $respuesta = ModeloEmails::mdlEditarEmails($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script> 
                        swal({
                            type: "success",
                            title: "El email ha sido editado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",		
                            }).then((result) => {
                            if (result.value) {
                                window.location = "enviados";
                            }
                        })
                    </script>';

                }
                
            }else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El email o la informacion no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;

			}

        }

    }

    /*==============================================
     DELETE EMAILS 
    /*=============================================*/

    public function ctrEliminarEmail(){

        if(isset($_GET["idEmails"])){

            if($_GET["rutaArchivo"] != ""){

				unlink($_GET["rutaArchivo"]);		

            }
            
            $respuesta = ModeloEmails::mdlEliminarEmail("bandeja_de_entrada", $_GET["idEmails"]);

            if($respuesta == "ok"){
                echo '<script> 
                    swal({
                        type: "success",
                        title: "El email ha sido borrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",		
                        }).then((result) => {
                        if (result.value) {
                            window.location = "bandeja-de-entrada";
                        }
                    })
                </script>';
            }

        }

    }

    /*==============================================
      MOSTRAR EL TOTAL DE EMAILS 
    /*=============================================*/

    static public function ctrMostrarTotalEmails($item, $valor, $item2, $valor2){

        $tabla = "bandeja_de_entrada";

        $respuesta = ModeloEmails::mdlMostrarTotalEmails($tabla, $item, $valor, $item2, $valor2);

        return $respuesta;

    }

}