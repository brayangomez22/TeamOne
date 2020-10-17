<?php

class ControllerRequestLMS{

    /*==============================================
     MOSTRAR LOS SERVICIOS 
    /*=============================================*/

    static public function ctrShowRequests($item, $valor){

        $table = "solicitudes_lms";

        $reply = ModelRequestLMS::mdlShowRequests($table, $item, $valor);

        return $reply;

    }

    /*==============================================
     MOSTRAR EL TOTAL DE SOLICITUDES 
    /*=============================================*/

    static public function ctrMostrarTotalSolicitudes($orden){

        $tabla = "solicitudes_lms";

        $respuesta = ModelRequestLMS::mdlMostrarTotalSolicitudes($tabla, $orden);

        return $respuesta;

    }

}