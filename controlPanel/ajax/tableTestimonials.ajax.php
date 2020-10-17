<?php

require_once "../controllers/testimonials.controller.php";
require_once "../models/testimonials.model.php";

class TablaTestimonios{

    /*==============================================
     MOSTRAR LA TABLA DE SERVICIOS 
    /*=============================================*/

    public function ctrMostrarTabla(){

        $item = null;
        $valor = null;

        $testimonios = ControladorTestimonios::ctrMostrarTestimonios($item, $valor);


        $datosJson = '
            {
                "data":[';

                    for($i = 0; $i < count($testimonios); $i++){

                        $imgTestimonio = "<img class='img-thumbnail' src='".$testimonios[$i]["imgTestimonio"]."' width='50px' height='50px'>";

                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarTestimonio' idTestimonio='".$testimonios[$i]["id"]."' data-toggle='modal' data-target='#modalEditarTestimonio'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarTestimonio' idTestimonio='".$testimonios[$i]["id"]."' imgTestimonio='".$testimonios[$i]["imgTestimonio"]."'><i class='fa fa-times'></i></button></div>";
    
                        $datosJson .= '[
                            "'.($i+1).'",
                            "'.$testimonios[$i]["nombreTestimonio"].'",
                            "'.$imgTestimonio.'",
                            "'.$testimonios[$i]["opinionTestimonio"].'",
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

$activar = new TablaTestimonios();
$activar -> ctrMostrarTabla();