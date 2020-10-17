<?php
    $urlPanel = Ruta::ctrRutaLMS();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Gestor Estudiantes
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

                $item2 = "id_institucion";
                $valor2 = $_SESSION["id_institucion"];

                $alumnos = ControladorUsuarios::ctrMostrarTotalUsuarios($item, $valor, $item2, $valor2, "fecha");

                foreach($alumnos as $key => $value){
                    if($value["id"] != $_SESSION["id"]){
                        echo '
                        <div class="col-md-3 col-sm-6 mt-5">
                            <div class="our-team">
                                <div class="pic">';
                                    if($value["foto"] != ""){
                                        echo '<img src="'.$value["foto"].'" alt="">';
                                    }else{
                                        echo '<img src="assets/img/default/anonymous.jpg" alt="">';
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
                }
            ?>
        </div>
    </section>
</div>