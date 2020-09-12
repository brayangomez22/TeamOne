/*=============================================
 BUTTON FACEBOOK
=============================================*/

$(".facebook").click(function(){

	FB.login(function(response){

		validarUsuario();

	}, {scope: 'public_profile, email'})

})

/*=============================================
 VALIDATE THE INCOME
=============================================*/

function validarUsuario(){

	FB.getLoginStatus(function(response){

		statusChangeCallback(response);

	})

}

/*=============================================
 WE VALIDATE THE CHANGE OF STATUS ON FACEBOOK
=============================================*/

function statusChangeCallback(response){

	if(response.status === 'connected'){

		testApi();

	}else{

		swal({
          title: "¡ERROR!",
          text: "¡Ocurrió un error al ingresar con Facebook, vuelve a intentarlo!",
          type: "error",
          confirmButtonText: "Cerrar",
          closeOnConfirm: false
      	},

      	function(isConfirm){
           	if (isConfirm) {    
              	window.location = localStorage.getItem("rutaActual");
            } 
      	});

	}

}

/*=============================================
 WE ENTER THE FACEBOOK API
=============================================*/

function testApi(){

	FB.api('/me?fields=id,name,email,picture',function(response){

		if(response.email == null){

			swal({
	          title: "¡ERROR!",
	          text: "¡Para poder ingresar al sistema debe proporcionar la información del correo electrónico!",
	          type: "error",
	          confirmButtonText: "Cerrar",
	          closeOnConfirm: false
	      	},

	      	function(isConfirm){
	           	if (isConfirm) {    
	              	window.location = localStorage.getItem("rutaActual");
	            } 
	      	});

		}else{

			var email = response.email;
			var nombre = response.name;
			var foto = "http://graph.facebook.com/"+response.id+"/picture?type=large";

			var datos = new FormData();
			datos.append("email", email);
			datos.append("nombre",nombre);
			datos.append("foto",foto);

			$.ajax({

				url:hiddenRoute+"ajax/users.ajax.php",
				method:"POST",
				data:datos,
				cache:false,
				contentType:false,
				processData:false,
				success:function(respuesta){

					console.log(respuesta);
					
					if(respuesta == "ok"){

						window.location = localStorage.getItem("rutaActual");
					
					}else{

						swal({
				          title: "¡ERROR!",
				          text: "¡El correo electrónico "+email+" ya está registrado con un método diferente a Facebook!",
				          type: "error",
				          confirmButtonText: "Cerrar",
				          closeOnConfirm: false
				      	},

				      	function(isConfirm){
				           	if (isConfirm) {    
				              
			           		 FB.getLoginStatus(function(response){

			           		 	 if(response.status === 'connected'){     

			           		 	 	FB.logout(function(response){

			           		 	 		deleteCookie("fblo_252078975819695");

			           		 	 		setTimeout(function(){

			           		 	 			window.location=rutaOculta+"salir";

			           		 	 		},500)

			           		 	 	});

			           		 	 	function deleteCookie(name){

			           		 	 		 document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';

			           		 	 	}

			           		 	 }

			           		 })

				            } 
				      	});

					}

				}

			})

		}

	})

}

/*=============================================
 EXIT FROM FACEBOOK
=============================================*/

$(".salir").click(function(e){

	e.preventDefault();

	 FB.getLoginStatus(function(response){

	 	 if(response.status === 'connected'){     
	 	 
	 	 	FB.logout(function(response){

	 	 		deleteCookie("fblo_252078975819695");

	 	 		console.log("salir");

	 	 		setTimeout(function(){

	 	 			window.location=rutaOculta+"salir";

	 	 		},500)

	 	 	});

	 	 	function deleteCookie(name){

	 	 		 document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';

	 	 	}

	 	 }

	 })

})