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

        $reply = ControllerUser::ctrShowUsers("email", $data);

        echo json_encode($reply);

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