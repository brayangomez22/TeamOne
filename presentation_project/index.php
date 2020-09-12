<?php

require_once "controllers/template.controller.php";
require_once "controllers/user.controller.php";

require_once "models/user.model.php";

require_once "models/route.php";

$template = new ControllerTemplate();
$template -> template();