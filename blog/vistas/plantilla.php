<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blooger</title>

    <?php
        $urlBlog = Ruta::ctrRutaBlog();
    ?>

    <link rel="icon" href="<?php echo $urlBlog; ?>vistas/images/logo.png">

    <!--==============================================
     PLUGINS OF CSS  
    ================================================-->

    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="<?php echo $urlBlog; ?>vistas/css/plugins/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $urlBlog; ?>vistas/css/plugins/owl.theme.default.min.css">
    <!-- AOS Library -->
    <link rel="stylesheet" href="<?php echo $urlBlog; ?>vistas/css/plugins/aos.css">

    <!--==============================================
     CUSTOM CSS
    ================================================-->   

    <link rel="stylesheet" href="<?php echo $urlBlog; ?>vistas/css/header.css">
    <link rel="stylesheet" href="<?php echo $urlBlog; ?>vistas/css/site-title.css">
    <link rel="stylesheet" href="<?php echo $urlBlog; ?>vistas/css/blog-carousel.css">
    <link rel="stylesheet" href="<?php echo $urlBlog; ?>vistas/css/site-content.css">
    <link rel="stylesheet" href="<?php echo $urlBlog; ?>vistas/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo $urlBlog; ?>vistas/css/footer.css">
    <link rel="stylesheet" href="<?php echo $urlBlog; ?>vistas/css/responsive.css">
    <link rel="stylesheet" href="<?php echo $urlBlog; ?>vistas/css/template.css">

    <!--==============================================
     PLUGINS OF JAVASCRIPT  
    ================================================-->

    <script src="<?php echo $urlBlog; ?>vistas/js/Jquery3.4.1.min.js"></script>
    <script src="<?php echo $urlBlog; ?>vistas/js/owl.carousel.min.js"></script>
    <script src="<?php echo $urlBlog; ?>vistas/js/aos.js"></script>

    <!--==============================================
     SCRIPT OF FONT AWESOME  
    ================================================-->

    <script src="https://kit.fontawesome.com/f3ce059db3.js" crossorigin="anonymous"></script>

</head>

<body>

<?php

/*==============================================
 WHITE LIST OF URLS FRIENDLY 
/*=============================================*/
   
if(isset($_GET["ruta"])){

    if($rutas[0] == "verificar" || $rutas[0] == "salir"){

        include "modulos/header.php";
        include "modulos/".$rutas[0].".php";
        include "modulos/footer.php";

    }else if($rutas[0] == "inicio"){

        include "modulos/header.php";
        include "modulos/section.php";
        include "modulos/footer.php";

    }else if($rutas[0] == "signUpLogin"){

        include "modulos/".$rutas[0].".php";

    }else{

        include "modulos/error404.php";

    }
    
}else{

    include "modulos/header.php";
    include "modulos/section.php";
    include "modulos/footer.php";

}

?>


<!--==============================================
 CUSTOM JAVASCRIPT  
================================================-->

<!-- Custom Javascript file -->
<script src="<?php echo $urlBlog; ?>vistas/js/main.js"></script>

</body>

</html>