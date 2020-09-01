$(document).ready(function(){

	var emailUser = $("#emailUser").val();

	$.ajax({
		url:rutaOculta+"ajax/tablaEmail.ajax.php",
	    success:function(respuesta){
			// console.log(respuesta);
	    }
	})

	//=============================================
	// CARGAR LA TABLA DINAMICA DE EMAILS 
	//=============================================
	
	$(".tablaEmail").DataTable({
		"ajax": {
			"url": "ajax/tablaEmail.ajax.php",
			data:{
				emailUser:emailUser
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
	// VEER EMAILS 
	//=============================================

	$(".tablaEmail tbody").on("click", ".btnverEmails", function(){

		var idEmails = $(this).attr("idEmails");

		var datos = new FormData();
		datos.append("idEmails", idEmails);

		$.ajax({
			url:rutaOculta+"ajax/emails.ajax.php",
			method:"POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
			success:function(respuesta){
				
				$("#modalVerEmail #asunto").html(respuesta[0]["asunto"]);
				$("#modalVerEmail #labor").html(respuesta[0]["labor"]);
				$("#modalVerEmail #de").html(respuesta[0]["de"]);
				$("#modalVerEmail #info").html(respuesta[0]["informacion"]);

				//=============================================
				// AÑADIMOS EL ARCHIVO A LA VENTANA MODAL 
				//=============================================

				if(respuesta[0]["archivo"] != ""){

					//------- OBTENER LA EXTENSION --------
					var path = respuesta[0]["archivo"];
					var path_splitted = path.split('.');
					var extension = path_splitted.pop();


					var post = `
						<hr>
						<li>`;
							
							if(extension == "jpg" || extension == "png"){
								post +=`<span class="mailbox-attachment-icon has-img"><img src="vistas/archivos_emails/`+respuesta[0]["archivo"]+`" alt="Attachment"></span>`;
							}else{
								post +=`<span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>`;
							}

							post +=`<div class="mailbox-attachment-info">
								<a href="vistas/archivos_emails/`+respuesta[0]["archivo"]+`" class="mailbox-attachment-name" download=`+respuesta[0]["archivo"]+`><i class="fa fa-paperclip"></i>`+respuesta[0]["archivo"]+`</a>
								<span class="mailbox-attachment-size">
									1,245 KB
									<a href="vistas/archivos_emails/`+respuesta[0]["archivo"]+`" class="btn btn-default btn-xs pull-right" download=`+respuesta[0]["archivo"]+`><i class="fas fa-cloud-download-alt"></i></a>
								</span>
							</div>
						</li>
					`;

					$("#archivosAdjuntos").html(post);

				}else{
					$("#archivosAdjuntos").html("");
				}
				
			}
		})

	});

	//=============================================
	// DELETE EMAILS 
	//=============================================

	$(".tablaEmail tbody").on("click", ".btnEliminarEmails", function(){

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
	// ESTRELLAS 
	//=============================================
	
	$(".tablaEmail tbody").on("click", ".mailbox-star", function(e){
		e.preventDefault();
	
		var id = $(this).attr("id");
		var star = $(".star"+id);		
		var fa_far = null;

		if(star.hasClass("fa")){
			var fa_far = "far";
		}else{
			var fa_far = "fa";
		}

		var datos = new FormData();
		datos.append("id", id);
		datos.append("fa_far", fa_far);

		$.ajax({
			url:rutaOculta+"ajax/emails.ajax.php",
			method:"POST",
			data:datos,
			cache:false,
			contentType: false,
			processData:false,
			success:function(respuesta){
				if(respuesta == "ok"){
					if(star.hasClass("fa")){
						star.removeClass("fa");
						star.addClass("far");
					}else{
						star.removeClass("far");
						star.addClass("fa");
					}
				}
			}
		})

	});
})
