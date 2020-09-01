//=============================================
// ELIMINAR USUARIO 
//=============================================

$("#eliminarUsuario").click(function(){

	var id = $("#idUsuario").val();

	if($("#modoUsuario").val() == "directo"){
		if($("#fotoUsuario").val() != ""){
			var foto = $("#fotoUsuario").val();
		}
	}

	swal({
		title: "Esta usted seguro(a) de elimar su cuenta?",
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