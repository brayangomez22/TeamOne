<?php

require_once "../controllers/user.controller.php";
require_once "../models/user.model.php";

class TableUploadTasks{

    /*==============================================
     MOSTRAR LA TABLA DE LAS TAREAS
    /*=============================================*/

    public function ctrShowTableUploadTasks(){

        $item = null;
        $valor = null;

        $institutions = ControllerUser::ctrShowUploadTasks($item, $valor);

        $datosJson = '
            {
                "data":[';

                    for($i = 0; $i < count($institutions); $i++){
    
                        $datosJson .= '[
                            "'.($i+1).'",
                            "'.$institutions[$i]["id_usuario"].'",
                            "'.$institutions[$i]["nombreMaestro"].'",
                            "'.$institutions[$i]["labor"].'",
                            "'.$institutions[$i]["email"].'",
                            "'.$institutions[$i]["tituloTarea"].'",
                            "'.$institutions[$i]["materia"].'",
                            "'.$institutions[$i]["descripcion"].'",
                            "'.$institutions[$i]["archivo"].'",
                            "'.$institutions[$i]["grupo"].'",
                            "'.$institutions[$i]["fecha"].'"
                        ],';

                    }

                $datosJson = substr($datosJson, 0, -1);

                $datosJson .= ']

            }

        ';

        echo $datosJson;

    }

}

$activar = new TableUploadTasks();
$activar -> ctrShowTableUploadTasks();