//=============================================
// PALPITAR EL ME GUSTA 
//=============================================

$(".heart").click(function(){

    var id = this.id;
    var like = document.getElementById('like_'+id);

    var user = $('#usuario').val();
    var nombreUser =  $('#nombre').val(); 

    var datos = new FormData();
    datos.append("id", id);
    datos.append("usuario", user);
    datos.append("nombre", nombreUser);

    $.ajax({
        url:rutaOculta+"ajax/comentarios.ajax.php",
        method:"POST",
        data:datos,
        cache:false,
        contentType: false,
        processData:false,
        success:function(respuesta){         

            like.innerHTML = respuesta; 
            
        }
    })

    $(this).toggleClass("heart-active");

    document.body.classList.toggle('dark');

    if(document.body.classList.contains('dark')){
        localStorage.setItem('heart-active'+id, 'true');
    }else{
        localStorage.setItem('heart-active'+id, 'false');
    }
    
    // OBTENEMOS EL MODO ACTUAL 
    
    // if(localStorage.getItem('heart-active'+id) === 'true'){
    //     $(this).addClass("heart-active");
    // }else{
    //     $(this).removeClass("heart-active");
    // }
    
})


//=============================================
// MOSTRAR Y OCULTAR LOS COMENTARIOS 
//=============================================

$(".MostrarComentario").click(function(){

    var id = this.id;
    var respuestas = $(this).attr("respuestas");

    if(respuestas == 1){

        if($(this).html() == "Ver Respuesta"){

            $(".brayan"+id).show('fast');
        
            $(this).html("Ocultar Respuesta");
        
        }else{
        
            $(".brayan"+id).hide('fast');
        
            $(this).html("Ver Respuesta");
        
        }

    }else{

        if($(this).html() == "Ver "+respuestas+" Respuestas"){

            $(".brayan"+id).show('fast');
        
            $(this).html("Ocultar "+respuestas+" Respuestas");
        
        }else{
        
            $(".brayan"+id).hide('fast');
        
            $(this).html("Ver "+respuestas+" Respuestas");
        
        }

    }

})

$(".MostrarCampoRespuesta").click(function(){

    var id = this.id;

    if($(this).html() == "Responder"){

        $(".manco"+id).show('fast');
    
        $(this).html("Ocultar Campo de Respuesta");
    
    }else{
    
        $(".manco"+id).hide('fast');
    
        $(this).html("Responder");
    
    }

})