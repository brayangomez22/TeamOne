<?php

require_once "conexion.php";

class ModeloComentarios{

    /*==============================================
     HACER LA PETICION PARA CREAR LOS COMENTARIOS  
    /*=============================================*/

    static public function mdlPeticionComentarios($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario, nombre, me_gustas, comentarios, foto) VALUES (:id_usuario, :nombre, :me_gustas, :comentarios, :foto)");

        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":me_gustas", $datos["me_gustas"], PDO::PARAM_INT);
        $stmt->bindParam(":comentarios", $datos["comentarios"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt=null;

    }

	/*==============================================
	 MOSTRAR COMENTARIOS 
    /*=============================================*/
    
    static public function mdlMostrarComentarios($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

        $stmt->execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }

	/*==============================================
	 TRAER ID_COMENTARIOS  
    /*=============================================*/
    
    static public function mdlSeleccionarComentario($tabla2, $item, $valor){

        if($item != ""){
        
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla2 WHERE $item = :$item");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
    
            $stmt->execute();
    
            return $stmt->fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla2");
    
            $stmt->execute();
    
            return $stmt->rowCount();

        }

        $stmt->close();

        $stmt = null;

    }

    /*==============================================
     CREAR LAS RESPUESTAS DE LOS COMENTARIOS 
    /*=============================================*/

    static public function mdlRespuestasComentarios($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario, id_comentario, nombre, comentario, foto) VALUES (:id_usuario, :id_comentario, :nombre, :comentario, :foto)");
        
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":id_comentario", $datos["id_comentario"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt=null;

    }

	/*==============================================
	 MOSTRAR TODAS LAS RESPUESTAS DE LOS COMENTARIOS 
    /*=============================================*/
    
    static public function mdlMostrarRespuestasComentarios($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }

    /*==============================================
      ACTUALIZAR LA TABLA DE COMENTARIOS 
    /*=============================================*/

    static public function mdlActualizarTablaComentarios($tabla2, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla2 SET nombre = :nombre, foto = :foto WHERE id_usuario = :id_usuario");

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

    /*==============================================
      ACTUALIZAR LA TABLA DE  RESPUESTAS COMENTARIOS 
    /*=============================================*/

    static public function mdlActualizarTablaRespuestasComentarios($tabla3, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla3 SET nombre = :nombre, foto = :foto WHERE id_usuario = :id_usuario");

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

    /*=============================================
	ELIMINAR LOS COMENTARIOS DEL USUARIO ELIMINADO
	=============================================*/

	static public function mdlEliminarComentarios($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id_usuario");

		$stmt -> bindParam(":id_usuario", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

    }
    
    /*=============================================
	ELIMINAR LAS RESPUESTAS DE LOS COMENTARIOS DEL USUARIO ELIMINADO
	=============================================*/

	static public function mdlEliminarRespuestasComentarios($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id_usuario");

		$stmt -> bindParam(":id_usuario", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

    }

    /*==============================================
     ACTULIZAR LAS RESPUESTAS EN LA TABLA DE COMENTARIOS  
    /*=============================================*/

    static public function mdlActualizarRespuestas($tabla2, $respuestas, $valorNuevoRespuestas, $idComentario, $valorComentario){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla2 SET $respuestas = :$respuestas WHERE $idComentario = :$idComentario");

        $stmt->bindParam(":".$respuestas, $valorNuevoRespuestas, PDO::PARAM_INT);
        $stmt->bindParam(":".$idComentario, $valorComentario, PDO::PARAM_INT);

        if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;


    }

    /*==============================================
     COMPROBAR SI HAY LIKES  
    /*=============================================*/

    static public function mdlComprobarLike($tabla2, $item2, $valor2, $item3, $valor3){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla2 WHERE $item2 = :$item2 AND $item3 = :$item3");

        $stmt->bindParam(":".$item2, $valor2, PDO::PARAM_INT);
        $stmt->bindParam(":".$item3, $valor3, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt -> rowCount();

        $stmt -> close();

        $stmt = null;

    }

   /*==============================================
     INSERTAR EL NUEVO LIKE  
    /*=============================================*/

    static public function mdlInsertarNuevoLike($tabla2, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2 (id_usuario,usuario,id_comentario) values (:id_usuario,:usuario,:id_comentario)");

        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":id_comentario", $datos["id_comentario"], PDO::PARAM_INT);

        if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

    }

    /*==============================================
     ACTUALIZAR LA TABLA DE COMENTARIOS CON EL NUEVO LIKE 
    /*=============================================*/

    static public function mdlActualizarLikeComentarios($tabla3, $meGustas, $valorNuevo, $id, $valor3){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla3 SET $meGustas = :$meGustas WHERE $id = :$id");

        $stmt->bindParam(":".$meGustas , $valorNuevo, PDO::PARAM_INT);
        $stmt->bindParam(":".$id , $valor3, PDO::PARAM_INT);

        if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

    }

    /*=================================================
     ACTUALIZAR LA TABLA DE COMENTARIOS CON EL DECREMENTO DE LIKE 
    /*================================================*/

    static public function mdlActualizarLikeComentarios2($tabla3, $meGustas, $valorNuevo, $id, $valor3){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla3 SET $meGustas = :$meGustas WHERE $id = :$id");

        $stmt->bindParam(":".$meGustas , $valorNuevo, PDO::PARAM_INT);
        $stmt->bindParam(":".$id , $valor3, PDO::PARAM_INT);

        if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

    }

    /*==============================================
     ELIMINAR LIKE DE LA TABLA DE LIKES 
    /*=============================================*/

    static public function mdlEliminarLike($tabla2, $item2, $valor2, $item3, $valor3){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla2 WHERE $item2 = :$item2 AND $item3 = :$item3");
        $stmt->bindParam(":".$item2, $valor2, PDO::PARAM_INT);
        $stmt->bindParam(":".$item3, $valor3, PDO::PARAM_INT);

        if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

    }

    /*==============================================
     TRAER EL LIKE LIKE 
    /*=============================================*/

    static public function mdlMostarLike($tabla3, $id, $valor3){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla3 WHERE $id = :$id");

        $stmt->bindParam(":".$id, $valor3, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;

    }

}