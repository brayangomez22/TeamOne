<?php

require_once "../controllers/user.controller.php";
require_once "../models/user.model.php";

class TableUsers{

    /*==============================================
     MOSTRAR LA TABLA DE USUARIOS 
    /*=============================================*/

    public function ctrShowTableUser(){

        $item = null;
        $valor = null;

        $usuarios = ControllerUser::ctrShowUsers($item, $valor);

        $datosJson = '
            {
                "data":[';

                    for($i = 0; $i < count($usuarios); $i++){
    
                        $datosJson .= '[
                            "'.($i+1).'",
                            "'.$usuarios[$i]["id_institucion"].'",
                            "'.$usuarios[$i]["nombre"].'",
                            "'.$usuarios[$i]["labor"].'",
                            "'.$usuarios[$i]["grupo"].'",
                            "'.$usuarios[$i]["password"].'",
                            "'.$usuarios[$i]["email"].'",
                            "'.$usuarios[$i]["modo"].'",
                            "'.$usuarios[$i]["foto"].'",
                            "'.$usuarios[$i]["verificacion"].'",
                            "'.$usuarios[$i]["emailEncriptado"].'",
                            "'.$usuarios[$i]["session_actual"].'",
                            "'.$usuarios[$i]["en_linea"].'",
                            "'.$usuarios[$i]["fecha"].'"
                        ],';

                    }

                $datosJson = substr($datosJson, 0, -1);

                $datosJson .= ']

            }

        ';

        echo $datosJson;

    }
}

/*==============================================
 MOSTRAR LA TABLA
/*=============================================*/

$activar = new TableUsers();
$activar -> ctrShowTableUser();