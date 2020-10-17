<?php

class ControladorNotificaciones{

    /*==============================================
     MOSTRAR NOTIFICACIONES 
    /*=============================================*/

    public function ctrMostrarNotificaciones(){

        $tabla = "notificaciones";

        $respuesta = ModeloNotificaciones::mdlMostrarNotificaciones($tabla);

        return $respuesta;

    }

}