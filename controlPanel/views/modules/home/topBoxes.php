<!--==============================================
 TOP BOXES 
================================================-->

<?php

    $solicitudes = ControllerRequestLMS::ctrMostrarTotalSolicitudes("id");
    $totalSolicitudes = count($solicitudes);

    $visitas = ControladorVisitas::ctrMostrarTotalVisitas();

    $usuarios = ControllerUser::ctrMostrarTotalUsuarios("id");
    $totalUsuarios = count($usuarios);

?>

<div class="col-md-4">
    <div class="info-box">
    <span class="info-box-icon bg-yellow"><i class="iion ion-pie-graph"></i></span>

    <div class="info-box-content">
        <span class="info-box-text">Solicitudes LMS</span>
        <span class="info-box-number"><?php echo number_format($totalSolicitudes)?></span>
    </div>
    </div>
</div>

<div class="clearfix visible-sm-block"></div>

<div class="col-md-4">
    <div class="info-box">
    <span class="info-box-icon bg-green"><i class="ion ion-pie-graph"></i></span>

    <div class="info-box-content">
        <span class="info-box-text">Nuevas Visitas</span>
        <span class="info-box-number"><?php echo number_format($visitas["total"])?></span>
    </div>
    </div>
</div>

<div class="col-md-4">
    <div class="info-box">
    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

    <div class="info-box-content">
        <span class="info-box-text">Usuarios Registrados</span>
        <span class="info-box-number"><?php echo number_format($totalUsuarios)?></span>
    </div>
    </div>
</div>