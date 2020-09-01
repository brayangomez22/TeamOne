<?php

require_once "controllers/template.controller.php";

require_once "controllers/user.controller.php";
require_once "controllers/code.controller.php";

require_once "models/user.model.php";
require_once "models/code.model.php";

require_once "models/route.php";

require_once "extensions/PHPMailer/PHPMailerAutoload.php";
require_once "extensions/vendor/autoload.php";

$template = new ControllerTemplate();
$template -> template();