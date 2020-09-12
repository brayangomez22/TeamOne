//=============================================
// HIDDEN ROUTE
//=============================================

var hiddenRoute = $("#hiddenRoute").val(); 

//=============================================
// FORMAT THE INPUT 
//=============================================

$("input").focus(function(){
	$(".alert").remove();
})

//=============================================
//  VALIDATE REPEATED EMAIL
//=============================================

var validateRepeatedEmail = false;

$("#regEmail").change(function(){

	var email = $("#regEmail").val();

	var data = new FormData();
	data.append("validateEmail", email);

	console.log(hiddenRoute);

	$.ajax({
		url: hiddenRoute+"ajax/users.ajax.php",
		method: "POST",
		data: data, 
		cache: false,
		contentType: false,
		processData: false,
		success: function(reply){

			console.log(reply);

			if(reply == "false"){

				$(".alert").remove();
				validateRepeatedEmail = false;  

			}else{

				var modo = JSON.parse(reply).modo;
				
				if(modo == "directo"){

					modo = "esta página";
					
				}

				$("#regEmail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, fue registrado a través de '+modo+', por favor ingrese otro diferente</div>')

				validateRepeatedEmail = true;

			}

		}

	})
	
})

//=============================================
// VALIDATING THE USER REGISTRATION 
//=============================================

function registryUser(){

	/*=============================================
	VALIDATE THE NAME
	=============================================*/

	var name = $("#regUser").val();

	if(name != ""){

		var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if(!expresion.test(name)){

			$("#regUser").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

			return false;

		}

	}else{

		$("#regUser").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

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

		if(validateRepeatedEmail){

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