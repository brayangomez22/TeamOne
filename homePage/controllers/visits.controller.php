<?php

class ControladorVisitas{

    /*==============================================
     GUARDAR IP 
    /*=============================================*/

    static public function ctrEnviarIp($ip, $pais, $codigo){

        $tabla = "visitaspersonas";
        $visita = 1;

        $respuestaInsertarIp = null;
        $respuestaActualizarIp = null;

        if($pais == ""){

            $pais = "Unknown";

        }

        /*==============================================
         BUSCAR IP EXISTENTE 
        /*=============================================*/

        $buscarIpExistente = ModeloVisitas::mdlSeleccionarIp($tabla, $ip);

        if(!$buscarIpExistente){

            /*------- GUARDAR IP NUEVA --------*/

            $respuestaInsertarIp = ModeloVisitas::mdlGuardarNuevaIp($tabla, $ip, $pais, $visita);

        }else{

            /*------- SI LA IP EXISTE Y ES OTRO DIA VOLVERLA A GUARDAR --------*/

            date_default_timezone_set('America/Bogota');
            
            $fechaActual = date('Y-m-d');

            foreach($buscarIpExistente as $key => $value){

                $compararFecha = substr($value["fecha"],0,10);

            }

            if($fechaActual != $compararFecha){

                $respuestaActualizarIp = ModeloVisitas::mdlGuardarNuevaIp($tabla, $ip, $pais, $visita);

            }

        }

        if($respuestaInsertarIp == "ok" || $respuestaActualizarIp == "ok"){

            /*==============================================
			 ACTUALIZAR LAS NOTIFICACIONES DE LAS NUEVAS VISITAS
			/*=============================================*/

			$traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

			$nuevaVisita = $traerNotificaciones["nuevasVisitas"] +1;

			ModeloNotificaciones::mdlActualizarNotificaciones("notificaciones", "nuevasVisitas", $nuevaVisita);

            $tablaPais = "visitaspaises";

            /*==============================================
             SELECCIONAR PAIS 
            /*=============================================*/

            $seleccionarPais = ModeloVisitas::mdlSeleccionarPais($tablaPais, $pais);

            if(!$seleccionarPais){

                /*------- SI NO EXISTE EL PAIS AGREGAR NUEVO PAIS --------*/

                $cantidad = 1;
            
                $insertarPais = ModeloVisitas::mdlInsertarPais($tablaPais, $pais, $codigo, $cantidad);

            }else{

                /*------- SI EXISTE EL PAIS ACTUALIZAR UNA NUEVA VISITA --------*/

                $actualizarCantidad = $seleccionarPais["cantidad"] + 1;

                $actualizarPais = ModeloVisitas::mdlAtualizarPais($tablaPais, $pais, $actualizarCantidad);

            }

        }

    }

    /*==============================================
     MOSTRAR EL TOTAL DE VISITAS 
    /*=============================================*/

    public function ctrMostrarTotalVisitas(){

        $tabla = "visitaspaises";

        $respuesta = ModeloVisitas::mdlMostrarTotalVisitas($tabla);

        return $respuesta;
        
    }

    /*==============================================
     MOSTRAR LOS 6 PRIMEROS PAISES DE VISITAS 
    /*=============================================*/

    public function ctrMostrarPaises(){

        $tabla = "visitaspaises";

        $respuesta = ModeloVisitas::mdlMostrarPaises($tabla);

        return $respuesta;

    }

}