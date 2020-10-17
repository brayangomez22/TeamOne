/*=============================================
 ACTIVATE PROFILE
=============================================*/

$(document).on("click", ".btnActivate", function(){

	var idProfile = $(this).attr("idProfile");
	var profileStatus = $(this).attr("profileStatus");

	var data = new FormData();
 	data.append("activateId", idProfile);
    data.append("activateProfile", profileStatus);

    $.ajax({

        url:"ajax/rector.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(reply){
            // console.log("reply", reply);
        }

    })

    if(profileStatus == 0){

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('profileStatus',1);

    }else{

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('profileStatus',0);

    }

})

/*=============================================
ELIMINAR USUARIO
=============================================*/

$(".tableProfiles").on("click", ".btnDeleteProfile", function(){

  var idProfile = $(this).attr("idProfile");
  var photoProfile = $(this).attr("photoProfile");

  swal({
    title: '¿Está seguro de borrar el perfil?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar perfil!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?route=home&id="+idProfile+"&foto="+photoProfile;

    }

  })

})