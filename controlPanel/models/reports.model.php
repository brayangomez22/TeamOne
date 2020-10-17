<?php

require_once "connection.php";

class ModeloReportes{

    /*==============================================
     DESCARGAR REPORTE EN EXCEL  
    /*=============================================*/

    static public function mdlDescargarReporte($tabla){

        $stmt = Connection::connect()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }

}