<?php

require_once "../controllers/user.controller.php";
require_once "../models/user.model.php";

class TableComments{

    /*==============================================
     MOSTRAR LA TABLA DE LAS TAREAS
    /*=============================================*/

    public function ctrShowTableComments(){

        $item = null;
        $valor = null;

        $institutions = ControllerUser::ctrShowComments($item, $valor);

        $datosJson = '
            {
                "data":[';

                    for($i = 0; $i < count($institutions); $i++){
    
                        $datosJson .= '[
                            "'.($i+1).'",
                            "'.$institutions[$i]["id_institucion"].'",
                            "'.$institutions[$i]["id_usuario"].'",
                            "'.$institutions[$i]["nombre"].'",
                            "'.$institutions[$i]["me_gustas"].'",
                            "'.$institutions[$i]["respuestas"].'",
                            "'.$institutions[$i]["comentarios"].'",
                            "'.$institutions[$i]["foto"].'",
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

$activar = new TableComments();
$activar -> ctrShowTableComments();