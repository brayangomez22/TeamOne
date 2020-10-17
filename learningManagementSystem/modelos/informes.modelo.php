<?php

require_once "conexion.php";

class ModeloInformes{

    /*==============================================
     SUBIR TAREAS 
    /*=============================================*/

    static public function mdlSubirTareas($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_institucion, id_usuario, nombreMaestro, email, tituloTarea, materia, descripcion, archivo, grupo) VALUES (:id_institucion, :id_usuario, :nombreMaestro, :email, :tituloTarea, :materia, :descripcion, :archivo, :grupo)");

        $stmt->bindParam(":id_institucion", $datos["id_institucion"], PDO::PARAM_INT);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreMaestro", $datos["nombreMaestro"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":tituloTarea", $datos["tituloTarea"], PDO::PARAM_STR);
        $stmt->bindParam(":materia", $datos["materia"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":archivo", $datos["archivo"], PDO::PARAM_STR);
        $stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt=null;

    }

    /*==============================================
     MOSTRAR LAS TAREAS 
    /*=============================================*/

    static public function mdlMostrarInformes($tabla, $item, $valor, $item2, $valor2){
        
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
        $stmt=null;

    }

    /*==============================================
     EDITAR TAREAS 
    /*=============================================*/

    static public function mdlEditarInformes($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tituloTarea = :tituloTarea, materia = :materia, descripcion = :descripcion, archivo = :archivo, grupo = :grupo WHERE id = :id");

		$stmt -> bindParam(":tituloTarea", $datos["tituloTarea"],PDO::PARAM_STR);
		$stmt->bindParam(":materia", $datos["materia"],PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"],PDO::PARAM_STR);
        $stmt->bindParam(":archivo", $datos["archivo"], PDO::PARAM_STR);
        $stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
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
     ELIMINAR TAREA 
    /*=============================================*/

    static public function mdlEliminarTarea($tabla, $id){

        
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
     MOSTRAR EL TOTAL DE INFORMES 
    /*=============================================*/

    static public function mdlMostrarTotalInformes($tabla, $item, $valor, $item2, $valor2){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
        $stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt=null;

    }

}