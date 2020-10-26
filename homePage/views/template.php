<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php

        session_start();

        /*=============================================
         KEEP THE FIXED ROUTE OF THE PROJECT
		=============================================*/

        $url = Route::ctrRoute();

        echo '<link rel="icon" href="'.$url.'assets/images/logo.png">';

        if(isset($_GET["route"])){

            $routes = explode("/", $_GET["route"]); 

            if($routes[0] == "productQuote" || $routes[0] == "verify" || $routes[0] == "home" || $routes[0] == "signUpLogin" || $routes[0] == "waitingRoom"){

                echo '<title>'.$routes[0].'</title>';

            }else{
                
                echo '<title>404 Error!</title>';

            }

        }

    ?>

    <!--==============================================
     SOURCES  
    ================================================-->

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">

    <!--==============================================
     PLUGINS OF CSS  
    ================================================-->

    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/plugins/sweetalert.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/plugins/hint.css">
    
    <!-- --- ANIMATE Library ----- -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/plugins/animate/animate.css">

    <!--  Owl-carousel css file  -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/plugins/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/plugins/owl-carousel/css/owl.theme.default.min.css">

    <!--==============================================
     CUSTOM CSS
    ================================================-->

    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/header.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/hero.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/about.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/features.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/brand-area.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/services.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/testimonials.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/contact.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/footer.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/signUpLogin.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/responsive.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/prices.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/error404.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/faqs.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/template.css">

    <!--==============================================
     PLUGINS OF JAVASCRIPT  
    ================================================-->

    <script src="<?php echo $url; ?>assets/js/plugins/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $url; ?>assets/js/plugins/popper/dist/popper.min.js"></script>
    <script src="<?php echo $url; ?>assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo $url; ?>assets/js/plugins/sweetalert.min.js"></script>
    <script src="<?php echo $url; ?>assets/js/plugins/drift.js"></script>

    <!-- WOW js Library -->
    <script src="<?php echo $url; ?>assets/js/plugins/wow/wow.min.js"></script>
    
    <!--  Owl-carousel js file  -->
    <script src="<?php echo $url; ?>assets/js/plugins/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="<?php echo $url; ?>assets/js/plugins/knob.jquery.js"></script>

    <!-- Unpkg js Library js Library -->
    <script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
	<script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>

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
   
if(isset($_GET["route"])){

    if($routes[0] == "home"){

        include "modules/header.php";
        include "modules/section.php";
        include "modules/footer.php";

    }else if($routes[0] == "signUpLogin" || $routes[0] == "verify" || $routes[0] == "leave" || $routes[0] == "waitingRoom"){

        include "modules/".$routes[0].".php";

    }else{

        include "modules/error404.php";

    }
    
}else{

    include "modules/header.php";
    include "modules/section.php";
    include "modules/footer.php";

}

?>

<input type="hidden" value="<?php echo $url; ?>" id="hiddenRoute">

<!--==============================================
 CUSTOM JAVASCRIPT  
================================================-->

<script src="<?php echo $url; ?>assets/js/template.js"></script>
<script src="<?php echo $url; ?>assets/js/navigation.js"></script>
<script src="<?php echo $url; ?>assets/js/portfolio.js"></script>
<script src="<?php echo $url; ?>assets/js/contact.js"></script>
<script src="<?php echo $url; ?>assets/js/validations.js"></script>
<script src="<?php echo $url; ?>assets/js/registryUsers.js"></script>
<script src="<?php echo $url; ?>assets/js/visits.js"></script>

</body>
</html>