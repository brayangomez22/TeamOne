<?php

/*==============================================
 FUNCION DE FECHA 
/*=============================================*/

function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

	$dia = date('d', $timestamp);

	// -1 porque los meses en la funcion date empiezan desde el 1
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = $dia . ' de ' . $meses[$mes] . ' del ' . $year;
	
	/*==============================================
	 HORA, MINUTOS 
	/*=============================================*/

	$hm =  date('g:i a', strtotime($fecha));

	return $fecha . " --- " . $hm;

}