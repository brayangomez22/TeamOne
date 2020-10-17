<?php

class ControllerUser{

    /*==============================================
     SHOW USERS 
    /*=============================================*/

    static public function ctrShowUsers($item, $value){

        $table = "usuarios";

        $reply = ModelUser::mdlShowUsers($table, $item, $value);

        return $reply;

    }

    /*==============================================
     MOSTRAR EL TOTAL DE USUARIOS 
    /*=============================================*/

    static public function ctrMostrarTotalUsuarios($orden){

        $tabla = "usuarios";

        $respuesta = ModelUser::mdlMostrarTotalUsuarios($tabla, $orden);

        return $respuesta;

    }

}