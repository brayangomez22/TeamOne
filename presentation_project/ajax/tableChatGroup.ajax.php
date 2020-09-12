<?php

require_once "../controllers/user.controller.php";
require_once "../models/user.model.php";

class TableChatGroup{

    /*==============================================
     MOSTRAR LA TABLA DE LAS TAREAS
    /*=============================================*/

    public function ctrShowTableChatGroup(){

        $item = null;
        $valor = null;

        $institutions = ControllerUser::ctrShowChatGroup($item, $valor);

        $datosJson = '
            {
                "data":[';

                    for($i = 0; $i < count($institutions); $i++){
    
                        $datosJson .= '[
                            "'.($i+1).'",
                            "'.$institutions[$i]["id_usuario"].'",
                            "'.$institutions[$i]["nombre"].'",
                            "'.$institutions[$i]["foto"].'",
                            "'.$institutions[$i]["informacion"].'",
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

$activar = new TableChatGroup();
$activar -> ctrShowTableChatGroup();