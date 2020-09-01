<?php

require_once "conexion.php";

class ModeloChatGroup{

    /*==============================================
     CREATE COMMENT 
    /*=============================================*/

    static public function mdlCrearComentario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, foto, informacion, grupo, id_usuario) VALUES(:nombre, :foto, :informacion, :grupo, :id_usuario)");

        $stmt->bindParam(":nombre", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["photo"], PDO::PARAM_STR);
        $stmt->bindParam(":informacion", $datos["comment"], PDO::PARAM_STR);
        $stmt->bindParam(":grupo", $datos["group"], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos["id"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt=null;

    }

    /*==============================================
     SELECT CHAT_GROUP 
    /*=============================================*/

    static public function mdlMostrarChatGroup($tabla, $item, $valor){

        if($item != ""){
        
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
    
            $stmt->execute();
    
            return $stmt->fetchAll();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    
            $stmt->execute();
    
            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;

    }

}