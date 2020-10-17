<?php

require_once "../controllers/testimonials.controller.php";
require_once "../models/testimonials.model.php";

class AjaxTestimonios{

    /*==============================================
     VALIDAR NO REPETIR SERVICIO 
    /*=============================================*/

    public $validarTestimonio;

    public function ajaxValidarTestimonio(){

        $item = "nombreTestimonio";
        $valor = $this->validarTestimonio;
        
        $respuesta = ControladorTestimonios::ctrMostrarTestimonios($item, $valor);

        echo json_encode($respuesta);

    }

    /*==============================================
     EDITAR SERVICIO 
    /*=============================================*/

    public $idTestimonio;

    public function ajaxEditarTestimonio(){
        
        $item = "id";
        $valor = $this->idTestimonio;

        $respuesta = ControladorTestimonios::ctrMostrarTestimonios($item, $valor);

        echo json_encode($respuesta);

    }

}

/*==============================================
    VALIDAR NO REPETIR SERVICIO 
/*=============================================*/

if(isset($_POST["validarTestimonio"])){

    $valServicio = new AjaxTestimonios();
    $valServicio -> validarTestimonio = $_POST["validarTestimonio"];
    $valServicio -> ajaxValidarTestimonio();

}

/*==============================================
    EDITAR SERVICIO 
/*=============================================*/

if(isset($_POST["idTestimonio"])){

    $editarServicio = new AjaxTestimonios();
    $editarServicio -> idTestimonio = $_POST["idTestimonio"];
    $editarServicio -> ajaxEditarTestimonio();

}