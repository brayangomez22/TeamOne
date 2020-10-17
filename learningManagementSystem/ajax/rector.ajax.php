<?php

require_once "../modelos/usuario.modelo.php";

class AjaxAdministrators{

	/*=============================================
	ACTIVATE PROFILE
	=============================================*/	

	public $activateProfile;
	public $activateId;

	public function ajaxActivateProfile(){

		$tabla = "usuarios";

		$item1 = "acceso";
		$valor1 = $this->activateProfile;

		$item2 = "id";
		$valor2 = $this->activateId;

		$reply = ModeloUsuarios::mdlUpdateUser($tabla, $item1, $valor1, $item2, $valor2);

		echo $reply;

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