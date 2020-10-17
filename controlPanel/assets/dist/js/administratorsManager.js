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

    url:"ajax/administrators.ajax.php",
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
SUBIENDO LA FOTO DEL PERFIL
=============================================*/

$(".newPhone").change(function(){

  var image = this.files[0];
  
  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(image["type"] != "image/jpeg" && image["type"] != "image/png"){

      $(".newPhone").val("");

      swal({
        title: "Error al subir la imagen",
        text: "¡La imagen debe estar en formato JPG o PNG!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });

    }else if(image["size"] > 2000000){

      $(".newPhone").val("");

      swal({
        title: "Error al subir la imagen",
        text: "¡La imagen no debe pesar más de 2MB!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });

    }else{

      var dataImage = new FileReader;
      dataImage.readAsDataURL(image);

      $(dataImage).on("load", function(event){

        var routeImage = event.target.result;

        $(".preview").attr("src", routeImage);

      })

    }
})

/*=============================================
EDITAR PERFIL
=============================================*/

$(".tableProfiles").on("click", ".btnEditProfile", function(){

  var idProfile = $(this).attr("idProfile");
  
  var data = new FormData();
  data.append("idProfile", idProfile);

  $.ajax({

    url:"ajax/administrators.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(reply){ 

      $("#editarNombre").val(reply["nombre"]);
      $("#idProfile").val(reply["id"]);
      $("#editarEmail").val(reply["email"]);
      $("#editarPerfil").html(reply["perfil"]);
      $("#editarPerfil").val(reply["perfil"]);
      $("#fotoActual").val(reply["foto"]);
      $("#passwordActual").val(reply["password"]);

      if(reply["foto"] != ""){

        $(".preview").attr("src", reply["foto"]);

      }

    }


  })


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

      window.location = "index.php?route=profiles&idProfile="+idProfile+"&photoProfile="+photoProfile;

    }

  })

})