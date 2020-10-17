<?php

require_once "../../controllers/reports.controller.php";
require_once "../../models/reports.model.php";

$reportes = new ControladorReportes();
$reportes -> ctrDescargarReportes();