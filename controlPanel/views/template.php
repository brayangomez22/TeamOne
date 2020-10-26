<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php
      $url = Route::ctrRouteControlPanel();
      $urlHomePage = Route::ctrRoute();

      echo '<link rel="icon" href="'.$urlHomePage.'assets/images/logo.png">';
    ?>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/bower_components/Ionicons/css/ionicons.min.css">

    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/dist/css/skins/_all-skins.min.css">

    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/bower_components/morris.js/morris.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/plugins/iCheck/flat/blue.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!--==============================================
      PLUGINS JAVASCRIPT
    ================================================-->

    <script src="<?php echo $url; ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo $url; ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo $url; ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- SweetAlert 2 -->
    <script src="<?php echo $url; ?>assets/plugins/sweetalert2/sweetalert2.all.js"></script>

    <script src="<?php echo $url; ?>assets/bower_components/raphael/raphael.min.js"></script>
    <script src="<?php echo $url; ?>assets/bower_components/morris.js/morris.min.js"></script>
    <script src="<?php echo $url; ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo $url; ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <script src="<?php echo $url; ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="<?php echo $url; ?>assets/bower_components/moment/min/moment.min.js"></script>
    <script src="<?php echo $url; ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo $url; ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo $url; ?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?php echo $url; ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

    <script src="<?php echo $url; ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo $url; ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- iCheck http://icheck.fronteed.com/-->
    <script src="<?php echo $url; ?>assets/plugins/iCheck/icheck.min.js"></script>

    <!-- DataTables -->
    <script src="<?php echo $url; ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $url; ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo $url; ?>assets/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo $url; ?>assets/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

    <script src="<?php echo $url; ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo $url; ?>assets/bower_components/Chart.js/Chart.js"></script>
    <script src="<?php echo $url; ?>assets/dist/js/pages/dashboard2.js"></script>
    <script src="<?php echo $url; ?>assets/dist/js/demo.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">

<?php

if(isset($_SESSION["validateSession"]) && $_SESSION["validateSession"] === "ok"){

  echo '
    <div class="wrapper">';
      include "modules/header.php";
      include "modules/aside.php";

        if(isset($_GET["route"])){

          if($_GET["route"] == "home"){
            include "modules/contentWrapper.php";
          }else if($_GET["route"] == "requestLMS" || $_GET["route"] == "profiles" || $_GET["route"] == "visitsManager" || $_GET["route"] == "users" || $_GET["route"] == "leave" || $_GET["route"] == "testimonials" || $_GET["route"] == "institutionsManager"){
            include "modules/".$_GET["route"].".php";
          }else{
            include "modules/404.php";
          }
        
        }else{
          include "modules/contentWrapper.php";
        } 

      include "modules/footer.php";
      include "modules/controlSidebar.php";
    '</div>
  ';  

}else{

  include "modules/login.php";

}

?>

<!--==============================================
 CUSTOM JAVASCRIPT  
================================================-->

<script src="<?php echo $url; ?>assets/dist/js/administratorsManager.js"></script>
<script src="<?php echo $url; ?>assets/dist/js/requestsLMS.js"></script>
<script src="<?php echo $url; ?>assets/dist/js/visitsManager.js"></script>
<script src="<?php echo $url; ?>assets/dist/js/usersManager.js"></script>
<script src="<?php echo $url; ?>assets/dist/js/testimonialsManager.js"></script>
<script src="<?php echo $url; ?>assets/dist/js/institutionsManager.js"></script>
<script src="<?php echo $url; ?>assets/dist/js/template.js"></script>

</body>
</html>