<?php

require_once "../controllers/requestLMS.controller.php";
require_once "../models/requestLMS.model.php";

require_once "../controllers/user.controller.php";
require_once "../models/user.model.php";

class TableRequestLMS{

    /*==============================================
     SHOW TABLE OF REQUESTS LMS 
    /*=============================================*/

    public function ctrShowTable(){

        $item = null;
        $valor = null;

        $request = ControllerRequestLMS::ctrShowRequests($item, $valor);

        $dataJson = '
            {
                "data":[';

                    for($i = 0; $i < count($request); $i++){

                        $item2 = "id";
                        $value2 = $request[$i]["id_usuario"];

                        $user = ControllerUser::ctrShowUsers($item2, $value2); 

                        if($user["acceso"] == 0){

                            $estate = "<div><button class='btn btn-danger btn-xs btnActivateLMS' idProfile='".$user["id"]."' accessStatus='1'>Desactivado</button></div>";

                        }else{

                            $estate = "<div><button class='btn btn-success btn-xs btnActivateLMS' idProfile='".$user["id"]."' accessStatus='0'>Activado</button></div>";

                        } 
    
                        $dataJson .= '[
                            "'.($i+1).'",
                            "'.$request[$i]["id_usuario"].'",
                            "'.$request[$i]["id_institucion"].'",
                            "'.$request[$i]["nombre"].'",
                            "'.$request[$i]["labor"].'",
                            "'.$request[$i]["mensaje"].'",
                            "'.$estate.'"
                        ],';

                    }

                $dataJson = substr($dataJson, 0, -1);

                $dataJson .= ']

            }

        ';

        echo $dataJson;

    }

}

/*==============================================
 SHOW TABLE OF REQUESTS LMS
/*=============================================*/

$activate = new TableRequestLMS();
$activate -> ctrShowTable();