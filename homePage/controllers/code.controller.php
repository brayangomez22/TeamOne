<?php

class ControladorCodigo{

    /*==============================================
     MOSTRAR CODIGO 
    /*=============================================*/

    public function ctrMostrarCodigo(){

        $tabla = "codigoseguridad";

        $respuesta = ModeloCodigo::mdlMostrarCodigo($tabla);

        return $respuesta;

    }

}