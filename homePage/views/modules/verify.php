<!--=====================================
 CHECK
======================================-->
<?php

	$userVerify = false;
	
	$item = "EmailEncriptado";
	$valor =  $routes[1];

	$reply = ControllerUser::ctrShowUsers($item, $valor);

	if($valor == $reply["emailEncriptado"]){

		$id = $reply["id"];
		$item2 = "verificacion";
		$valor2 = 0;
	
		$replyTwo = ControllerUser::ctrUpdateUser($id, $item2, $valor2);
	
		if($replyTwo == "ok"){
	
			$userVerify = true;
	
		}

	}

?>

<div class="containerVerify">

	<div id="containerBoxVerify">
        <div class="content">
        
			<?php

				$url = Route::ctrRoute();

				if($userVerify){

					echo '
						<h3>Gracias</h3>
						<h4>Ahora eres uno de nosotros</h4>
						<p>¡Hemos verificado su correo electrónico, ya puede ingresar al sistema!</p>

						<a href="'.$url.'signUpLogin">INGRESAR</a>
					';
				
				}else{

					echo '
						<h3>Error</h3> 
						<h4>Lo sentimos</h4>   

						<p>¡No se ha podido verificar el correo electrónico,  vuelva a registrarse!</p>

						<a href="'.$url.'signUpLogin">Registrarse</a>
					';

				}

			?>

		</div>
    </div>

	<script type="text/javascript">
        var containerBoxVerify = document.getElementById('containerBoxVerify');
        window.onmousemove = function(e){
            var x = e.clientX/5,
                y = e.clientY/5;

            containerBoxVerify.style.backgroundPositionX = x + 'px';
            containerBoxVerify.style.backgroundPositionY = y + 'px';
        }
    </script>

</div>