<?php

require_once "connection.php";

class ModeloCodigo{

    static public function mdlMostrarCodigo($tabla){

        $stmt = Connection::connect()->prepare("SELECT * FROM $tabla");
    
        $stmt->execute();
    
        return $stmt->fetch();
    
        $stmt->close();
    
        $stmt = null;
    
    }

}