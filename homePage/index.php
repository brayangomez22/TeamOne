<?php

require_once "controllers/template.controller.php";

require_once "controllers/user.controller.php";
require_once "controllers/prices.controller.php";
require_once "controllers/visits.controller.php";
require_once "controllers/notifications.controller.php";
require_once "controllers/testimonials.controller.php";

require_once "models/user.model.php";
require_once "models/prices.model.php";
require_once "models/visits.model.php";
require_once "models/notifications.model.php";
require_once "models/testimonials.model.php";

require_once "models/route.php";

require_once "extensions/PHPMailer/PHPMailerAutoload.php";
require_once "extensions/vendor/autoload.php";

$template = new ControllerTemplate();
$template -> template();