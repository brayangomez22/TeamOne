<?php

require_once "connection.php";

class ModelUsers{ 

    /*=============================================
	REGISTRO DE USUARIO
    =============================================*/

    public function mdlRegistryUser($table, $data){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(id_institucion, acceso, nombre, labor, grupo, password, email, foto, modo, verificacion, emailEncriptado, session_actual, en_linea) VALUES (:id_institucion, :acceso, :nombre, :labor, :grupo, :password, :email, :foto, :modo, :verificacion, :emailEncriptado, :session_actual, :en_linea)");

        $stmt->bindParam(":id_institucion", $data["id_institucion"], PDO::PARAM_INT);
        $stmt->bindParam(":acceso", $data["acceso"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":labor", $data["labor"], PDO::PARAM_STR);
        $stmt->bindParam(":grupo", $data["grupo"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $data["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":modo", $data["modo"], PDO::PARAM_STR);
        $stmt->bindParam(":verificacion", $data["verificacion"], PDO::PARAM_INT);
        $stmt->bindParam(":emailEncriptado", $data["emailEncriptado"], PDO::PARAM_STR);
        $stmt->bindParam(":session_actual", $data["session_actual"], PDO::PARAM_INT);
        $stmt->bindParam(":en_linea", $data["en_linea"], PDO::PARAM_INT);

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
    
    static public function mdlShowUsers($table, $item, $valor){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;

    }

	/*==============================================
	  ACTULIZAR USUARIO 
    /*=============================================*/
    
    static public function mdlUpdateUser($table, $id, $item, $valor){

        $stmt = Connection::connect()->prepare("UPDATE $table SET $item = :$item WHERE id = :id");
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
    
    static public function mdlActualizarLabor($table, $item1, $valor1, $item2, $valor2, $item3, $valor3){

        $stmt = Connection::connect()->prepare("UPDATE $table SET $item2 = :$item2, $item3 = :$item3 WHERE $item1 = :$item1");
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
    
    static public function mdlActualizarPerfil($table, $data){

        $stmt = Connection::connect()->prepare("UPDATE $table SET nombre = :nombre, email = :email, password = :password, foto = :foto WHERE id = :id");
		$stmt -> bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $data["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $data["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $data["id"], PDO::PARAM_INT);

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

	static public function mdlEliminarUsuario($table, $id){

		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");
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