<?php

class ControladorChatGroup{

    /*==============================================
     SELECT CHAT_GROUP 
    /*=============================================*/

    static public function ctrMostrarChatGroup($item, $valor){

        $tabla = "chat_group";

        $respuesta = ModeloChatGroup::mdlMostrarChatGroup($tabla, $item, $valor);

        return $respuesta;

    }

}