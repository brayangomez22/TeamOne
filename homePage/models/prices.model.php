<?php

require_once "connection.php";

class ModelPrices{

    /*==============================================
      
    /*=============================================*/

    static public function mdlPrices($table, $data){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(id_usuario, id_institucion, nombre, labor, mensaje) VALUES(:id_usuario, :id_institucion, :nombre, :labor, :mensaje)");

        $stmt -> bindParam(":id_usuario", $data["id_usuario"], PDO::PARAM_INT);
        $stmt -> bindParam(":id_institucion", $data["id_institucion"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":labor", $data["labor"], PDO::PARAM_STR);
        $stmt -> bindParam(":mensaje", $data["mensaje"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt=null;

    }

}