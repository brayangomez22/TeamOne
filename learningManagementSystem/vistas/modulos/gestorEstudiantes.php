<?php
    $urlPanel = Ruta::ctrRutaServidor();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Gestor Estudiantes
        <small>Panel de Control</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
        <li class="active">Estudiantes</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <?php

                $item = "grupo";
                $valor = $_SESSION["grupo"];

                $alumnos = ControladorUsuarios::ctrMostrarTotalUsuarios($item, $valor, "fecha");

                foreach($alumnos as $key => $value){
                    echo '
                    <div class="col-md-3 col-sm-6 mt-5">
                        <div class="our-team">
                            <div class="pic">';
                                if($value["foto"] != ""){
                                    echo '<img src="'.$value["foto"].'" alt="">';
                                }else{
                                    echo '<img src="vistas/img/default/anonymous.png" alt="">';
                                }
                            echo '</div>
                            <div class="team-content">
                                <h3 class="title">'.$value["nombre"].'</h3>  
                                <span class="sub">'.$value["labor"].'</span>
                            </div>
                            <ul class="social">
                                <li><a href="#" ><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" ><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" ><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#" ><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>';
                }
            ?>
        </div>
    </section>
</div>