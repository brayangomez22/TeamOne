<!--==============================================
 HEADER 
================================================-->

<?php
    $urlServidor = Route::ctrRouteLearningManagementSystem();
    $urlPresentation = Route::ctrRoutePresentation();
    $urlControlPanel = Route::ctrRouteControlPanel();
?>

<header class="header_area">
    <div class="container">
        <nav>
            <div class="nav-brand">
                <a href="index.html">
                    <img src="<?php echo $url; ?>assets/images/logo.png" alt="">
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
                    <a href="#about" class="nav-link">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a href="#services" class="nav-link">Servicios</a>
                </li>
                <li class="nav-item">
                    <a href="#lms" class="nav-link">Acerca del Lms</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link">Contacto</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $urlPresentation; ?>" target="_blank" class="nav-link">Presentación</a>
                </li>
                
                <?php

                    if(isset($_SESSION["validarSesion"])){

                        $tabla = "usuarios";
                        $item = "email";
                        $valor = $_SESSION["email"];
                    
                        $respuesta = ModelUsers::mdlShowUsers($tabla, $item, $valor);	

                        if($_SESSION["validarSesion"] == "ok"){

                            if($_SESSION["acceso"] == 0){
                                echo '
                                    <li class="nav-item">
                                        <a class="nav-link" href="waitingRoom">lms</a>
                                    </li>  
                                ';
                            }else{
                                echo '
                                    <li class="nav-item">
                                        <a class="nav-link" href="'.$urlServidor.'">lms</a>
                                    </li>  
                                ';
                            }

                            echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="'.$url.'leave">Salir</a>
                                </li>
                            ';

                            if($_SESSION["foto"] != ""){
                                echo '
                                    <li>
                                        <img class="img-circle" src="'.$urlServidor.$_SESSION["foto"].'" style="width:30px;" loading="lazy">
                                    </li>
                                ';
                            }else{
                                echo '
                                <li>
                                    <img style="width:60px;border-radius:50%;" src="'.$url.'assets/images/default/anonymous.jpg" loading="lazy">
                                </li>';
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