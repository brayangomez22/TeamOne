<?php
    $url = Ruta::ctrRuta();
?>

<!-- Sidebar user panel -->
<div class="user-panel">
    <div class="pull-left image">
        <?php
        if(isset($_SESSION["validarSesion"])){
            if($_SESSION["modo"] == "directo"){
                if($_SESSION["foto"] != ""){
                    echo '<img src="'.$_SESSION["foto"].'" class="img-circle">';
                }else{
                    echo '<img src="vistas/img/default/anonymous.png" class="img-circle">';
                }                              
            }else{
                echo '<img src="'.$_SESSION["foto"].'" class="img-circle">';	
            }
            
            echo '</div>
            <div class="pull-left info">
                <p>'.$_SESSION["nombre"].'</p>
                <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
            </div>';
        }
    ?>
</div>


<ul class="sidebar-menu" data-widget="tree">
    <li class="header">NAVEGACIÓN PRINCIPAL</li>

    <li class="active"><a href="inicio"><i class="fa fa-home" style="padding-right:8px;"></i><span> Inicio</span></a></li>

    <li class="active"><a href="verPerfil"><i class="fa fa-user" style="padding-right:8px;"></i></i><span> Mi perfil</span></a></li>

    <li>
        <a href="calendario">
            <i class="fa fa-calendar"></i> <span>Calendario</span>
            <span class="pull-right-container">
            <small class="label pull-right bg-red">3</small>
            <small class="label pull-right bg-blue">17</small>
            </span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
        <i class="fa fa-envelope"></i> <span>Buzón</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li>
            <a href="bandeja-de-entrada">Bandeja de entrada
            <span class="pull-right-container">
                <span class="label label-primary pull-right">13</span>
            </span>
            </a>
        </li>
        <li><a href="componer">Componer</a></li>
        <li><a href="enviados">Enviados</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fas fa-info-circle"></i>
            <span>Gestor Informacion</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="gestorComentarios"><i class="fas fa-circle-notch"></i> Publicaciones del colegio</a></li>

            <?php
                if(isset($_SESSION["validarSesion"])){
                    if($_SESSION["validarSesion"] == "ok"){
                        if($_SESSION["labor"] == "estudiante"){
                            echo '
                            <li><a href="infoMaestros"><i class="fas fa-circle-notch"></i> Informes de tus maestros</a></li>';
                        }else{
                            echo '
                            <li><a href="infoMaestros"><i class="fas fa-circle-notch"></i> Mis informes</a></li>';
                        }
                    }
                }
            ?>
            
        </ul>
    </li>

    <li><a href="infoMaestros"><i class="fas fa-table" style="padding-right:8px;"></i> <span>Gestor Asistencias</span></a></li>
    <li><a href="gestorNotas"><i class="fas fa-clipboard" style="padding-right:8px;"></i> <span>Gestor Notas</span></a></li>
    <li><a href="gestorEstudiantes"><i class="fa fa-user" style="padding-right:8px;"></i> <span>Gestor Estudiantes</span></a></li>

</ul>