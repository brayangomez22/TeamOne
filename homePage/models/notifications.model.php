<?php

require_once "connection.php";

class ModeloNotificaciones{

    /*==============================================
     MOSTRAR NOTIFICACIONES 
    /*=============================================*/

    static public function mdlMostrarNotificaciones($tabla){

        $stmt = Connection::connect()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;

    }

    //=============================================
    // ACTUALIZAR NOTIFICACIONES 
    //=============================================

    static public function mdlActualizarNotificaciones($tabla, $item, $valor){

        $stmt = Connection::connect()->prepare("UPDATE $tabla SET $item = :$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;

    }

}