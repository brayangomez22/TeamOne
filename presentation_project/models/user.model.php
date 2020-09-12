<?php

require_once "connection.php";

class ModelUser{

    /*==============================================
     MOSTRAR LOS USUARIOS 
    /*=============================================*/

    static public function mdlShowUsers($tabla, $item, $valor){
        
        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();

        }else{
            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt=null;

    }

    /*==============================================
     MOSTRAR LAS INSTITUCIONES 
    /*=============================================*/

    static public function mdlShowInstitutions($tabla, $item, $valor){
        
        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();

        }else{
            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt=null;

    }
    
    /*==============================================
     MOSTRAR LA BANDEJA DE ENTRADA 
    /*=============================================*/

    static public function mdlShowInbox($tabla, $item, $valor){
        
        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();

        }else{
            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt=null;

    }

    /*==============================================
     MOSTRAR LAS TAREAS 
    /*=============================================*/

    static public function mdlShowUploadTasks($tabla, $item, $valor){
        
        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();

        }else{
            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt=null;

    }

    /*==============================================
     MOSTRAR EL CHAT DEL GRUPO 
    /*=============================================*/

    static public function mdlShowChatGroup($tabla, $item, $valor){
        
        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();

        }else{
            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt=null;

    }

    /*==============================================
     MOSTRAR LOS COMENTARIOS 
    /*=============================================*/

    static public function mdlShowComments($tabla, $item, $valor){
        
        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();

        }else{
            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt=null;

    }

    /*==============================================
     MOSTRAR LAS RESPUESTAS DE LOS COMENTARIOS 
    /*=============================================*/

    static public function mdlShowAnswersComments($tabla, $item, $valor){
        
        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();

        }else{
            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt=null;

    }

    /*==============================================
     MOSTRAR LOS LIKES
    /*=============================================*/

    static public function mdlShowLikes($tabla, $item, $valor){
        
        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();

        }else{
            $stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt=null;

    }

}