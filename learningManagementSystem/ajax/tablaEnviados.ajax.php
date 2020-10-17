<?php

require_once "../controladores/emails.controlador.php";
require_once "../modelos/emails.modelo.php";

require_once "../vistas/modulos/funciones.php";

class TablaEmails{

    /*==============================================
     MOSTRAR LA TABLA DE EMAILS 
    /*=============================================*/
    
    public function ctrMostrarTabla(){
        
        $item = "de";
        $valor = $_POST["emailUser"];

        $item2 = "id_institucion";
        $valor2 = $_POST["id_institucion"];
        
        $emails = ControladorEmails::ctrMostrarEmails($item, $valor, $item2, $valor2);

        $datosJson = '
            {
                "data":[';

                    for($i = 0; $i < count($emails); $i++){

                        /*==============================================
                         ORGANIZAMOS LA INFORMACION  
                        /*=============================================*/

                        $info = $emails[$i]["informacion"];
                        $infoExplode = explode(" ", $info); 

                        if(count($infoExplode) >= 13){
                            $palabra1 = $infoExplode[0];
                            $palabra2 = $infoExplode[1];
                            $palabra3 = $infoExplode[2];
                            $palabra4 = $infoExplode[3];
                            $palabra5 = $infoExplode[4];
                            $palabra6 = $infoExplode[5];
                            $palabra7 = $infoExplode[6];
                            $palabra8 = $infoExplode[7];
                            $palabra9 = $infoExplode[8];
                            $palabra10 = $infoExplode[9];
                            $palabra11 = $infoExplode[10];
                            $palabra12 = $infoExplode[11];
    
                            $mostrarInfo = $palabra1." ".$palabra2." ".$palabra3." ".$palabra4." ".$palabra5." ".$palabra6." ".$palabra7." ".$palabra8." ".$palabra9." ".$palabra10." ".$palabra11." ".$palabra12." ...";
                        }else{
                            $mostrarInfo = $emails[$i]["informacion"];
                        }

                        /*==============================================
                         ACCIONES 
                        /*=============================================*/

                        $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarEmail' idEmails='".$emails[$i]["id"]."' idInstitucion='".$emails[$i]["id_institucion"]."' data-toggle='modal' data-target='#modalEditarEmails'><i class='fas fa-eye'></i></button><button class='btn btn-danger btnEliminarEmails' idEmails='".$emails[$i]["id"]."' rutaArchivo='assets/archivos_emails/".$emails[$i]["archivo"]."'><i class='fa fa-times'></i></button>";
                        
                        if($emails[$i]["archivo"] != ""){
                            $acciones .= "<a href='assets/archivos_emails/".$emails[$i]["archivo"]."' class='btn btn-primary btnDescargarEmails' download='".$emails[$i]["archivo"]."' idEmails='".$emails[$i]["id"]."'><i class='fas fa-download'></i></a>";
                        }
                        
                        $acciones .= "</div>";

                        /*==============================================
                         VERFICAR SI HAY ARCHIVOS 
                        /*=============================================*/

                        if($emails[$i]["archivo"] != ""){
                            $archivo = "<i class='fas fa-paperclip'></i>";
                        }else{
                            $archivo = ""; 
                        }

                        /*==============================================
                         FECHA 
                        /*=============================================*/

                        $fecha = fecha($emails[$i]["fecha"]);

                
                        $datosJson .= '[
                            "'.($i+1).'",
                            "'.$emails[$i]["para"].'",
                            "'.$emails[$i]["labor"].'",
                            "'.$mostrarInfo.'",
                            "'.$archivo.'",
                            "'.$fecha.'",
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
    MOSTRAR LA TABLA DE EMAILS 
/*=============================================*/

$activar = new TablaEmails();
$activar -> ctrMostrarTabla();