<?php

require_once "../controladores/informes.controlador.php";
require_once "../modelos/informes.modelo.php";

class AjaxInformes{

    /*==============================================
     ver emails 
    /*=============================================*/

    public $idInformes;

    public function ajaxVerInformes(){

        $item = "id";
        $valor = $this -> idInformes;

        $respuesta = ControladorInformes::ctrMostrarInformes($item, $valor);

        echo json_encode($respuesta);

    }

}

/*==============================================
 VER EMAILS 
/*=============================================*/

if(isset($_POST["idInformes"])){
    $verEmails = new AjaxInformes();
    $verEmails -> idInformes = $_POST["idInformes"];
    $verEmails -> ajaxVerInformes();
}