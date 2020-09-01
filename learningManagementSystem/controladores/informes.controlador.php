<?php

class ControladorInformes{

    /*==============================================
     MOSTRAR LOS INFORMES 
    /*=============================================*/

    static public function ctrMostrarInformes($item, $valor){

        $tabla = "subir_tareas";

        $respuesta = ModeloInformes::mdlMostrarInformes($tabla, $item, $valor);

        return $respuesta;

    }

    /*==============================================
     SUBIR TAREAS 
    /*=============================================*/

    public function ctrSubirTareas(){

        if(isset($_POST["tituloTarea"])){

            if(isset($_FILES["archivo"]["tmp_name"]) && !empty($_FILES["archivo"]["tmp_name"])){
     
                $archivo_temporal = $_FILES["archivo"]["tmp_name"];
                $nombre_archivo = $_FILES["archivo"]["name"];
                $subir_carpeta = move_uploaded_file($archivo_temporal, 'vistas/tareas/' .$nombre_archivo);
     
            }else{
                $nombre_archivo = "";
            }

            $datos = array("nombreMaestro"=>$_SESSION["nombre"],
                            "email"=>$_SESSION["email"],
                            "tituloTarea"=>$_POST["tituloTarea"],
                            "materia"=>$_POST["materia"],
                            "descripcion"=>$_POST["descripcion"],
                            "archivo"=>$nombre_archivo,
                            "grupo"=>$_POST["grado"]);
     
            $tabla = "subir_tareas";

            $respuesta = ModeloInformes::mdlSubirTareas($tabla, $datos);
            
            if($respuesta == "ok"){

                echo '<script> 
                    swal({
                        type: "success",
                        title: "OK!",
                        text: "¡Tarea subida correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",		
                        }).then((result) => {
                        if (result.value) {
                            window.location = "infoMaestros";
                        }
                    })
                </script>';

            }

        }

    }

    /*==============================================
     EDITAR INFORMES 
    /*=============================================*/

    public function ctrEditarInformes(){

        if(isset($_POST["editarTituloInformes"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloInformes"]) && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])){

                if(isset($_FILES["editarArchivo"]["tmp_name"]) && !empty($_FILES["editarArchivo"]["tmp_name"])){

                    unlink('vistas/tareas/'.$_POST["archivoAntiguo"]);
        
                    $archivo_temporal = $_FILES["editarArchivo"]["tmp_name"];
                    $nombre_archivo = $_FILES["editarArchivo"]["name"];
                    $subir_carpeta = move_uploaded_file($archivo_temporal, 'vistas/tareas/' .$nombre_archivo);
        
                }else{
                    $nombre_archivo = $_POST["archivoAntiguo"];
                }

                $datos = array("tituloTarea"=>$_POST["editarTituloInformes"],
                                "materia"=>$_POST["editarMateria"],
                                "descripcion"=>$_POST["editarDescripcion"],
                                "archivo"=>$nombre_archivo,
                                "grupo"=>$_POST["editarGrado"],
                                "id"=>$_POST["editarIdInformes"]);

                $tabla = "subir_tareas";

                $respuesta = ModeloInformes::mdlEditarInformes($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script> 
                        swal({
                            type: "success",
                            title: "La tarea ha sido editada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",		
                            }).then((result) => {
                            if (result.value) {
                                window.location = "infoMaestros";
                            }
                        })
                    </script>';

                }
                
            }else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El titulo de la tarea no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;

			}

        }

    }

    /*==============================================
     DELETE INFORMES 
    /*=============================================*/

    public function ctrEliminarTarea(){

        if(isset($_GET["idInformes"])){

            // if($_GET["rutaArchivo"] != ""){

			// 	unlink($_GET["rutaArchivo"]);		

            // }
            
            $respuesta = ModeloInformes::mdlEliminarTarea("subir_tareas", $_GET["idInformes"]);

            if($respuesta == "ok"){
                echo '<script> 
                    swal({
                        type: "success",
                        title: "La tarea ha sido borrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",		
                        }).then((result) => {
                        if (result.value) {
                            window.location = "infoMaestros";
                        }
                    })
                </script>';
            }

        }

    }

}