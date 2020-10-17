<!--==============================================
 LEFT SIDE COLUMN. CONTAINS THE LOGO AND SIDEBAR 
================================================-->
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="<?php echo $_SESSION["foto"]; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p><?php echo $_SESSION["nombre"]; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVEGACIÓN PRINCIPAL</li>
            <li class="active menu-open">
                <a href="home">
                    <i class="fa fa-dashboard"></i> <span>Tablero</span>
                </a>
            </li>

            <?php
                if($_SESSION["perfil"] == "administrador"){
                    echo '
                        <li>
                            <a href="requestLMS"><i class="fa fa-table"></i> Gestor Solicitudes LMS</a>
                        </li>
                    ';
                }
            ?>

            <li>
                <a href="visitsManager"><i class="fa fa-map-marker"></i> <span>Gestor Visitas</span></a>
            </li>

            <li>
                <a href="institutionsManager"><i class="fa fa-table"></i> <span>Gestor Instituciones</span></a>
            </li>

            <li>
                <a href="testimonials"><i class="fa fa-users"></i> <span>Gestor Testimonios</span></a>
            </li>

            <li>
                <a href="users"><i class="fa fa-users"></i> <span>Gestor Usuarios</span></a>
            </li>

            <?php
                if($_SESSION["perfil"] == "administrador"){
                    echo '
                        <li>
                            <a href="profiles"><i class="fa fa-key"></i> <span>Gestor Perfiles</span></a>
                        </li>
                    ';
                }
            ?>
        </ul>
    </section>
</aside>