<?php

/*=============================================
CREADOR DE IP
=============================================*/

//https://www.browserling.com/tools/random-ip

//$ip = $_SERVER['REMOTE_ADDR'];

$ip = "16.63.79.84";

//http://www.geoplugin.net/

$informacionPais = file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip);

$datosPais = json_decode($informacionPais);

$pais = $datosPais->geoplugin_countryName;
$codigo = $datosPais->geoplugin_countryCode;  

$enviarIp = ControladorVisitas::ctrEnviarIp($ip, $pais, $codigo);

$totalVisitas = ControladorVisitas::ctrMostrarTotalVisitas();

?>

<!--=====================================
BREADCRUMB VISITAS
======================================-->
<div class="container well well-sm" style="margin-top: 110px; margin-bottom: 50px; width:100%;">

	<div class="container">
	
		<div class="row">

			<ul class="breadcrumb lead">

			<h2 class="pull-right"><small>Tu eres nuestro visitante # <?php echo $totalVisitas["total"];?></small></h2>

			</ul>

		</div>

	</div>

</div>

<!--=====================================
MÓDULO VISITAS
======================================-->

<div class="container-fluid">
	
	<div class="container">
		
		<div class="row">

            <?php
            
                $paises = ControladorVisitas::ctrMostrarPaises();

                $coloresPaises = array("#09F","#900","#059","#260","#F09","#02A");	

                $indice = -1;

                foreach($paises as $key => $value){

                    $promedio = $value["cantidad"] * 100 / $totalVisitas["total"];

                    $indice++;

                    echo '<div class="col-md-2 col-sm-4 col-xs-12 text-center wow zoomIn delay-700ms">
				
                        <h2 class="text-muted">'.$value["pais"].'</h2>

                        <input type="text" class="knob" value="'.round($promedio).'" data-width="90" data-height="90" data-fgcolor="'.$coloresPaises[$indice].'" data-readonly="true">
    
                        <p class="text-muted text-center" style="font-size:12px"> '.round($promedio).'% de las visitas</p>
        
                    </div>';

                }
            
            ?>

        </div>

    </div>

</div>        