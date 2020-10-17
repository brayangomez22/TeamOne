$(document).ready(function(){

	var emailUser = $("#emailUser").val();
	var id_institucion = $("#id_institucion").val();

	$.ajax({
		url:rutaOculta+"ajax/tablaEnviados.ajax.php",
	    success:function(respuesta){
			// console.log(respuesta);
	    }
	})

	//=============================================
	// CARGAR LA TABLA DINAMICA DE EMAILS 
	//=============================================
	
	$(".tablaEnviados").DataTable({
		"ajax": {
			"url": "ajax/tablaEnviados.ajax.php",
			data:{
				emailUser:emailUser,
				id_institucion:id_institucion
			},
			"type": "POST"
		},
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
    // EDITAR INFORMES 
    //=============================================

    $(".tablaEnviados tbody").on("click", ".btnEditarEmail", function(){

		var idEmails = $(this).attr("idEmails");
		var idInstitucion = $(this).attr("idInstitucion");

        var datos = new FormData();
		datos.append("idEditarEmails", idEmails);
		datos.append("id_institucion", idInstitucion);

        $.ajax({
            url:"ajax/emails.ajax.php",
            method:"POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success:function(respuesta){
                
                $("#modalEditarEmails .editarIdEmails").val(respuesta[0]["id"]);
                $("#modalEditarEmails .archivoAntiguo").val(respuesta[0]["archivo"]);

                $("#modalEditarEmails .editarParaEmails").val(respuesta[0]["para"]);
                $("#modalEditarEmails .editarInformacion").val(respuesta[0]["informacion"]);
            }
        })

    })

	//=============================================
	// DELETE EMAILS 
	//=============================================

	$(".tablaEnviados tbody").on("click", ".btnEliminarEmails", function(){

		var idEmails = $(this).attr("idEmails");
		var rutaArchivo = $(this).attr("rutaArchivo");

		swal({
			title: "¿Esta segur@ de que desea borrar el email",
			text: "¡Si no lo está puede cancelar la accíón!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancelar',
			confirmButtonText: 'Si, borrar categoría!'
		}).then(function(result){
	
			if(result.value){
		
				window.location = "index.php?ruta=bandeja-de-entrada&idEmails="+idEmails+"&rutaArchivo="+rutaArchivo;
		
			}
	
		})

    });

    //=============================================
    // MOSTRAR EL INPUT PARA SUBIR ARCHIVOS 
    //=============================================

    function adjuntarArchivosInformes(evento){

        if(evento == "si"){
            $(".adjunto").show();
        }else{
            $(".adjunto").hide();
        }

    }

    $(".cambiarEmail").change(function(){

        adjuntarArchivosInformes($(this).val());

    })
    
})