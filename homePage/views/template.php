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

        echo '<link rel="icon" href="'.$url.'views/images/logo.png">';

        if(isset($_GET["route"])){

            $routes = explode("/", $_GET["route"]); 

            if($routes[0] == "productQuote" || $routes[0] == "verify" || $routes[0] == "home" || $routes[0] == "signUpLogin"){

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

    <link rel="stylesheet" href="<?php echo $url; ?>views/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/plugins/sweetalert.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/plugins/hint.css">
    
    <!-- --- ANIMATE Library ----- -->
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/plugins/animate/animate.css">

    <!--  Owl-carousel css file  -->
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/plugins/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/plugins/owl-carousel/css/owl.theme.default.min.css">

    <!--==============================================
     CUSTOM CSS
    ================================================-->

    <link rel="stylesheet" href="<?php echo $url; ?>views/css/header.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/hero.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/about.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/portfolio.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/brand-area.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/services.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/testimonials.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/contact.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/footer.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/signUpLogin.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/responsive.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/template.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/panelPreview.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/error404.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/productQuote.css">

    <!--==============================================
     PLUGINS OF JAVASCRIPT  
    ================================================-->

    <script src="<?php echo $url; ?>views/js/plugins/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $url; ?>views/js/plugins/popper/dist/popper.min.js"></script>
    <script src="<?php echo $url; ?>views/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo $url; ?>views/js/plugins/sweetalert.min.js"></script>
    <script src="<?php echo $url; ?>views/js/plugins/drift.js"></script>

    <!-- WOW js Library -->
    <script src="<?php echo $url; ?>views/js/plugins/wow/wow.min.js"></script>
    
    <!--  Owl-carousel js file  -->
    <script src="<?php echo $url; ?>views/js/plugins/owl-carousel/js/owl.carousel.min.js"></script>

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

    }else if($routes[0] == "signUpLogin" || $routes[0] == "productQuote" || $routes[0] == "verify" || $routes[0] == "leave"){

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

<script src="<?php echo $url; ?>views/js/template.js"></script>
<script src="<?php echo $url; ?>views/js/navigation.js"></script>
<script src="<?php echo $url; ?>views/js/portfolio.js"></script>
<script src="<?php echo $url; ?>views/js/contact.js"></script>
<script src="<?php echo $url; ?>views/js/validations.js"></script>
<script src="<?php echo $url; ?>views/js/registryUsers.js"></script>
<script src="<?php echo $url; ?>views/js/registryFacebook.js"></script>

<!--==============================================
 API OF FACEBOOK
================================================-->

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '252078975819695',
      cookie     : true,
      xfbml      : true,
      version    : 'v6.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

</body>
</html>