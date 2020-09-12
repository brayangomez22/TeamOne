<?php

require_once "../controllers/user.controller.php";
require_once "../models/user.model.php";

class TableInbox{

    /*==============================================
     MOSTRAR LA TABLA DE LA BANDEJA DE ENTRADA 
    /*=============================================*/

    public function ctrShowTableInbox(){

        $item = null;
        $valor = null;

        $institutions = ControllerUser::ctrShowInbox($item, $valor);

        $datosJson = '
            {
                "data":[';

                    for($i = 0; $i < count($institutions); $i++){
    
                        $datosJson .= '[
                            "'.($i+1).'",
                            "'.$institutions[$i]["id_usuario"].'",
                            "'.$institutions[$i]["nombre"].'",
                            "'.$institutions[$i]["labor"].'",
                            "'.$institutions[$i]["para"].'",
                            "'.$institutions[$i]["de"].'",
                            "'.$institutions[$i]["asunto"].'",
                            "'.$institutions[$i]["informacion"].'",
                            "'.$institutions[$i]["archivo"].'",
                            "'.$institutions[$i]["visto"].'",
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

$activar = new TableInbox();
$activar -> ctrShowTableInbox();