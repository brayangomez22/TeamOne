<?php

require_once "../controladores/emails.controlador.php";
require_once "../modelos/emails.modelo.php";

class AjaxEmails{

    /*==============================================
     ver emails 
    /*=============================================*/

    public $idEmails;
    public $idInstitucion;

    public function ajaxVerEmails(){

        $item = "id";
        $valor = $this -> idEmails;

        $item2 = "id_institucion";
        $valor2 = $this -> idInstitucion;

        $respuesta = ControladorEmails::ctrMostrarEmails($item, $valor, $item2, $valor2);

        echo json_encode($respuesta);

    }

    /*==============================================
    EDITAR EMAILS 
    /*=============================================*/

    public $idEditarEmails;
    public $id_institucion;

    public function ajaxEditarEmails(){

        $item = "id";
        $valor = $this -> idEditarEmails;

        $item2 = "id_institucion";
        $valor2 = $this -> id_institucion;

        $respuesta = ControladorEmails::ctrMostrarEmails($item, $valor, $item2, $valor2);

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
    $verEmails -> idInstitucion = $_POST["idInstitucion"];
    $verEmails -> ajaxVerEmails();
}

/*==============================================
 EDITAR EMAILS 
/*=============================================*/

if(isset($_POST["idEditarEmails"])){
    $editarEmails = new AjaxEmails();
    $editarEmails -> idEditarEmails = $_POST["idEditarEmails"];
    $editarEmails -> id_institucion = $_POST["id_institucion"];
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