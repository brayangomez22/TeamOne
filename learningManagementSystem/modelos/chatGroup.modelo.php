<?php

require_once "conexion.php";

class ModeloChatGroup{

    /*==============================================
     CREATE COMMENT 
    /*=============================================*/

    static public function mdlCrearComentario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, foto, informacion, grupo, id_usuario, id_institucion) VALUES(:nombre, :foto, :informacion, :grupo, :id_usuario, :id_institucion)");

        $stmt->bindParam(":nombre", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["photo"], PDO::PARAM_STR);
        $stmt->bindParam(":informacion", $datos["comment"], PDO::PARAM_STR);
        $stmt->bindParam(":grupo", $datos["group"], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":id_institucion", $datos["idInstitucion"], PDO::PARAM_INT);

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

    static public function mdlMostrarChatGroup($tabla, $item, $valor, $item2, $valor2){

        if($item != ""){
        
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->bindParam(":".$item2, $valor2, PDO::PARAM_INT);

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

    /*==============================================
     MOSTRAR EL TOTAL DE MENSAJES 
    /*=============================================*/

    static public function mdlMostrarTotalMensajes($tabla, $item, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt=null;

    }

    /*==============================================
	 ACTUALIZAR DATOS DEL USUARIO 
    /*=============================================*/
    
    static public function mdlActualizarPerfil($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, foto = :foto WHERE id_usuario = :id_usuario");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_usuario", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt-> close();
		$stmt = null;

    }

}