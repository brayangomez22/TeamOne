<?php

require_once "conexion.php";

class ModeloEmails{

    /*==============================================
     MOSTRAR LOS EMAILS 
    /*=============================================*/

    static public function mdlMostrarEmails($tabla, $item, $valor, $item2, $valor2){
        
        if(($item != null) || ($item2 != null)){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2 ORDER BY id DESC");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->bindParam(":".$item2, $valor2, PDO::PARAM_INT);

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

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_institucion, id_usuario, nombre, labor, para, de, asunto, informacion, archivo, visto) VALUES(:id_institucion, :id_usuario, :nombre, :labor, :para, :de, :asunto, :informacion, :archivo, :visto)");

        $stmt->bindParam(":id_institucion", $datos["id_institucion"], PDO::PARAM_INT);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
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

    /*==============================================
     MOSTRAR EL TOTAL DE EMAILS 
    /*=============================================*/

    static public function mdlMostrarTotalEmails($tabla, $item, $valor, $item2, $valor2){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
        $stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt=null;

    }

}