<?php

    $url = Route::ctrRoute();

?>

<!--=====================================
ERROR 404
======================================-->

<div class="containerError">
    <div id="main">
        <div id="msg">Pagina no encontrada</div>
        <div id="error">
            <div id="f1">4</div>
            <div id="circle">
                <div id="smalldot"></div>
            </div>
            <div id="f2">4</div>
        </div>
        
        <div id="info">Parece que no podemos encontrar la página<br>qué estas buscando..</div>
        
       <a href="<?php echo $url; ?>"> <div id="btn">Volver al sitio</div></a>
    </div>  
    
    <div id="ring"></div>
    
    <div class="dusk" id="d1"></div>
    <div class="dusk" id="d2"></div>
    <div class="dusk" id="d3"></div>
    <div class="dusk" id="d4"></div>
    <div class="dusk" id="d5"></div>
    <div class="dusk" id="d6"></div>
    <div class="dusk" id="d7"></div>
    <div class="dusk" id="d8"></div>
    <div class="dusk" id="d9"></div>
</div>