<!--==============================================
 SIGN UP AND LOGIN  
================================================-->

<?php

    $url = Route::ctrRoute();
    $urlServidor = Route::ctrRouteLearningManagementSystem();
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

?>

<div class="containerSignUpLogin">
    <div class="forms-container">
        <div class="signin-signup">
            <!--==============================================
            SIGN IN  
            ================================================-->

            <form method="post" class="sign-in-form">
                <h2 class="title-text">iniciar sesión</h2>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" id="ingEmail" name="ingEmail" placeholder="Correo electrónico" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="ingPassword" name="ingPassword" placeholder="Contraseña" />
                </div>

                <input type="hidden" name="routeHidden" value="<?php echo $url; ?>">

                <a href="#modalPassword" data-toggle="modal" style="font-size: 14px;position:relative;">olvidaste tu contraseña?</a>
                
                <input type="submit" value="iniciar sesión" class="btn solid" />

                <?php
                    $login = new ControllerUser();
                    $login -> ctrLoginUser();
                ?>
            </form>

            <!--==============================================
            SIGN UP  
            ================================================-->

            <form class="sign-up-form" method="post" onsubmit="return registryUser()">
                <h2 class="title-text">Regístrate</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" id="regUser" name="regUser" placeholder="Nombre de usuario" />
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="regEmail" name="regEmail" placeholder="Correo Electrónico"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="regPassword" name="regPassword" placeholder="Contraseña" />
                </div>
                <div class="input-field">
                    <i class="fas fa-school"></i>
                    <select name="institution" id="institution">
                        <option value="0">Institución Educativa</option>
                    </select>
                </div>
                <div class="input-field">
                    <i class="fas fa-globe"></i>
                    <select name="labor" id="labor" class="labor">
                        <option value="labor">Labor</option>
                        <option value="profesor">Profesor</option>
                        <option value="estudiante">Estudiante</option>
                        <option value="rector">Rector</option>
                        <option value="coordinador">Coordinador</option>
                    </select>
                </div>
                <div class="input-field grupo" style="display:none;">
                    <i class="fas fa-globe"></i>
                    <select name="grupo" id="grupo">
                        <option value="grupo">Grupo</option>
                        <option value="10-3">10-3</option>
                        <option value="9-2">9-2</option>
                        <option value="3-2">3-2</option>
                        <option value="11-1">11-1</option>
                    </select>
                </div>

                <!--------------->

                <div class="contenedor-condiciones">
                    <div class="custom-control custom-checkbox mr-5" style="font-size: 12px;">
                        <input type="checkbox" name="" id="regPoliticas" class="custom-control-input">

                        <label for="regPoliticas" class="custom-control-label text-muted pl-4">Al registrarse, usted acepta nuestras condiciones de uso y políticas de privacidad</label>
                    </div>    
                    <a href="https://www.iubenda.com/privacy-policy/30256595" class="iubenda-white iubenda-embed" title="Privacy Policy ">Privacy Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script> 
                </div>

                <?php
                    $registry = new ControllerUser(); 
                    $registry -> ctrRegistryUser();
                ?>

                <input type="submit" class="btn" value="Regístrate" />
            </form>
        </div>
    </div>

    <!--==============================================
      PANELS
    ================================================-->

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Nuevo aquí ?</h3>
                <p>
                Regístrate para que seas un miembro mas de esta grandiosa comunidad, no te arrepentirás.
                </p>
                <button class="btn transparent" id="sign-up-btn">
                Regístrate
                </button>
            </div>
            <img src="<?php $url; ?>assets/images/signUpLogin/log.svg" class="image" alt="" />
        </div>

        <div class="panel right-panel">
            <div class="content">
                <h3>Eres uno de nosotros ?</h3>
                <p>
                Genial, ingresa de inmediato para que te enteres de lo ultimo que esta surgiendo en esta grandiosa comunidad.
                </p>
                <button class="btn transparent" id="sign-in-btn">
                iniciar sesión
                </button>
            </div>
            <img src="<?php $url; ?>assets/images/signUpLogin/register.svg" class="image" alt="" />
        </div>
    </div>
</div>

<!--==============================================
 MODAL WINDOW FOR PASSWORD FORGETTING  
================================================-->

<div class="modal fade" id="modalPassword" role="dialog">
    <div class="modal-content modal-dialog">
        <div class="modal-body modalTitulo">

			<h2 class="text-center">NUEVA CONTRASEÑA</h2>
			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<!------- FORGOT PASSWORD -------->

			<form method="post">
				<label class="text-center text-muted mt-2" style="font-size: 15px;">Escribe el correo electronico con el que estas registrado y alli te enviaremos tu nueva ontraseña:</label>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control input-lg" id="forgotPassword" name="forgotPassword" required>
                    </div>
                </div>

                <?php
                    $forgotPassword = new ControllerUser();
                    $forgotPassword -> ctrForgotPassword();
                ?>

				<input type="submit" class="btn btn-secondary btn-block" value="Enviar" style="font-size: 20px;">	

				<br>
				
			</form>

        </div>
    </div>
</div>