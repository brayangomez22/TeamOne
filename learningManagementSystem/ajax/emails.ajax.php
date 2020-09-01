<?php

require_once "../controladores/emails.controlador.php";
require_once "../modelos/emails.modelo.php";

class AjaxEmails{

    /*==============================================
     ver emails 
    /*=============================================*/

    public $idEmails;

    public function ajaxVerEmails(){

        $item = "id";
        $valor = $this -> idEmails;

        $respuesta = ControladorEmails::ctrMostrarEmails($item, $valor);

        echo json_encode($respuesta);

    }

    /*==============================================
    EDITAR EMAILS 
    /*=============================================*/

    public $idEditarEmails;

    public function ajaxEditarEmails(){

        $item = "id";
        $valor = $this -> idEditarEmails;

        $respuesta = ControladorEmails::ctrMostrarEmails($item, $valor);

        echo json_encode($respuesta);

    }

    /*==============================================
     ESTRELLAS 
    /*=============================================*/

    public $id;
    public $fa_far;

    public function ajaxActualizarEstrellas(){

        $tabla = "bandeja_de_entrada";
        $item = "id";
        $valor = $this -> id;
        $valor2 = $this -> fa_far;

        $respuesta = ModeloEmails::mdlActualizarEstrella($tabla, $item, $valor, $valor2);

        echo $respuesta;

    }

}

/*==============================================
 VER EMAILS 
/*=============================================*/

if(isset($_POST["idEmails"])){
    $verEmails = new AjaxEmails();
    $verEmails -> idEmails = $_POST["idEmails"];
    $verEmails -> ajaxVerEmails();
}

/*==============================================
 EDITAR EMAILS 
/*=============================================*/

if(isset($_POST["idEditarEmails"])){
    $editarEmails = new AjaxEmails();
    $editarEmails -> idEditarEmails = $_POST["idEditarEmails"];
    $editarEmails -> ajaxEditarEmails();
}

/*==============================================
 ESTRELLAS 
/*=============================================*/

if(isset($_POST["id"])){
    $estrellas = new AjaxEmails();
    $estrellas -> id = $_POST["id"];
    $estrellas -> fa_far = $_POST["fa_far"];
    $estrellas -> ajaxActualizarEstrellas();
}