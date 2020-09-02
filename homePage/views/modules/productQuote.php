<!--==============================================
 PRODUCT QUOTE 
================================================-->
    
<?php
    $url = Route::ctrRoute();
?>

<div class="productQuote">

    <!--==============================================
     HEADER OF PRODUCT QUOTE 
    ================================================-->

    <div class="header">
        <div class="wrapper">
            <div class="header-grid">
                <img width="70" src="<?php echo $url; ?>views/images/productQuote/logo.svg" alt="">
            </div>
        </div>
    </div>

    <!--==============================================
     HERO QUOTE 
    ================================================-->

    <section class="heroQuote">
        <div class="wrapper">
            <div class="hero-grid">
                <img src="<?php echo $url; ?>views/images/productQuote/illustration-intro.png" alt="illustration-intro">
                <h1>
                    Todo lo que quieres en un solo lugar, accesible desde cualquier lugar.
                </h1>
                <p>
                    Fylo es una comunidad educativa donde podras estudiar de manera eficaz y divertida. Acceda desde a ella desde donde estes. En esta increible plataforma podras compartir y colaborar con amigos, familiares y compañeros de trabajo y mucho mas.
                </p>
                <button class="button">Empezar</button>
            </div>
        </div>
    </section>

    <!--==============================================
     FEATURES 
    ================================================-->

    <h2 class="text-center" style="font-size: 27px;">Algunas caracteristicas que hacen este maravilloso servicio unico.</h2>
    <div class="containerFeatures">
        <div class="card">
            <div class="box">
                <div class="content">
                    <h2>1</h2>
                    <h3>Accede a tus tareas desde cualquier lugar</h3>
                    <p>La capacidad de usar un teléfono inteligente, tableta o computadora para acceder a su cuenta significa que todo lo que quiere lo siguen a todas partes.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="box">
                <div class="content">
                    <h2>2</h2>
                    <h3>Seguridad en la que puede confiar</h3>
                    <p>La autenticación de 2 factores y el cifrado controlado por el usuario son solo algunas de las características de seguridad que permitimos para ayudar a proteger todo lo que quieres.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="box">
                <div class="content">
                    <h2>3</h2>
                    <h3>Colaboración en tiempo real</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia optio vero expedita veritatis ullam temporibus officia iure aut placeat doloribus!</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="box">
                <div class="content">
                    <h2>4</h2>
                    <h3>Almacene cualquier tipo de archivo</h3>
                    <p>Ya sea que esté compartiendo fotos de vacaciones o documentos de trabajo, Fylo lo tiene cubierto permitiendo que todos los tipos de archivos se almacenen y compartan de forma segura.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="box">
                <div class="content">
                    <h2>5</h2>
                    <h3>Almacene cualquier tipo de archivo</h3>
                    <p>Ya sea que esté compartiendo fotos de vacaciones o documentos de trabajo, Fylo lo tiene cubierto permitiendo que todos los tipos de archivos se almacenen y compartan de forma segura.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="box">
                <div class="content">
                    <h2>6</h2>
                    <h3>Almacene cualquier tipo de archivo</h3>
                    <p>Ya sea que esté compartiendo fotos de vacaciones o documentos de trabajo, Fylo lo tiene cubierto permitiendo que todos los tipos de archivos se almacenen y compartan de forma segura.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>

    <!--==============================================
     PRODUCTIVE 
    ================================================-->

    <section class="productive">
        <div class="wrapper">
            <div class="productive-grid">
                <img src="<?php echo $url; ?>views/images/productQuote/illustration-stay-productive.png" alt="">
                <div>
                    <h2>
                        Mantente productivo, donde quiera que estés
                    </h2>
                    <p>
                        Nunca permita que la ubicación sea un problema al acceder a su mundo educativo. Fylo lo tiene cubierto para todas sus necesidades.
                    </p>
                    <p>
                        Comparta archivos y carpetas de forma segura con amigos, familiares y colegas para una colaboración en vivo.
                    </p>
                    <a href="#">
                        Vea cómo funciona Fylo
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--==============================================
     PRICES containerPrices
    ================================================-->

    <h2 class="text-center" style="font-size: 27px;">Precios</h2>
    <section class="price-comparison">
        <div class="price-column">
            <div class="price-header" style="color: #333;">
                <div class="price" >
                    <div class="dollar-sign">$</div>
                    10
                    <div class="per-month">/mo</div>
                </div>
                <div class="plan-name">Basic</div>
            </div>
            <div class="divider"></div>
            <div class="feature" style="color: #333;">
                <img src="<?php echo $url; ?>views/images/productQuote/check-circle.svg">
                Feature A
            </div>
            <div class="feature" style="color: #333;">
                <img src="<?php echo $url; ?>views/images/productQuote/check-circle.svg">
                Feature B
            </div>
            <div class="feature inactive">
                <img src="<?php echo $url; ?>views/images/productQuote/x-square.svg">
                Feature C
            </div>
            <div class="feature inactive">
                <img src="<?php echo $url; ?>views/images/productQuote/x-square.svg">
                Feature D
            </div>
            <div class="feature inactive">
                <img src="<?php echo $url; ?>views/images/productQuote/x-square.svg">
                Feature E
            </div>
            <div class="feature inactive">
                <img src="<?php echo $url; ?>views/images/productQuote/x-square.svg">
                Feature F
            </div>
            <button class="cta">Start Today</button>
        </div>

        <div class="price-column popular">
            <div class="most-popular">Most Popular</div>
            <div class="price-header">
                <div class="price">
                <div class="dollar-sign">$</div>
                20
                <div class="per-month">/mo</div>
                </div>
                <div class="plan-name">Professional</div>
            </div>
            <div class="divider"></div>
            <div class="feature">
                <img src="<?php echo $url; ?>views/images/productQuote/check-circle.svg">
                Feature A
            </div>
            <div class="feature">
                <img src="<?php echo $url; ?>views/images/productQuote/check-circle.svg">
                Feature B
            </div>
            <div class="feature">
                <img src="<?php echo $url; ?>views/images/productQuote/check-circle.svg">
                Feature C
            </div>
            <div class="feature">
                <img src="<?php echo $url; ?>views/images/productQuote/check-circle.svg">
                Feature D
            </div>
            <div class="feature inactive">
                <img src="<?php echo $url; ?>views/images/productQuote/x-square.svg">
                Feature E
            </div>
            <div class="feature inactive">
                <img src="<?php echo $url; ?>views/images/productQuote/x-square.svg">
                Feature F
            </div>
            <button class="cta">Start Today</button>
        </div>

        <div class="price-column">
            <div class="price-header" style="color: #333;">
                <div class="price">
                <div class="dollar-sign">$</div>
                50
                <div class="per-month">/mo</div>
                </div>
                <div class="plan-name">Enterprise</div>
            </div>
            <div class="divider"></div>
            <div class="feature" style="color: #333;">
                <img src="<?php echo $url; ?>views/images/productQuote/check-circle.svg">
                Feature A
            </div>
            <div class="feature" style="color: #333;">
                <img src="<?php echo $url; ?>views/images/productQuote/check-circle.svg">
                Feature B
            </div>
            <div class="feature" style="color: #333;">
                <img src="<?php echo $url; ?>views/images/productQuote/check-circle.svg">
                Feature C
            </div>
            <div class="feature" style="color: #333;">
                <img src="<?php echo $url; ?>views/images/productQuote/check-circle.svg">
                Feature D
            </div>
            <div class="feature" style="color: #333;">
                <img src="<?php echo $url; ?>views/images/productQuote/check-circle.svg">
                Feature E
            </div>
            <div class="feature" style="color: #333;">
                <img src="<?php echo $url; ?>views/images/productQuote/check-circle.svg">
                Feature F
            </div>
            <button class="cta">Start Today</button>
        </div>
    </section>

    <!--==============================================
     REVIEWS TESTIMONIALS
    ================================================-->

    <h2 class="text-center" style="font-size: 27px;margin-top:40px;">Testimonios</h2>
    <section class="reviews">
        <div class="wrapper">
            <div class="reviews-grid">
                <div class="review">
                <p>
                    Fylo ha mejorado la productividad de nuestro equipo en un orden de magnitud. Desde que hicimos el cambio, nuestro equipo se ha convertido en una máquina de colaboración bien engrasada.
                </p>
                <div class="review-detail">
                    <img src="<?php echo $url; ?>views/images/productQuote/profile-1.jpg" alt="">
                    <h3>
                        Pepe
                        <small>
                            Founder & CEO, Google
                        </small>
                    </h3>
                </div>
                </div>
                <div class="review">
                <p>
                    Fylo ha mejorado la productividad de nuestro equipo en un orden de magnitud. Desde que hicimos el cambio, nuestro equipo se ha convertido en una máquina de colaboración bien engrasada.
                </p>
                <div class="review-detail">
                    <img src="<?php echo $url; ?>views/images/productQuote/profile-2.jpg" alt="">
                    <h3>
                        Ivan
                        <small>
                            Founder & CEO, Google
                        </small>
                    </h3>
                </div>
                </div>
                <div class="review">
                <p>
                    Fylo ha mejorado la productividad de nuestro equipo en un orden de magnitud. Desde que hicimos el cambio, nuestro equipo se ha convertido en una máquina de colaboración bien engrasada.
                </p>
                <div class="review-detail">
                    <img src="<?php echo $url; ?>views/images/productQuote/profile-3.jpg" alt="">
                    <h3>
                        Aleja
                        <small>
                            Founder & CEO, Google
                        </small>
                    </h3>
                </div>
                </div>
            </div>
        </div>
    </section>

    <!--==============================================
     FORM 
    ================================================-->

    <div class="form">
        <div class="wrapper">
            <div class="form-grid">
                <h2>Obtenga acceso temprano hoy</h2>
                <p>Solo toma un minuto registrarse y nuestro nivel de inicio gratuito es extremadamente generoso. Si tiene alguna pregunta, nuestro equipo de soporte estará encantado de ayudarle.</p>

                <form>
                    <input type="text" placeholder="email@example.com">
                    <button class="button">Empiece gratis</button>
                </form>
            </div>
        </div>
    </div>

    <!--==============================================
     FOOTER 
    ================================================-->

    <footer class="footer">
        <div class="wrapper">
            <img src="<?php echo $url; ?>views/images/productQuote/logo.svg" alt="">
            <div class="footer-grid">
                <div class="footer-contact">
                    <p class="location">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua
                    </p>
                    <p class="phone">
                        +1-543-123-4567
                    </p>

                    <p class="email">
                        example@fylo.com
                    </p>
                </div>
                <ul style="font-size: 14px;">
                    <li>
                        <a href="#">Sobre nosotros</a>
                    </li>
                    <li>
                        <a href="#">Trabajos</a>
                    </li>
                    <li>
                        <a href="#">Prensa</a>
                    </li>
                    <li>
                        <a href="#">Blog</a>
                    </li>
                </ul>

                <ul style="font-size: 14px;">
                    <li>
                        <a href="#">Contacta con nosotros</a>
                    </li>
                    <li>
                        <a href="#">Condiciones</a>
                    </li>
                    <li>
                        <a href="#">Intimidad</a>
                    </li>
                </ul>
                <div class="social">
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</div