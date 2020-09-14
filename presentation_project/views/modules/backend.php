<!--==============================================
 BACKEND. 
================================================-->

<?php
    $url = Route::ctrRoute();
?>

<div class="normalizacion" id="backend">
    <div class="container course-row">
        <div class="course-left-col">
            <div class="course-text">
                <h1>Back-end</h1>
                <span class="square"></span>
                <p>Este proceso está constituido por el patron modelo, vista, controlador (MVC), donde los modelos y controladores seran los encargados de hacer las peticiones con la base de datos, y las vistas seran las encargadas de mostrar la parte visual del proyecto. A parte de este encarpetado, se añadio uno más llamado <strong>AJAX</strong> que se utiliza para hacer peticiones en tiempo real, con JAVASCRIPT por medio de ajax y PHP. Para este proceso se esta utilizando la ultima versión de PHP y como base de datos se esta utilizando MySql, por otro lado estamos utilizando uno de los paradigmas de programación, estamos utilizando la programación orientada a objetos, para hacer este proceso de lógica algo mucho más óptimo. y por ultimo también estamos utilizando <strong>LAYOUTS </strong>para evitar la repetición de código.</p>
            </div>
        </div>
        <div class="course-right-col">
            <img src="<?php echo $url; ?>assets/images/backend.png" alt="" style="box-shadow: -1px -1px 10px 10px #fff;">
        </div>
    </div>
</div>