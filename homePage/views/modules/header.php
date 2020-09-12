<?php

$url = Route::ctrRoute();
$urlServidor = Route::ctrRouteLearningManagementSystem();
$urlBlog = Route::ctrRouteBlog();
$urlPresentation = Route::ctrRoutePresentation();

/*=============================================*/
/* USER LOGIN */
/*=============================================*/

if(isset($_SESSION["validarSesion"])){

	if($_SESSION["validarSesion"] == "ok"){

		echo '<script>
		
			localStorage.setItem("usuario","'.$_SESSION["id"].'");

		</script>';

	}

}

/*=============================================*/
/*API OF GOOGLE*/
/*=============================================*/

/*------- CREATE THE GOOGLE API OBJECT  --------*/

$cliente = new Google_Client();
$cliente->setAuthConfig('models/api.json');
$cliente->setAccessType("offline");
$cliente->setScopes(['profile','email']);

/*------- ROUTE TO GOOGLE LOGIN --------*/

$rutaGoogle = $cliente -> createAuthUrl();

/*=============================================
 WE RECEIVED THE GOOGLE GET VARIABLE CALLED CODE
=============================================*/

if(isset($_GET["code"])){

	$token = $cliente->authenticate($_GET["code"]);

	$_SESSION['id_token_google'] = $token;

	$cliente->setAccessToken($token);

}

/*=============================================
 WE RECEIVED GOOGLE'S ENCRYPTED DATA IN AN ARRAY
=============================================*/

if($cliente->getAccessToken()){

    $item = $cliente->verifyIdToken();

    $datos = array("nombre"=>$item["name"],
    "labor"=>"null",
    "grupo"=>"null",
    "email"=>$item["email"],
    "foto"=>$item["picture"],
    "password"=>"null",
    "modo"=>"google",
    "verificacion"=>0,
    "emailEncriptado"=>"null");

	$respuesta = ControladorUsuario::ctrRegistroRedesSociales($datos);

	echo '<script>
		
	setTimeout(function(){

		window.location = localStorage.getItem("rutaActual");

	},100);

 	</script>';
	 
}

?>

<header class="header_area">
    <div class="container">
        <nav>
            <div class="nav-brand">
                <a href="index.html">
                    <img src="<?php echo $url; ?>views/images/logo.png" alt="">
                </a>
            </div>

            <div class="menu-icons open">
                <i class="fas fa-bars"></i>
            </div>

            <ul class="nav-list">
                <div class="menu-icons close">
                    <i class="fas fa-times"></i>
                </div>
                <li class="nav-item">
                    <a href="#" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link">Acerca de</a>
                </li>
                <li class="nav-item">
                    <a href="#portfolio" class="nav-link">Portafolio</a>
                </li>
                <li class="nav-item">
                    <a href="#services" class="nav-link">Servicios</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link">Contacto</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $urlBlog; ?>" target="_blank" class="nav-link">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $urlPresentation; ?>" target="_blank" class="nav-link">Presentación</a>
                </li>
                
                <?php

                    if(isset($_SESSION["validarSesion"])){

                        $tabla = "usuarios";
                        $item = "email";
                        $valor = $_SESSION["email"];
                    
                        $respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);	

                        if($_SESSION["validarSesion"] == "ok"){

                            /*====================================
                             DIRECT MODE 
                            /*===================================*/

                            if($_SESSION["modo"] == "directo"){

                                // if($_SESSION["foto"] != ""){
                                //     echo '<li>
                                //         <img class="img-circle" src="'.$urlServidor.$_SESSION["foto"].'" width="10%" loading="lazy">
                                //     </li>';
                                // }else{
                                //     echo '<li>
                                //         <img class="img-circle" src="'.$url.'views/images/default/anonymous.jpg" loading="lazy">
                                //     </li>';
                                // }
                                
                                echo '
                                <li class="nav-item"><a class="nav-link" href="'.$urlServidor.'">Panel</a></li>  
                                <li class="nav-item"><a class="nav-link" href="'.$url.'salir">Salir</a></li>';

                            }

                            /*====================================
                             MODE FACEBOOK 
                            /*===================================*/
                            
                            if($_SESSION["modo"] == "facebook"){

                                if($respuesta["labor"] == "null"){
                                    echo '
                                    <li>
                                        <img class="img-circle" src="'.$_SESSION["foto"].'" width="10%" loading="lazy">
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#perfil" data-toggle="modal">Panel</a></li>
                                    <li class="nav-item"><a class="nav-link" href="'.$url.'salir" class="salir">Salir</a></li>'; 
                                }else{
                                    // echo '<li>
                                    //     <img class="img-circle" src="'.$_SESSION["foto"].'" width="10%" loading="lazy">
                                    // </li>';
                                    
                                    echo '
                                    <li class="nav-item"><a class="nav-link" href="'.$urlServidor.'">Panel</a></li>
                                    <li class="nav-item"><a class="nav-link" href="'.$url.'salir">Salir</a></li>';

                                }

                            }
                            
                            /*====================================
                             MODE GOOGLE 
                            /*===================================*/

                            if($_SESSION["modo"] == "google"){

                                if($respuesta["labor"] == "null"){
                                    echo '<li>
                                        <img class="img-circle" src="'.$_SESSION["foto"].'" width="10%" loading="lazy">
                                    </li>

                                    <li class="nav-item"><a class="nav-link" href="#perfil" data-toggle="modal">Panel</a></li>
                                    <li class="nav-item"><a class="nav-link" href="'.$url.'salir" class="salir">Salir</a></li>';  
                                }else{
                                    // echo '<li>
                                    //     <img class="img-circle" src="'.$_SESSION["foto"].'" width="10%" loading="lazy">
                                    // </li>';
                                    
                                    echo '
                                    <li class="nav-item"><a class="nav-link" href="'.$urlServidor.'">Panel</a></li>
                                    <li class="nav-item"><a class="nav-link" href="'.$url.'salir">Salir</a></li>';

                                }

                            }

                        }

                    }else{

                        echo '
                        <li class="nav-item"><a href="signUpLogin" class="nav-link">Iniciar sesión</a></li>';

                    }

                ?>      
            </ul>
        </nav>
    </div>
</header>