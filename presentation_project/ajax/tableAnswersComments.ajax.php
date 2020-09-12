<?php

require_once "../controllers/user.controller.php";
require_once "../models/user.model.php";

class TableAnswersComments{

    /*==============================================
     MOSTRAR LA TABLA DE LAS TAREAS
    /*=============================================*/

    public function ctrShowTableAnswersComments(){

        $item = null;
        $valor = null;

        $institutions = ControllerUser::ctrShowAnswersComments($item, $valor);

        $datosJson = '
            {
                "data":[';

                    for($i = 0; $i < count($institutions); $i++){
    
                        $datosJson .= '[
                            "'.($i+1).'",
                            "'.$institutions[$i]["id_usuario"].'",
                            "'.$institutions[$i]["id_comentario"].'",
                            "'.$institutions[$i]["nombre"].'",
                            "'.$institutions[$i]["comentario"].'",
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

$activar = new TableAnswersComments();
$activar -> ctrShowTableAnswersComments();