<?php

require_once "connection.php";

class ModeloTestimonios{

    /*==============================================
     MOSTRAR LOS SERVICIOS 
    /*=============================================*/

    static public function mdlMostrarTestimonios($tabla, $item, $valor){
        
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
     CREAR SERVICIOS 
    /*=============================================*/

    static public function mdlCrearTestimonio($tabla, $datos){

        $stmt = Connection::connect()->prepare("INSERT INTO $tabla(imgTestimonio,nombreTestimonio,opinionTestimonio) VALUES (:imgTestimonio,:nombreTestimonio,:opinionTestimonio)");

        $stmt->bindParam(":imgTestimonio", $datos["imgTestimonio"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreTestimonio", $datos["nombreTestimonio"], PDO::PARAM_STR);
        $stmt->bindParam(":opinionTestimonio", $datos["opinionTestimonio"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt=null;

    }

    /*==============================================
     EDITAR SERVICIO 
    /*=============================================*/

    static public function mdlEditarTestimonio($tabla, $datos){

        $stmt = Connection::connect()->prepare("UPDATE $tabla SET imgTestimonio = :imgTestimonio, nombreTestimonio = :nombreTestimonio, opinionTestimonio = :opinionTestimonio WHERE id = :id");

		$stmt -> bindParam(":imgTestimonio", $datos["imgTestimonio"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreTestimonio", $datos["nombreTestimonio"], PDO::PARAM_STR);
        $stmt->bindParam(":opinionTestimonio", $datos["opinionTestimonio"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

    }

    /*==============================================
     ELIMINAR SERVICIO 
    /*=============================================*/

    static public function mdlEliminarTestimonio($tabla, $id){

        $stmt = Connection::connect()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";
            
        }

        $stmt->close();
        $stmt=null;

    }

}