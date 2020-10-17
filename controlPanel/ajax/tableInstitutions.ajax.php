<?php

require_once "../controllers/institutions.controller.php";
require_once "../models/institutions.model.php";

class TablaInstitutions{

    /*==============================================
     MOSTRAR LA TABLA DE SERVICIOS 
    /*=============================================*/

    public function ctrMostrarTabla(){

        $item = null;
        $valor = null;

        $institutions = ControladorInstitutions::ctrMostrarInstitutions($item, $valor);


        $datosJson = '
            {
                "data":[';

                    for($i = 0; $i < count($institutions); $i++){

                        $logo = "<img class='img-thumbnail' src='".$institutions[$i]["logo"]."' width='50px' height='50px'>";

                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarTestimonio' idTestimonio='".$institutions[$i]["id"]."' data-toggle='modal' data-target='#modalEditarTestimonio'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarTestimonio' idTestimonio='".$institutions[$i]["id"]."' logo='".$institutions[$i]["logo"]."'><i class='fa fa-times'></i></button></div>";
    
                        $datosJson .= '[
                            "'.($i+1).'",
                            "'.$institutions[$i]["nombre"].'",	
                            "'.$logo.'",
                            "'.$institutions[$i]["departamento"].'",
                            "'.$institutions[$i]["ciudad"].'",
                            "'.$institutions[$i]["ubicacion"].'",
                            "'.$acciones.'"
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
    MOSTRAR LA TABLA DE SERVICIOS 
/*=============================================*/

$activar = new TablaInstitutions();
$activar -> ctrMostrarTabla();