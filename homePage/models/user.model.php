<?php

require_once "connection.php";

class ModeloUsuarios{ 

    /*=============================================
	REGISTRO DE USUARIO
    =============================================*/

    public function mdlRegistroUsuario($tabla, $datos){

        $stmt = Connection::connect()->prepare("INSERT INTO $tabla(nombre, password, email, foto, modo, verificacion, emailEncriptado, labor) VALUES (:nombre, :password, :email, :foto, :modo, :verificacion, :emailEncriptado, :labor)");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":labor", $datos["labor"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":modo", $datos["modo"], PDO::PARAM_STR);
        $stmt->bindParam(":verificacion", $datos["verificacion"], PDO::PARAM_INT);
        $stmt->bindParam(":emailEncriptado", $datos["emailEncriptado"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt = null;

    }

	/*==============================================
	 MOSTRAR USUARIOS 
    /*=============================================*/
    
    static public function mdlMostrarUsuario($tabla, $item, $valor){

        $stmt = Connection::connect()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;

    }

	/*==============================================
	  ACTULIZAR USUARIO 
    /*=============================================*/
    
    static public function mdlActualizarUsuario($tabla, $id, $item, $valor){

        $stmt = Connection::connect()->prepare("UPDATE $tabla SET $item = :$item WHERE id = :id");
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt = null;

    }

	/*==============================================
	 ACTUALIZAR CAMPO DE LABOR PARA EL MODO FACEBOOK Y GOOGLE 
    /*=============================================*/
    
    static public function mdlActualizarLabor($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3){

        $stmt = Connection::connect()->prepare("UPDATE $tabla SET $item2 = :$item2, $item3 = :$item3 WHERE $item1 = :$item1");
        $stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
        $stmt->bindParam(":".$item3, $valor3, PDO::PARAM_STR);
        $stmt->bindParam(":".$item1, $valor1, PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt=null;

    }

	/*==============================================
	 ACTUALIZAR DATOS DEL USUARIO 
    /*=============================================*/
    
    static public function mdlActualizarPerfil($tabla, $datos){

        $stmt = Connection::connect()->prepare("UPDATE $tabla SET nombre = :nombre, email = :email, password = :password, foto = :foto WHERE id = :id");
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt-> close();
		$stmt = null;

    }

	/*=============================================
	ELIMINAR USUARIO
	=============================================*/

	static public function mdlEliminarUsuario($tabla, $id){

		$stmt = Connection::connect()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt-> close();
		$stmt = null;

	}

}