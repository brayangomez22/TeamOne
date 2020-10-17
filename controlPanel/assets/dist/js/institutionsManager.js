//=============================================
// CARGAR LA TABLA DINAMICA DE SERVICIOS 
//=============================================

$.ajax({
    url:"ajax/tableInstitutions.ajax.php",
    success:function(respuesta){
		console.log(respuesta);
    }
})

$(".tableInstitutions").DataTable({
    "ajax": "ajax/tableInstitutions.ajax.php",
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
// REVISAR SI EL SERVICIO YA EXISTE 
//=============================================

$(".validarTestimonio").change(function(){

	$(".alert").remove();

    var testimonio = $(this).val();    

    var datos = new FormData();
    datos.append("validarTestimonio", testimonio);

    $.ajax({
        url: "ajax/testimonials.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
		processData: false,
		dataType: "json",
        success:function(respuesta){

			if(respuesta){

				$(".validarTestimonio").parent().after('<div class="alert alert-warning">Este testimonio ya existe en la base de datos</div>')
				$(".validarTestimonio").val("");

			}   

        }
    })

})

//=============================================
// SUBEINDO LA FOTO DEL TESTIMONIO 
//=============================================

$(".fotoTestimonio").change(function(){

    var imagen = this.files[0];

    //=============================================
    // VALIDAR LA IMAGEN 
    //=============================================

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

        $(".fotoTestimonio").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG",
            type: "error",
            confirmButtonText: "Cerrar"
        });

        return;

    }else if(imagen["size"] > 2000000){

        $(".fotoTestimonio").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar mas de 2MG",
            type: "error",
            confirmButtonText: "Cerrar"
        });

        return;

    }else{

        var datosImagen = new FileReader();
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){
            var rutaImagen = event.target.result;
            $(".previsualizarTestimonio").attr("src", rutaImagen);
        })

    }

})

//=============================================
// EDITAR SERVICIO 
//=============================================

$(".tableInstitutions tbody").on("click", ".btnEditarTestimonio", function(){

	var idTestimonio = $(this).attr("idTestimonio");

	var datos = new FormData();
	datos.append("idTestimonio", idTestimonio);

	$.ajax({
        url: "ajax/testimonials.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
		processData: false,
		dataType: "json",
        success:function(respuesta){

			$("#modalEditarTestimonio .editarIdTestimonio").val(respuesta["id"]);
			
			$("#modalEditarTestimonio .editarTestimonio").val(respuesta["nombreTestimonio"]);
			$("#modalEditarTestimonio .previsualizarTestimonio").attr("src", respuesta["imgTestimonio"]);
			$("#modalEditarTestimonio .opinion").val(respuesta["opinionTestimonio"]);
			$("#modalEditarTestimonio .antiguaFotoTestimonio").val(respuesta["imgTestimonio"]);

		}
	})

})

//=============================================
// ELIMINAR SERVICIO 
//=============================================

$(".tableInstitutions tbody").on("click", ".btnEliminarTestimonio", function(){

	var idTestimonio = $(this).attr("idTestimonio");
	var imgTestimonio = $(this).attr("imgTestimonio");

	swal({
		title: "¿ Esta seguro de borrar el testimonio ?",
		text: "¡ Si no lo esta puede eliminar la accion !",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		cancelButtonText: "Cancelar",
		confirmButtonText: "Si, borrar testimonio !",
	}).then(function(result){
		if(result.value){
			window.location = "index.php?route=testimonials&idTestimonio="+idTestimonio+"&imgTestimonio="+imgTestimonio;
		}
	})

})