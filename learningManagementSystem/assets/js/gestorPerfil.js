//=============================================
// CAMBIAR FOTO 
//=============================================

$("#btnCambiarFoto").click(function(){

    $("#imgPerfil").toggle();
    $("#subirImagen").toggle();

})

$("#datosImagen").change(function(){

    var imagen = this.files[0];

    //=============================================
    // VALIDAMOS EL FORMATO DE LA IMAGEN 
    //=============================================

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

        $("#datosImagen").val("");

        swal({
			title: "¡Error al subir la imagen!",
			text: "¡La imagen debe de estar en formato jpg o png!",
			type:"error",
			confirmButtonText: "¡Cerrar!",
			closeOnConfirm: false
		  },

		  function(isConfirm){

            if(isConfirm){
                window.location = rutaOculta+"perfil";
            }

        });
      
    }

    //=============================================
    // VALIDAMOS EL TAMAÑO DE LA IMAGEN 
    //=============================================

    else if(Number(imagen["size"]) > 2000000){

        $("#datosImagen").val("");

        swal({
			title: "¡Error al subir la imagen!",
			text: "¡La imagen no debe de pesar mas de 2mb!",
			type:"error",
			confirmButtonText: "¡Cerrar!",
			closeOnConfirm: false
		  },

		  function(isConfirm){

			if(isConfirm){
				window.location = rutaOculta+"perfil";
			}
			
        });
          
    }else{

        var datosImagen = new FileReader();
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on('load', function(event){

            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);

        })

    }

})

//=============================================
// ELIMINAR USUARIO 
//=============================================

$("#eliminarUsuario").click(function(){

	var id = $("#idUsuario").val();

	if($("#fotoUsuario").val() != ""){

		var foto = $("#fotoUsuario").val();

	}

	swal({
		title: "¿Esta usted seguro(a) de elimar su cuenta?",
		text: "¡Si borra esta cuenta ya no se puede recuperar los datos!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "¡Si, borrar cuenta!",
		closeOnConfirm: false
	  },
	function(isConfirm){
		if (isConfirm) {	   
			window.location = "index.php?ruta=verPerfil&id="+id+"&foto="+foto;
		} 
	});

})