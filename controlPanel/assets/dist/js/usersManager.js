/*=============================================
CARGAR LA TABLA DINÁMICA DE USUARIOS
=============================================*/

// $.ajax({

// 	url:"ajax/tableUsers.ajax.php",
// 	success:function(reply){
		
// 		console.log("reply", reply);

// 	}

// })

$(".tableUsers").DataTable({
    "ajax": "ajax/tableUsers.ajax.php",
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

/*=============================================
ACTIVAR USUARIO
=============================================*/

$(document).on("click", ".btnActivar", function(){

   var idUsuario = $(this).attr("idUsuario");
   var estadoUsuario = $(this).attr("estadoUsuario");

   var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({

        url:"ajax/users.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(reply){ 
             
            // console.log("reply", reply);

        } 	 

    });

    if(estadoUsuario == 1){

        $(this).addClass('btn-danger');
        $(this).removeClass('btn-success');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario',0);
     
    }else{

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoUsuario',1);

    }

})