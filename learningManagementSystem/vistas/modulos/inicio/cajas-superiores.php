<!--==============================================
 CAJAS SUPERIORES  
================================================-->

<?php

    $item = "id_institucion";
    $valor = $_SESSION["id_institucion"];

    $item2 = "para";
    $valor2 = $_SESSION["email"];

    $item3 = "grupo";
    $valor3 = $_SESSION["grupo"];

    /*------- MENSAJES --------*/
    $mensajes = ControladorChatGroup::ctrMostrarTotalMensajes($item, $valor);
    $totalMensajes = count($mensajes);

    /*------- EMAILS --------*/
    $emails = ControladorEmails::ctrMostrarTotalEmails($item, $valor, $item2, $valor2);
    $totalEmails = count($emails);

    /*------- TAREAS --------*/
    $tareas = ControladorInformes::ctrMostrarTotalInformes($item, $valor, $item3, $valor3);
    $totalTareas = count($tareas);

    /*------- PUBLICACIONES --------*/
    $traerComentarios = ControladorComentarios::ctrMostrarComentarios($item, $valor);
    $totalComents = count($traerComentarios);

?>

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3><?php echo number_format($totalComents);?></h3>
            <p>Publicaciones de tu colegio</p>
        </div>

        <div class="icon">
            <i class="fa fa-envelope"></i>
        </div>
        <a href="#" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->

<?php
    if($_SESSION["labor"] == "estudiante"){
        echo '
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>'.number_format($totalTareas).'</h3>
                        <p>Nuevas Tareas</p>
                    </div>
            
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a href="#" class="small-box-footer">mas info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        ';
    }

    if($_SESSION["labor"] == "estudiante" || $_SESSION["labor"] == "profesor"){
        echo '
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3> '.number_format($totalMensajes).' </h3>
                        <p>Mensajes de tu grupo</p>
                    </div>
            
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        ';
    }
?>

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
            <h3><?php echo number_format($totalEmails);?></h3>
            <p>Nuevos Emails</p>
        </div>

        <div class="icon">
            <i class="fa fa-envelope"></i>
        </div>
        <a href="#" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->