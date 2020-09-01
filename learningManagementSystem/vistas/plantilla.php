<?php
  session_start();

  $urlPanel = Ruta::ctrRutaServidor();

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel</title>
  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- bootstrap slider -->
  <link rel="stylesheet" href="vistas/plugins/bootstrap-slider/slider.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="vistas/plugins/iCheck/flat/blue.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

  <!-- jvectormap -->
  <link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap.css">

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="vistas/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- fullCalendar -->
  <link rel="stylesheet" href="vistas/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="vistas/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

  <!--=====================================
  CSS PERSONALIZADO
  ======================================-->

  <link rel="stylesheet" href="vistas/css/editarPerfil.css">
  <link rel="stylesheet" href="vistas/css/style.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- jQuery Knob Chart -->
  <script src="vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

  <!-- jvectormap -->
  <script src="vistas/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>  
  <script src="vistas/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

  <!------- JQUERY UI -------->
  <script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>

  <!-- SweetAlert 2 https://sweetalert2.github.io/-->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

  <!-- DataTables https://datatables.net/-->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- iCheck -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

  <!-- Bootstrap WYSIHTML5 -->
  <script src="vistas/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  
  <!------- ckeditor -------->
  <script src="vistas/bower_components/ckeditor/ckeditor.js"></script>

  <!-- fullCalendar -->
  <script src="vistas/bower_components/moment/moment.js"></script>
  <script src="vistas/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

  <!-- Bootstrap slider -->
  <script src="vistas/plugins/bootstrap-slider/bootstrap-slider.js"></script>
  
  <!-- Moment -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/locale/es.js"></script>

  <!-- Slimscroll -->
  <script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">

  <!------- FONT AWESOME -------->
  <script src="https://kit.fontawesome.com/f3ce059db3.js" crossorigin="anonymous"></script>

</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini"> 

<?php

  if(isset($_SESSION["validarSesion"]) && $_SESSION["validarSesion"] === "ok"){

    echo '<div class="wrapper">';

    /*=============================================
      CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
      LATERAL
    =============================================*/

    include "modulos/lateral.php";

    /*=============================================
    CONTENIDO
    =============================================*/

    if(isset($_GET["ruta"])){

      if($_GET["ruta"]== "inicio" ||
        $_GET["ruta"]== "salir" ||
        $_GET["ruta"] == "gestorComentarios" ||
        $_GET["ruta"] == "verPerfil" ||
        $_GET["ruta"] == "calendario" ||
        $_GET["ruta"] == "bandeja-de-entrada" ||
        $_GET["ruta"] == "componer" ||
        $_GET["ruta"] == "enviados" ||
        $_GET["ruta"] == "gestorEstudiantes" ||
        $_GET["ruta"] == "infoMaestros" ||
        $_GET["ruta"] == "gestorNotas"){

        include "modulos/".$_GET["ruta"].".php";

      }else{
        include "modulos/error404.php";
      }

    }else{

      include "modulos/inicio.php";

    }

    /*=============================================
      FOOTER
    =============================================*/
    include "modulos/footer.php";

    echo '</div>';

  }

?>

<input type="hidden" value="<?php echo $urlPanel; ?>" id="rutaOculta">

<!--==============================================
 JAVASCRIPT PERSONALIZADO   
================================================-->
  
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/gestorPerfil.js"></script>
<script src="vistas/js/gestorInformes.js"></script>
<script src="vistas/js/gestorComentarios.js"></script>
<script src="vistas/js/gestorEmails.js"></script>
<script src="vistas/js/gestorEnviados.js"></script>
<script src="vistas/js/gestorNotas.js"></script>
<script src="vistas/js/charla.js"></script>

</body>
</html>