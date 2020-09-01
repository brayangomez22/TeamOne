<?php

require_once "conexion.php";

class ModeloEmails{

    /*==============================================
     MOSTRAR LOS EMAILS 
    /*=============================================*/

    static public function mdlMostrarEmails($tabla, $item, $valor){
        
        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();

        }

		$stmt->close();
		$stmt = null;

    }

    /*==============================================
     CREAR EMAILS 
    /*=============================================*/

    static public function mdlCrearEmail($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, labor, para, de, asunto, informacion, archivo, visto) VALUES(:nombre, :labor, :para, :de, :asunto, :informacion, :archivo, :visto)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":labor", $datos["labor"], PDO::PARAM_STR);
        $stmt->bindParam(":para", $datos["para"], PDO::PARAM_STR);
        $stmt->bindParam(":de", $datos["de"], PDO::PARAM_STR);
        $stmt->bindParam(":asunto", $datos["asunto"], PDO::PARAM_STR);
        $stmt->bindParam(":informacion", $datos["informacion"], PDO::PARAM_STR);
        $stmt->bindParam(":archivo", $datos["archivo"], PDO::PARAM_STR);
        $stmt->bindParam(":visto", $datos["visto"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt=null;

    }

    /*==============================================
     EDITAR EMAILS 
    /*=============================================*/

    static public function mdlEditarEmails($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET para = :para, informacion = :informacion, archivo = :archivo WHERE id = :id");

		$stmt->bindParam(":para", $datos["para"],PDO::PARAM_STR);
        $stmt->bindParam(":informacion", $datos["informacion"], PDO::PARAM_STR);
        $stmt->bindParam(":archivo", $datos["archivo"], PDO::PARAM_STR);
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
     ELIMINAR EMAIL 
    /*=============================================*/

    static public function mdlEliminarEmail($tabla, $id){
        
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();
		$stmt = null;


    }

    /*==============================================
     ESTRELLAS 
    /*=============================================*/

    static public function mdlActualizarEstrella($tabla, $item, $valor, $valor2){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET visto = :visto WHERE $item = :$item");

        $stmt -> bindParam(":visto", $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

        if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();
        $stmt = null;
        
    }

}