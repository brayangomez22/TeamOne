<?php

    $url = Route::ctrRoute();

?>

<!--==============================================
 PORTAFOLIO  
================================================-->

<section class="portfolio" id="portfolio" style="margin-top: 60px;">
    <div class="container wow zoomIn delay-1s">
        <div class="row">
            <div class="col-12 col-lg-6">
                <img src="<?php echo $url; ?>views/images/illustrative-img/3.svg" class="img-fluid" >
            </div>
            <div class="col-12 col-lg-6">
                <div class="content-description">
                    <h1 class="title title-text text-center mt-5">Nuestro Portafolio</h1>
                    <p class="mt-4 d-flex justify-content-center">Contamos con un portafolio bastante amplio, creamos sitios de eCommerce (compra y venta de artículos por internet), creamos sitios personales, empresariales, plataformas estudiantiles... Etc; Todo esto con el fin de satisfacer al cliente con lo que quiera realizar sin importar el campo ni la complejidad del producto o servicio.</p>
                </div>
                <img src="<?php echo $url; ?>views/images/fans.svg" style="width: 120px;margin-top: 20px;" alt="">
            </div>
        </div>
    </div>

    <div class="contenedor wow zoomIn delay-1s">
        <div class="headerPortfolio">
            <form action="">
                <input type="text" class="barra-busqueda" id="barra-busqueda" placeholder="Buscar">
            </form>
            <div class="categorias" id="categorias">
                <a href="#" class="activo">Todas</a>
                <a href="#">Personales</a>
                <a href="#">Tiendas</a>
                <a href="#">Empresas</a>
                <a href="#">Institucionales</a>
                <a href="#">Blogs</a>
            </div>
        </div>

        <section class="grid" id="grid">
            <div class="item" 
                    data-categoria="personales"
                    data-etiquetas="personales hermosas autonomas frelancer"
                    data-descripcion="<a href='https://brayangomez22.github.io/myWebSiteTwo/' style='font-size: 17px;' class='btn btn-primary' target='_blank'>Ver Sitio Web</a>">
                    
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/brayan.png" alt="">
                </div>
            </div>

            <div class="item"
                data-categoria="institucionales"
                data-etiquetas="institucionales colegios hermosas"
                data-descripcion="9.- Lorem ipsum dolor sit amet consectetur.">
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/panel.png" alt="">
                </div>
            </div>

            <div class="item"
                    data-categoria="personales"
                    data-etiquetas="personales hermosas autonomas frelancer"
                    data-descripcion="2.- Lorem ipsum dolor sit amet consectetur.">
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/miWeb.png" alt="">
                </div>
            </div>

            <div class="item"
                    data-categoria="tiendas"
                    data-etiquetas="tiendas vender productos"
                    data-descripcion="3.- Lorem ipsum dolor sit amet consectetur.">
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/tienda.png" alt="">
                </div>
            </div>

            <div class="item"
                    data-categoria="empresas"
                    data-etiquetas="empresas corporaciones emprendedores"
                    data-descripcion="<a href='https://brayangomez22.github.io/webSiteBooks/' style='font-size: 17px;' class='btn btn-primary' target='_blank'>Ver Sitio Web</a>">
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/books.png" alt="">
                </div>
            </div>

            <div class="item"
                    data-categoria="blogs"
                    data-etiquetas="blogs hermosas autonomas frelancer"
                    data-descripcion="<a href='https://brayangomez22.github.io/myWebSiteFour/' style='font-size: 17px;' class='btn btn-primary' target='_blank'>Ver Sitio Web</a>">
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/personal2.png" alt="">
                </div>
            </div>

            <div class="item"
                data-categoria="empresas"
                data-etiquetas="empresas corporaciones emprendedores"
                data-descripcion="<a href='https://brayangomez22.github.io/myWebSiteThree/' style='font-size: 17px;' class='btn btn-primary' target='_blank'>Ver Sitio Web</a>">
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/personal3.png" alt="">
                </div>
            </div>

            <div class="item" 
                data-categoria="personales"
                data-etiquetas="personales hermosas autonomas frelancer"
                data-descripcion="8.- Lorem ipsum dolor sit amet consectetur.">
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/bamWeb.png" alt="">
                </div>
            </div>

            <div class="item" 
                data-categoria="empresas"
                data-etiquetas="empresas corporaciones emprendedores"
                data-descripcion="<a href='https://brayangomez22.github.io/escuela/' style='font-size: 17px;' class='btn btn-primary' target='_blank'>Ver Sitio Web</a>">
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/escuela.png" alt="">
                </div>
            </div>

            <div class="item" 
                data-categoria="blogs"
                data-etiquetas="blogs hermosas autonomas frelancer"
                data-descripcion="8.- Lorem ipsum dolor sit amet consectetur.">
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/blooger.png" alt="">
                </div>
            </div>

            <div class="item" 
                data-categoria="empresas"
                data-etiquetas="empresas corporaciones emprendedores"
                data-descripcion="<a href='https://brayangomez22.github.io/webSiteTechNews/' style='font-size: 17px;' class='btn btn-primary' target='_blank'>Ver Sitio Web</a>">
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/techNews.png" alt="">
                </div>
            </div>

            <div class="item" 
                data-categoria="personales"
                data-etiquetas="personales hermosas autonomas frelancer"
                data-descripcion="<a href='https://brayangomez22.github.io/Personal_WebSite/' style='font-size: 17px;' class='btn btn-primary' target='_blank'>Ver Sitio Web</a>">
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/personal.png" alt="">
                </div>
            </div>

            <div class="item" 
                data-categoria="personales"
                data-etiquetas="personales hermosas autonomas frelancer"
                data-descripcion="<a href='https://brayangomez22.github.io/webSiteNature/' style='font-size: 17px;' class='btn btn-primary' target='_blank'>Ver Sitio Web</a>">
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/nature.png" alt="">
                </div>
            </div>

            <div class="item" 
                data-categoria="empresas"
                data-etiquetas="empresas corporaciones emprendedores"
                data-descripcion="<a href='https://brayangomez22.github.io/My-Web-Site/' style='font-size: 17px;' class='btn btn-primary' target='_blank'>Ver Sitio Web</a>">
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/personal4.png" alt="">
                </div>
            </div>

            <div class="item" 
                data-categoria="blogs"
                data-etiquetas="blogs hermosas autonomas frelancer"
                data-descripcion="8.- Lorem ipsum dolor sit amet consectetur.">
                <div class="item-contenido">
                    <img src="<?php echo $url; ?>views/images/pages/marcas.png" alt="">
                </div>
            </div>
        </section>

        <section class="overlay" id="overlay">
            <div class="contenedor-img">
                <button id="btn-cerrar-popup"><i class="fas fa-times"></i></button>
                <img src="" alt="">
            </div>
            <p class="descripcion"></p>
        </section>
    </div>
</section>