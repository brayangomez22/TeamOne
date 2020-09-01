<!--==============================================
 REGISTRATION METHOD  
================================================-->

<div class="modal fade" id="modalRegistro" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title title-text">REGISTRARSE</div>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body container-fluid">

                <form method="post" onsubmit="return registroUsuario()">

                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="regUsuario"  name="regUsuario" required>
                            <label>Nombre Completo</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="regEmail"  name="regEmail" required>
                            <label>Correo Electronico</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control pswrd1" type="password" id="regPassword" name="regPassword" required>
                            <span class="show" id="show1"><i class="fas fa-eye"></i></span>
                            <label>Contraseña</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <select name="labor" id="labor" class="custom-select labor" style="font-size: 18px;">
                            <option value="" class="text-muted" selected>Labor</option>
                            <option value="profesor" class="text-muted">Profesor</option>
                            <option value="estudiante" class="text-muted">Estudiante</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group mostrarDatos" style="display: none">
                            <input type="text" class="form-control" id="codigo" name="codigo" required>
                            <label>Codigo de seguridad</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group mostrarGrupo" style="display: none">
                            <input type="text" class="form-control" id="grupo" name="grupo" required>
                            <label>Grupo al que perteneces</label>
                        </div>
                    </div>

                    <!--==============================================
                     CONDICIONES DE USO Y POLITICAS DE PRIVACIDAD
                    ================================================-->

                    <div class="contenedor-condiciones" style="margin-top: 65px;">
                        <div class="custom-control custom-checkbox mr-5" >
                            <input type="checkbox" name="" id="regPoliticas" class="custom-control-input">
                            <label for="regPoliticas" class="custom-control-label text-muted pl-4">Al registrarse, usted acepta nuestras condiciones de uso y políticas de privacidad</label>
                            <a href="https://www.iubenda.com/privacy-policy/30256595" class="iubenda-white iubenda-embed" title="Privacy Policy ">Privacy Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
                        </div>     
                    </div>

                    <?php
                    
                        $registro = new ControladorUsuario();
                        $registro -> ctrRegistroUsuario();

                    ?>

                    <div class="button">
                        <input type="submit" class="btn btn-secondary btn-block" value="ENVIAR">
                    </div>

                </form>

                <div class="auth mt-3"  style="font-size: 15px;">O registrese con:</div>

                <div class="links">
                    <div class="facebook">
                        <i class="fab fa-facebook-square"><span>Facebook</span></i>
                    </div>
                    <a href="<?php echo $rutaGoogle; ?>" class="google">
                        <i class="fab fa-google"><span>Google</span></i>
                    </a> 
                </div>

                <div class="modal-footer signup" style="font-size: 15px;">
                    ¿Ya tienes una cuenta registrada?  <a href="#modalIngreso" data-dismiss="modal" data-toggle="modal">Ingresar</a>
                </div>
            </div>
        </div>
    </div>   
</div>

<!--==============================================
 INCOME METHOD
================================================-->

<div class="modal fade" id="modalIngreso" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title title-text">INGRESAR</div>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body container-fluid">
                <form method="post">  

                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="ingEmail" name="ingEmail" required>
                            <label>Correo electrónico</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <input  type="password" class="form-control" id="pswrd2" name="ingPassword" required>
                            <span class="show" id="show2"><i class="fas fa-eye"></i></span>
                            <label>Contraseña</label>
                        </div>
                    </div>

                    <?php
                    
                        $ingreso = new ControladorUsuario();
                        $ingreso -> ctrIngresoUsuario();

                    ?>

                    <div class="button">
                        <input type="submit" class="btn btn-secondary btn-block btnIngreso" value="INGRESAR">
                    </div>

                </form>

                <div class="auth" style="font-size: 15px;">O ingrese con:</div>

                <div class="links">
                    <div class="facebook">
                        <i class="fab fa-facebook-square"><span>Facebook</span></i>
                    </div>
                    <a href="<?php echo $rutaGoogle; ?>" class="google">
                        <i class="fab fa-google"><span>Google</span></i>
                    </a> 
                </div>

                <br>

                <center>
                    <a style="font-size: 15px;" href="#modalPassword" data-dismiss="modal" data-toggle="modal">¿Olvidaste tu contraseña?</a>
                </center>

                <div class="modal-footer signup" style="font-size: 15px;">
                    ¿No tienes una cuenta registrada?  <a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrate</a>
                </div>
            </div>
        </div>
    </div>   
</div>

<!--==============================================
 MODAL WINDOW FOR PASSWORD FORGETTING  
================================================-->

<div class="modal fade modalFormulario" id="modalPassword" role="dialog">
    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

			<h3 class="backColor title-text">NUEVA CONTRASEÑA</h3>
			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<!------- FORGOT PASSWORD -------->

			<form method="post">

				<label class="text-center text-muted mt-2" style="font-size: 15px;">Escribe el correo electronico con el que estas registrado y alli te enviaremos tu nueva ontraseña:</label>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="passEmail" name="passEmail" required>
                        <label>Correo electrónico</label>
                    </div>
                </div>
				
				<?php
				
					$password = new ControladorUsuario();
					$password -> ctrOlvidoPassword();

				?>

				<input type="submit" class="btn btn-secondary btn-block" value="Enviar" style="font-size: 15px;">	

				<br>
				
			</form>

        </div>
		
        <div class="modal-footer" style="font-size: 15px;">

		¿No tienes una cuenta registrata? | <a href="#modalRegistro" class="ml-1" data-dismiss="modal" data-toggle="modal">Registrase</a>

        </div>
      
    </div>

</div>

<!--==============================================
 MODAL TO UPDATE THE FIELD OF WORK  
================================================-->

<div class="modal fade modalFormulario" id="perfil" role="dialog">
    <div class="modal-content modal-dialog">
        <div class="modal-header modalTitulo">
            <h3 style="color:black;">Por favor antes de ingresar a tu perfil, dinos cual es tu labor ?</h3>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body container-fluid">
            <form method="post">
                <div class="form-group">
                    <select name="laborRedes" id="laborRedes" class="custom-select laborRedes">
                        <option value="" class="text-muted" selected>Labor</option>
                        <option value="profesor" class="text-muted">Profesor</option>
                        <option value="estudiante" class="text-muted">Estudiante</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="input-group mostrarDatosRedes" style="display: none">
                        <input type="text" class="form-control" id="codigoRedes" name="codigoRedes" required>
                        <label>Codigo de seguridad</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mostrarGrupoRedes" style="display: none">
                        <input type="text" class="form-control" id="grupoRedes" name="grupoRedes" >
                        <label>Grupo al que perteneces</label>
                    </div>
                </div>

                <?php

                    $item1 = "email";
                    $valor1 = $_SESSION["email"];

                    $actualizarLabor = ControladorUsuario::ctrActualizarLabor($item1, $valor1);	

                ?>

                <div class="button">
                    <input type="submit" class="btn btn-secondary btn-block" value="ENVIAR">
                </div>
            </form>
        </div>
    </div>
</div>