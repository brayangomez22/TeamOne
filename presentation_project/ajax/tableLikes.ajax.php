<?php

require_once "../controllers/user.controller.php";
require_once "../models/user.model.php";

class TableLikes{

    /*==============================================
     MOSTRAR LA TABLA DE LAS TAREAS
    /*=============================================*/

    public function ctrShowTableLikes(){

        $item = null;
        $valor = null;

        $institutions = ControllerUser::ctrShowLikes($item, $valor);

        $datosJson = '
            {
                "data":[';

                    for($i = 0; $i < count($institutions); $i++){
    
                        $datosJson .= '[
                            "'.($i+1).'",
                            "'.$institutions[$i]["id_usuario"].'",
                            "'.$institutions[$i]["usuario"].'",
                            "'.$institutions[$i]["id_comentario"].'",
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

$activar = new TableLikes();
$activar -> ctrShowTableLikes();