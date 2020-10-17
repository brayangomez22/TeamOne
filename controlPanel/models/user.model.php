<?php

require_once "connection.php";

class ModelUser{

    /*==============================================
     SHOW USERS 
    /*=============================================*/

    static public function mdlShowUsers($table, $item, $value){

        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
            $stmt->bindParam(":".$item, $value, PDO::PARAM_STR);

            $stmt->execute();
            return $stmt->fetch();

        }else{

            $stmt = Connection::connect()->prepare("SELECT * FROM $table");
            $stmt->execute();
            return $stmt->fetchAll();

        }

        $stmt->close();
        $stmt = null;

    }

    /*==============================================
     ACTIVAR USUARIOS 
	/*=============================================*/
	
	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

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
     MOSTRAR EL TOTAL DE USUARIOS 
    /*=============================================*/

    static public function mdlMostrarTotalUsuarios($tabla, $orden){

        $stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt=null;

    }

}