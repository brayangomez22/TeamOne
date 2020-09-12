<?php

require_once "../controllers/user.controller.php";
require_once "../models/user.model.php";

class TableInstitutions{

    /*==============================================
     MOSTRAR LA TABLA DE LAS INSTITUCIONES 
    /*=============================================*/

    public function ctrShowTableInstitutions(){

        $item = null;
        $valor = null;

        $institutions = ControllerUser::ctrShowInstitutions($item, $valor);

        $datosJson = '
            {
                "data":[';

                    for($i = 0; $i < count($institutions); $i++){
    
                        $datosJson .= '[
                            "'.($i+1).'",
                            "'.$institutions[$i]["nombre"].'",
                            "'.$institutions[$i]["logo"].'",
                            "'.$institutions[$i]["departamento"].'",
                            "'.$institutions[$i]["ciudad"].'",
                            "'.$institutions[$i]["ubicacion"].'",
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

$activar = new TableInstitutions();
$activar -> ctrShowTableInstitutions();