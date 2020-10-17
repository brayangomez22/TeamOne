//=============================================
// CARGAR LA TABLA DINAMICA DE SOLICITUDES DEL LMS 
//=============================================

// $.ajax({
//     url:"ajax/tableRequestLMS.ajax.php",
//     success:function(reply){
// 		console.log(reply);
//     }
// })

$(".tableRequestLMS").DataTable({
    "ajax": "ajax/tableRequestLMS.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
    "language": {

	    "sProcessing":     "Procesando...",
	   "sLengthMenu":     "Mostrar _MENU_ registros",
	   "sZeroRecords":    "No se encontraron resultados",
	   "sEmptyTable":     "Ningún dato disponible en esta tabla",
	   "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
	   "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
	   "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	   "sInfoPostFix":    "",
	   "sSearch":         "Buscar:",
	   "sUrl":            "",
	   "sInfoThousands":  ",",
	   "sLoadingRecords": "Cargando...",
	   "oPaginate": {
		   "sFirst":    "Primero",
		   "sLast":     "Último",
		   "sNext":     "Siguiente",
		   "sPrevious": "Anterior"
	   },
	   "oAria": {
			   "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			   "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	   }

	}
});

//=============================================
// ACTIVATE VIEW LMS FOR USERS 
//=============================================

$(document).on("click", ".btnActivateLMS", function(){

	var idProfile = $(this).attr("idProfile");
	var accessStatus = $(this).attr("accessStatus");

	var data = new FormData();
 	data.append("activateId", idProfile);
	data.append("accessStatus", accessStatus);

	$.ajax({

		url:"ajax/requestLMS.ajax.php",
		method: "POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		success: function(reply){
			// console.log("reply: ", reply);
		}

	})

	if(accessStatus == 0){

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('accessStatus',1);

	}else{

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Activado');
		$(this).attr('accessStatus',0);

	}

})