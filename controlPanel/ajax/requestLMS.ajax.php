<?php

require_once "../models/requestLMS.model.php";

class AjaxRequestsLMS{

	/*=============================================
	 ACTIVATE LMS
	=============================================*/	

	public $accessStatus;
	public $activateId;

	public function ajaxActivateLMS(){

		$table = "usuarios";

		$item1 = "acceso";
		$value1 = $this->accessStatus;

		$item2 = "id";
		$value2 = $this->activateId;

		$reply = ModelRequestLMS::mdlUpdateAccessUser($table, $item1, $value1, $item2, $value2);

		echo $reply;

	}

}

/*=============================================
ACTIVATE LMS
=============================================*/	

if(isset($_POST["accessStatus"])){

	$activateLMS = new AjaxRequestsLMS();
	$activateLMS -> accessStatus = $_POST["accessStatus"];
	$activateLMS -> activateId = $_POST["activateId"];
	$activateLMS -> ajaxActivateLMS();

}