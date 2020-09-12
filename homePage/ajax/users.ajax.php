<?php

require_once "../controllers/user.controller.php";
require_once "../models/user.model.php";

class AjaxUsers{

    /*==============================================
     VALIDAR EMAIL EXISTENTE 
    /*=============================================*/

    public $validateEmail;

    public function ajaxValidateEmail(){

        $data = $this->validateEmail;

        $reply = ControllerUser::ctrMostrarUsuario("email", $data);

        echo json_encode($reply);

    }

    /*==============================================
     REGISTRO CON FACEBOOK 
    /*=============================================*/

    public $email;
    public $nombre;
    public $foto;

    public function ajaxRegistroFacebook(){

        $data = array("nombre"=>$this->nombre,
                                "labor"=>"null",
                                "grupo"=>"null",
                                "email"=>$this->email,
                                "foto"=>$this->foto,
                                "password"=>"null",
                                "modo"=>"facebook",
                                "verificacion"=>0,
                                "emailEncriptado"=>"null");

		$reply = ControllerUser::ctrRegistroRedesSociales($data);

        echo $reply;

    }

}

/*==============================================
 VALIDAR EMAIL EXISTENTE 
/*=============================================*/

if(isset($_POST["validateEmail"])){

    $valEmail = new AjaxUsers();
    $valEmail -> validateEmail = $_POST["validateEmail"];
    $valEmail -> ajaxValidateEmail();

}

/*==============================================
 REGISTRO CON FACEBOOK 
/*=============================================*/

if(isset($_POST["email"])){

	$regFacebook = new AjaxUsers();  
    $regFacebook -> email = $_POST["email"];
    $regFacebook -> nombre = $_POST["nombre"];
    $regFacebook -> foto = $_POST["foto"];
	$regFacebook -> ajaxRegistroFacebook();

}