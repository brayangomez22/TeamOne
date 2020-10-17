<?php

require_once "../controladores/informes.controlador.php";
require_once "../modelos/informes.modelo.php";

class AjaxInformes{

    /*==============================================
     ver emails 
    /*=============================================*/

    public $idInformes;
    public $id_institucion;

    public function ajaxVerInformes(){

        $item = "id";
        $valor = $this -> idInformes;

        $item2 = "id_institucion";
        $valor2 = $this -> id_institucion;

        $respuesta = ControladorInformes::ctrMostrarInformes($item, $valor, $item2, $valor2);

        echo json_encode($respuesta);

    }

}

/*==============================================
 VER EMAILS 
/*=============================================*/

if(isset($_POST["idInformes"])){
    $verEmails = new AjaxInformes();
    $verEmails -> idInformes = $_POST["idInformes"];
    $verEmails -> id_institucion = $_POST["id_institucion"];
    $verEmails -> ajaxVerInformes();
}