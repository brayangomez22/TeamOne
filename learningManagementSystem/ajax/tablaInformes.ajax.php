<?php

require_once "../controladores/informes.controlador.php";
require_once "../modelos/informes.modelo.php";

require_once "../vistas/modulos/funciones.php";

class TablaInformes{

    /*==============================================
     MOSTRAR LA TABLA DE SERVICIOS 
    /*=============================================*/

    public function ctrMostrarTabla(){

        if($_POST["labor"] == "profesor"){

            $item = "email";
            $valor = $_POST["email"];

            $item2 = "id_institucion";
            $valor2 = $_POST["id_institucion"];
            $informes = ControladorInformes::ctrMostrarInformes($item, $valor, $item2, $valor2);

        }else{

            $item = "grupo";
            $valor = $_POST["grupo"];

            $item2 = "id_institucion";
            $valor2 = $_POST["id_institucion"];
            $informes = ControladorInformes::ctrMostrarInformes($item, $valor, $item2, $valor2);

        }

        $datosJson = '
            {
                "data":[';

                    for($i = 0; $i < count($informes); $i++){

                        /*==============================================
                         ORGANIZAMOS LA INFORMACION  
                        /*=============================================*/

                        $descripcion = $informes[$i]["descripcion"];
                        $descripcionExplode = explode(" ", $descripcion); 

                        if(count($descripcionExplode) >= 13){
                            $palabra1 = $descripcionExplode[0];
                            $palabra2 = $descripcionExplode[1];
                            $palabra3 = $descripcionExplode[2];
                            $palabra4 = $descripcionExplode[3];
                            $palabra5 = $descripcionExplode[4];
                            $palabra6 = $descripcionExplode[5];
                            $palabra7 = $descripcionExplode[6];
                            $palabra8 = $descripcionExplode[7];
                            $palabra9 = $descripcionExplode[8];
                            $palabra10 = $descripcionExplode[9];
                            $palabra11 = $descripcionExplode[10];
                            $palabra12 = $descripcionExplode[11];
    
                            $mostrarDescripcion = $palabra1." ".$palabra2." ".$palabra3." ".$palabra4." ".$palabra5." ".$palabra6." ".$palabra7." ".$palabra8." ".$palabra9." ".$palabra10." ".$palabra11." ".$palabra12." ...";
                        }else{
                            $mostrarDescripcion = $informes[$i]["descripcion"];
                        }


                        if($_POST["labor"] == "profesor"){
                            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarInformes' idInformes='".$informes[$i]["id"]."' id_institucion='".$informes[$i]["id_institucion"]."' data-toggle='modal' data-target='#modalEditarInformes'><i class='fas fa-pencil-alt'></i></button><button class='btn btn-danger btnEliminarInformes' idInformes='".$informes[$i]["id"]."'><i class='fa fa-times'></i></button>";

                            if($informes[$i]["archivo"] != ""){
                                $acciones .= "<a href='assets/tareas/".$informes[$i]["archivo"]."' class='btn btn-primary btnDescargarInforme' download='".$informes[$i]["archivo"]."' idInforme='".$informes[$i]["id"]."'><i class='fas fa-download'></i></a>";
                            }
                            $acciones .= "</div>";

                        }else{
                            $acciones = "<div class='btn-group'><button class='btn btn-warning btnVerInformes' idInformes='".$informes[$i]["id"]."' id_institucion='".$informes[$i]["id_institucion"]."' data-toggle='modal' data-target='#modalVerInforme'><i class='fas fa-eye'></i></button>";

                            if($informes[$i]["archivo"] != ""){
                                $acciones .= "<a href='assets/tareas/".$informes[$i]["archivo"]."' class='btn btn-primary btnDescargarInforme' download='".$informes[$i]["archivo"]."' idInforme='".$informes[$i]["id"]."'><i class='fas fa-download'></i></a>";
                            }
                            $acciones .= "</div>";

                        }

                        /*==============================================
                         FECHA 
                        /*=============================================*/

                        $fecha = fecha($informes[$i]["fecha"]);

                        /*==============================================
                         VERFICAR SI HAY ARCHIVOS 
                        /*=============================================*/

                        if($informes[$i]["archivo"] != ""){
                            $archivo = "<i class='fas fa-paperclip'></i>";
                        }else{
                            $archivo = ""; 
                        }

                        $datosJson .= '[
                            "'.($i+1).'",
                            "'.$informes[$i]["nombreMaestro"].'",
                            "'.$informes[$i]["tituloTarea"].'",
                            "'.$informes[$i]["materia"].'",
                            "'.$mostrarDescripcion.'",
                            "'.$informes[$i]["grupo"].'",
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
    MOSTRAR LA TABLA DE SERVICIOS 
/*=============================================*/

$activar = new TablaInformes();
$activar -> ctrMostrarTabla();