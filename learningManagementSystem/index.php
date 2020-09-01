<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/comentarios.controlador.php";
require_once "controladores/usuario.controlador.php";
require_once "controladores/informes.controlador.php";
require_once "controladores/emails.controlador.php";
require_once "controladores/notas.controlador.php";
require_once "controladores/chatGroup.controlador.php";

require_once "modelos/comentarios.modelo.php";
require_once "modelos/usuario.modelo.php";
require_once "modelos/informes.modelo.php";
require_once "modelos/emails.modelo.php";
require_once "modelos/notas.modelos.php";
require_once "modelos/chatGroup.modelo.php";

require_once "modelos/ruta.php";

$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();