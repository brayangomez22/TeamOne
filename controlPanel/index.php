<?php

require_once "controllers/template.controller.php";
require_once "controllers/administrators.controller.php";
require_once "controllers/requestLMS.controller.php";
require_once "controllers/user.controller.php";
require_once "controllers/visits.controller.php";
require_once "controllers/reports.controller.php";
require_once "controllers/testimonials.controller.php";
require_once "controllers/institutions.controller.php";

require_once "models/administrators.model.php";
require_once "models/requestLMS.model.php";
require_once "models/user.model.php";
require_once "models/visits.model.php";
require_once "models/reports.model.php";
require_once "models/testimonials.model.php";
require_once "models/institutions.model.php";

require_once "models/route.php";

$template = new ControllerTemplate();
$template -> ctrShowTemplate();