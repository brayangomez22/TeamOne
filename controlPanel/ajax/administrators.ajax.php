<?php

require_once "../controllers/administrators.controller.php";
require_once "../models/administrators.model.php";

class AjaxAdministrators{

	/*=============================================
	ACTIVATE PROFILE
	=============================================*/	

	public $activateProfile;
	public $activateId;

	public function ajaxActivateProfile(){

		$tabla = "administradores_cp";

		$item1 = "estado";
		$valor1 = $this->activateProfile;

		$item2 = "id";
		$valor2 = $this->activateId;

		$reply = ModelAdministrator::mdlUpdateProfile($tabla, $item1, $valor1, $item2, $valor2);

		echo $reply;

	}

	/*=============================================
	EDIT PROFILE
	=============================================*/	

	public $idProfile;

	public function ajaxEditProfile(){

		$item = "id";
		$valor = $this->idProfile;

		$reply = ControllerAdministrator::ctrShowAdministrator($item, $valor);

		echo json_encode($reply);

	}

}

/*=============================================
ACTIVATE PROFILE
=============================================*/	

if(isset($_POST["activateProfile"])){

	$activateProfile = new AjaxAdministrators();
	$activateProfile -> activateProfile = $_POST["activateProfile"];
	$activateProfile -> activateId = $_POST["activateId"];
	$activateProfile -> ajaxActivateProfile();

}

/*=============================================
EDIT PROFILE
=============================================*/
if(isset($_POST["idProfile"])){

	$edit = new AjaxAdministrators();
	$edit -> idProfile = $_POST["idProfile"];
	$edit -> ajaxEditProfile();

}