<?php
    $url = Ruta::ctrRuta();
    $urlPanel = Ruta::ctrRutaLMS();
?>

<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo $url; ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <img class="logo-mini" src="<?php echo $urlPanel; ?>assets/img/logo.png" alt="" width="40px" height="40px" style="margin:5px -11px;">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Team</b>One</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
   
                <?php
                    include "cabezote/usuario.php";
                ?>

                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
                
            </ul>
        </div>
    </nav>
</header>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Actividad reciente</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)" class="alexmanco">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                    
                        <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Cumpleaños de Brayan</h4>

                        <p>Tendrá 17 años el 08 de diciembre</p>
                        </div>
                    </a>
                </li>
                <li>
                <a href="javascript:void(0)">
                    <i class="menu-icon fa fa-user bg-yellow"></i>

                    <div class="menu-info">
                    <h4 class="control-sidebar-subheading"> Frodo actualizó su perfil</h4>

                    <p>Nuevo teléfono +1(800)555-1234</p>
                    </div>
                </a>
                </li>
                <li>
                <a href="javascript:void(0)">
                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                    <div class="menu-info">
                    <h4 class="control-sidebar-subheading">  Nora se unió a la lista de correo</h4>

                    <p>nora@example.com</p>
                    </div>
                </a>
                </li>
                <li>
                <a href="javascript:void(0)">
                    <i class="menu-icon fa fa-file-code-o bg-green"></i>

                    <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 ejecutado</h4>

                    <p>Tiempo de ejecución 5 segundos</p>
                    </div>
                </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Progreso de tareas</h3>
            <ul class="control-sidebar-menu">
                <li>
                <a href="javascript:void(0)">
                    <h4 class="control-sidebar-subheading">
                    Diseño de plantillas personalizadas
                    <span class="label label-danger pull-right">70%</span>
                    </h4>

                    <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                    </div>
                </a>
                </li>
                <li>
                <a href="javascript:void(0)">
                    <h4 class="control-sidebar-subheading">
                    Reanudar actualización
                    <span class="label label-success pull-right">95%</span>
                    </h4>

                    <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                    </div>
                </a>
                </li>
                <li>
                <a href="javascript:void(0)">
                    <h4 class="control-sidebar-subheading">
                    Integración Laravel
                    <span class="label label-warning pull-right">50%</span>
                    </h4>

                    <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                    </div>
                </a>
                </li>
                <li>
                <a href="javascript:void(0)">
                    <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                    </h4>

                    <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                    </div>
                </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->
        </div>
        <!-- /.tab-pane -->
        
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Contenido de la pestaña de estadísticas</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->

            <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">Configuración general</h3>

                <div class="form-group">
                <label class="control-sidebar-subheading">
                Informe de uso del panel
                    <input type="checkbox" class="pull-right" checked>
                </label>

                <p>
                    Alguna información sobre esta opción de configuración general
                </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                <label class="control-sidebar-subheading">
                    Permitir redireccionamiento de correo
                    <input type="checkbox" class="pull-right" checked>
                </label>

                <p>
                    Hay otros conjuntos de opciones disponibles.
                </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                <label class="control-sidebar-subheading">
                    Exponer el nombre del autor en las publicaciones
                    <input type="checkbox" class="pull-right" checked>
                </label>

                <p>
                    Permitir al usuario mostrar su nombre en publicaciones de blog
                </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Configuraciones de chat</h3>

                <div class="form-group">
                <label class="control-sidebar-subheading">
                    Muéstrame como en línea
                    <input type="checkbox" class="pull-right" checked>
                </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                <label class="control-sidebar-subheading">
                    Desactivar las notificaciones
                    <input type="checkbox" class="pull-right">
                </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                <label class="control-sidebar-subheading">
                    Eliminar el historial de chat
                    <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash"></i></a>
                </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->