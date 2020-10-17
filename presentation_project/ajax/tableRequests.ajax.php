<?php

require_once "../controllers/user.controller.php";
require_once "../models/user.model.php";

class TableTableRequests{

    /*==============================================
     MOSTRAR LA TABLA DE LAS SOLICITUDES LMS
    /*=============================================*/

    public function ctrShowTableTableRequests(){

        $item = null;
        $valor = null;

        $institutions = ControllerUser::ctrShowTableRequests($item, $valor);

        $datosJson = '
            {
                "data":[';

                    for($i = 0; $i < count($institutions); $i++){
    
                        $datosJson .= '[
                            "'.($i+1).'",
                            "'.$institutions[$i]["id_usuario"].'",
                            "'.$institutions[$i]["id_institucion"].'",
                            "'.$institutions[$i]["nombre"].'",
                            "'.$institutions[$i]["labor"].'",
                            "'.$institutions[$i]["mensaje"].'",
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

$activar = new TableTableRequests();
$activar -> ctrShowTableTableRequests();