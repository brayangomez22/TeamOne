//=============================================
// CARGAR LA TABLA DINAMICA DE SERVICIOS 
//=============================================

var grupo = $("#grupo").val();
var labor = $("#labor").val();
var email = $("#email").val();
var id_institucion = $("#id_institucion").val();

// $.ajax({
// 	url:"ajax/tablaInformes.ajax.php",
//     success:function(respuesta){
// 		console.log(respuesta);
// 	}
// })

$(".tablaInformes").DataTable({
	"ajax": {
		"url": "ajax/tablaInformes.ajax.php",
		data:{
			grupo:grupo, 
			labor:labor, 
			email:email, 
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
// VER INFORMES
//=============================================

$(".tablaInformes tbody").on("click", ".btnVerInformes", function(){

	var idInformes = $(this).attr("idInformes");
	var id_institucion = $(this).attr("id_institucion");

	var datos = new FormData();
	datos.append("idInformes", idInformes);
	datos.append("id_institucion", id_institucion);

	$.ajax({
		url:"ajax/informes.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			$("#modalVerInforme #titulo").html(respuesta[0]["tituloTarea"]);
			$("#modalVerInforme #nombre").html(respuesta[0]["nombreMaestro"]);
			$("#modalVerInforme #de").html(respuesta[0]["email"]);
			$("#modalVerInforme #materia").html(respuesta[0]["materia"]);
			$("#modalVerInforme #info").html(respuesta[0]["descripcion"]);

			
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
							post +=`<span class="mailbox-attachment-icon has-img"><img src="vistas/tareas/`+respuesta[0]["archivo"]+`" alt="Attachment"></span>`;
						}else{
							post +=`<span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>`;
						}

						post +=`<div class="mailbox-attachment-info">
							<a href="vistas/tareas/`+respuesta[0]["archivo"]+`" class="mailbox-attachment-name" download=`+respuesta[0]["archivo"]+`><i class="fa fa-paperclip"></i>`+respuesta[0]["archivo"]+`</a>
							<span class="mailbox-attachment-size">
								1,245 KB
								<a href="vistas/tareas/`+respuesta[0]["archivo"]+`" class="btn btn-default btn-xs pull-right" download=`+respuesta[0]["archivo"]+`><i class="fas fa-cloud-download-alt"></i></a>
							</span>
						</div>
					</li>
				`;

				$("#archivosAdjuntos").html(post);

			}else{
				$("#archivosAdjuntos").html("");
			}

		}
		
	});

});

//=============================================
// EDITAR INFORMES 
//=============================================

$(".tablaInformes tbody").on("click", ".btnEditarInformes", function(){

	var idInformes = $(this).attr("idInformes");
	var id_institucion = $(this).attr("id_institucion");

	var datos = new FormData();
	datos.append("idInformes", idInformes);
	datos.append("id_institucion", id_institucion);

	$.ajax({
		url:"ajax/informes.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
        success:function(respuesta){
			
			$("#modalEditarInformes .editarIdInformes").val(respuesta[0]["id"]);
			$("#modalEditarInformes .editarArchivo").val(respuesta[0]["archivo"]);

			$("#modalEditarInformes .tituloTarea").val(respuesta[0]["tituloTarea"]);
			$("#modalEditarInformes .materia").val(respuesta[0]["materia"]);
			$("#modalEditarInformes .grupo").val(respuesta[0]["grupo"]);
			$("#modalEditarInformes .descripcion").val(respuesta[0]["descripcion"]);

		}
	})

})

//=============================================
// ELIMINAR TAREA 
//=============================================

$(".tablaInformes tbody").on("click", ".btnEliminarInformes", function(){

	var idInformes = $(this).attr("idInformes");

	swal({
		title: "¿ Esta seguro de borrar la tarea ?",
		text: "¡ Si no lo esta puede eliminar la accion !",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		cancelButtonText: "Cancelar",
		confirmButtonText: "Si, borrar tarea !",
	}).then(function(result){
		if(result.value){
			window.location = "index.php?ruta=infoMaestros&idInformes="+idInformes;
		}
	})

})

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

$(".desear").change(function(){

    adjuntarArchivosInformes($(this).val());

})