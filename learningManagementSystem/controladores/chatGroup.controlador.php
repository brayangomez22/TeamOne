<?php

class ControladorChatGroup{

    /*==============================================
     SELECT CHAT_GROUP 
    /*=============================================*/

    static public function ctrMostrarChatGroup($item, $valor, $item2, $valor2){

        $tabla = "chat_group";

        $respuesta = ModeloChatGroup::mdlMostrarChatGroup($tabla, $item, $valor, $item2, $valor2);

        return $respuesta;

    }

    /*==============================================
      MOSTRAR EL TOTAL DE MENSAJES 
    /*=============================================*/

    static public function ctrMostrarTotalMensajes($item, $valor){

        $tabla = "chat_group";

        $respuesta = ModeloChatGroup::mdlMostrarTotalMensajes($tabla, $item, $valor);

        return $respuesta;

    }

}