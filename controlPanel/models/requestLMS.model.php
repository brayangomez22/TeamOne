<?php

require_once "connection.php";

class ModelRequestLMS{

    /*==============================================
     MOSTRAR LOS SERVICIOS 
    /*=============================================*/

    static public function mdlShowRequests($tabla, $item, $valor){
        
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

    /*=============================================
	ACTIVATE LMS
	=============================================*/	

	static public function mdlUpdateAccessUser($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Connection::connect()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}

		$stmt -> close();
		$stmt = null;

    }
    
    /*==============================================
     MOSTRAR EL TOTAL DE SOLICITUDES 
    /*=============================================*/

    static public function mdlMostrarTotalSolicitudes($tabla, $orden){

        $stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt=null;

    }

}