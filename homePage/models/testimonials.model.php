<?php

require_once "connection.php";

class ModelTestimonials{

    /*==============================================
     MOSTRAR TODOS LOS TESTIMONIOS  
    /*=============================================*/

    static public function mdlShowTestimonials($table){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY id DESC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt=null;

    }

}