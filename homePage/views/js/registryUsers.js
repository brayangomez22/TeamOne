//=============================================
// SHOW INPUT FOR TEACHERS
//=============================================

function activarCodigoSeguridad(evento){

    if(evento == "profesor"){

		$(".mostrarDatos").show();
		$(".mostrarGrupo").hide();
		$('#codigo').prop("required", true);
		$('#grupo').removeAttr("required");

    }else{

		$(".mostrarGrupo").parent().before('<div class="alert alert-warning"><strong>Ejemplo:</strong> 11-1</div>')
		$(".mostrarDatos").hide();
		$(".mostrarGrupo").show();
		$('#codigo').removeAttr("required");
		$('#grupo').prop("required", true);

	}

}

$(".labor").change(function(){

    activarCodigoSeguridad($(this).val());

})

//=====================================================
//  SHOW INPUT FOR TEACHERS FOR REGISTERED WITH SOCIAL NETWORKS
//=====================================================

function activarCodigoSeguridadRedes(evento){

    if(evento == "profesor"){

		$(".mostrarDatosRedes").show();
		$(".mostrarGrupoRedes").hide();
		$('#codigoRedes').prop("required", true);
		$('#grupoRedes').removeAttr("required");

    }else{

		$(".mostrarGrupoRedes").parent().before('<div class="alert alert-warning"><strong>Ejemplo:</strong> 11-1</div>')
		$(".mostrarDatosRedes").hide();
		$(".mostrarGrupoRedes").show();
		$('#codigoRedes').removeAttr("required");
		$('#grupoRedes').prop("required", true);

	}

}

$(".laborRedes").change(function(){

    activarCodigoSeguridadRedes($(this).val());

})

/*=============================================
  FORMAT THE IPUNT
=============================================*/

$("input").focus(function(){
	$(".alert").remove();
})

//=============================================
//  VALIDATE REPEATED EMAIL
//=============================================

var validarEmailRepetido = false;

$("#regEmail").change(function(){

	var email = $("#regEmail").val();

	var datos = new FormData();
	datos.append("validarEmail", email);

	$.ajax({
		url: rutaOculta+"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){

			if(respuesta == "false"){

				$(".alert").remove();
				validarEmailRepetido = false;

			}else{

				var modo = JSON.parse(respuesta).modo;
				
				if(modo == "directo"){

					modo = "esta página";
					
				}

				$("#regEmail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, fue registrado a través de '+modo+', por favor ingrese otro diferente</div>')

				validarEmailRepetido = true;

			}

		}

	})
	
})

//=============================================
// VALIDATING THE USER REGISTRATION 
//=============================================

function registroUsuario(){

	/*=============================================
	VALIDATE THE NAME
	=============================================*/

	var nombre = $("#regUsuario").val();

	if(nombre != ""){

		var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if(!expresion.test(nombre)){

			$("#regUsuario").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

			return false;

		}

	}else{

		$("#regUsuario").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

        return false;
        
	}

	/*=============================================
	VALIDATE THE EMAIL
	=============================================*/

	var email = $("#regEmail").val();

	if(email != ""){

		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if(!expresion.test(email)){

			$("#regEmail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> Escriba correctamente el correo electrónico</div>')

			return false;

		}

		if(validarEmailRepetido){

			$("#regEmail").parent().before('<div class="alert alert-danger"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente</div>')

			return false;

		}

	}else{

		$("#regEmail").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

        return false;
        
	}


	/*=============================================
	VALIDATE THE PASSWORD
	=============================================*/

	var password = $("#regPassword").val();

	if(password != ""){

		var expresion = /^[a-zA-Z0-9]*$/;

		if(!expresion.test(password)){

			$("#regPassword").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

			return false;

		}

	}else{

		$("#regPassword").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

        return false;
        
	}
	
	/*=============================================
	VALIDATE PRIVACY POLICIES
	=============================================*/

	var politicas = $("#regPoliticas:checked").val();
	
	if(politicas != "on"){

		$("#regPoliticas").parent().parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Debe aceptar nuestras condiciones de uso y políticas de privacidad</div>')

		return false;

	}

    return true;
    
}