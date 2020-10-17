<?php

class ControllerUser{

    /*==============================================
     MOSTRAR LOS USUARIOS 
    /*=============================================*/

    static public function ctrShowUsers($item, $valor){

        $tabla = "usuarios";

        $reply = ModelUser::mdlShowUsers($tabla, $item, $valor);

        return $reply;

    }

    /*==============================================
     MOSTRAR LAS INSTITUCIONES 
    /*=============================================*/

    static public function ctrShowInstitutions($item, $valor){

        $tabla = "instituciones";

        $reply = ModelUser::mdlShowInstitutions($tabla, $item, $valor);

        return $reply;

    }

    /*==============================================
     MOSTRAR LAS SOLICITUDES LMS 
    /*=============================================*/

    static public function ctrShowTableRequests($item, $valor){

        $tabla = "solicitudes_lms";

        $reply = ModelUser::mdlShowTableRequests($tabla, $item, $valor);

        return $reply;

    }

    /*==============================================
     MOSTRAR LA BANDEJA DE ENTRADA 
    /*=============================================*/

    static public function ctrShowInbox($item, $valor){

        $tabla = "bandeja_de_entrada";

        $reply = ModelUser::mdlShowInbox($tabla, $item, $valor);

        return $reply;

    }

    /*==============================================
     MOSTRAR LAS TAREAS 
    /*=============================================*/

    static public function ctrShowUploadTasks($item, $valor){

        $tabla = "subir_tareas";

        $reply = ModelUser::mdlShowUploadTasks($tabla, $item, $valor);

        return $reply;

    }

    /*==============================================
     MOSTRAR EL CHAT DEL GRUPO 
    /*=============================================*/

    static public function ctrShowChatGroup($item, $valor){

        $tabla = "chat_group";

        $reply = ModelUser::mdlShowChatGroup($tabla, $item, $valor);

        return $reply;

    }

    /*==============================================
     MOSTRAR LOS COMENTARIOS 
    /*=============================================*/

    static public function ctrShowComments($item, $valor){

        $tabla = "comentarios";

        $reply = ModelUser::mdlShowComments($tabla, $item, $valor);

        return $reply;

    }

    /*==============================================
     MOSTRAR LAS RESPUESTAS DE LOS COMENTARIOS 
    /*=============================================*/

    static public function ctrShowAnswersComments($item, $valor){

        $tabla = "respuestas_comentarios";

        $reply = ModelUser::mdlShowAnswersComments($tabla, $item, $valor);

        return $reply;

    }

    /*==============================================
     MOSTRAR LOS LIKES
    /*=============================================*/

    static public function ctrShowLikes($item, $valor){

        $tabla = "likes";

        $reply = ModelUser::mdlShowLikes($tabla, $item, $valor);

        return $reply;

    }

}