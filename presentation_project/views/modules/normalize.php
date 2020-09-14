<!--==============================================
 Detalles de normalización. 
================================================-->

<?php
    $url = Route::ctrRoute();
?>

<div class="normalizacion" id="normalizacion">
    <div class="container course-row">
        <div class="course-left-col">
            <div class="course-text">
                <h1>Detalles de <br>normalización.</h1>
                <span class="square"></span>
                <p>Los detalles de esta normalización en la 1FN y 2FN fueron en las tablas de las tareas, el inbox, usuarios e instituciones con el atributo de usuario y en la 3FN se aplico mas que todo a tabla de instituciones haciendo referencia a la tabla de usuarios y ya el resto de las tablas como la de los comentarios, respuestas_comentarios, likes y chat_group, se normalizaron de tal manera que se evitara la repetición de datos haciendo referencia cada una a un usuario en general.</p>
            </div>
        </div>
        <div class="course-right-col">
            <img src="<?php echo $url; ?>assets/images/normalizacion.png" alt="" style="box-shadow: -1px -1px 10px 10px #333;">
        </div>
    </div>
</div>