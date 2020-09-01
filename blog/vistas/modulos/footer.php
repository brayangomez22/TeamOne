<!--==============================================
 FOOTER  
================================================-->

<?php
    $urlBlog = Ruta::ctrRutaBlog();
?>

<footer class="footer">
    <div class="container">
        <div class="about-us" data-aos="fade-right" data-aos-delay="200">
            <h2>Sobre nosotros</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quia atque nemo ad modi officiis
                iure, autem nulla tenetur repellendus.</p>
        </div>
        <div class="newsletter" data-aos="fade-right" data-aos-delay="200">
            <h2>Boletin informativo</h2>
            <p>Manténgase actualizado</p>
            <div class="form-element">
                <input type="text" placeholder="Email"><span><i class="fas fa-chevron-right"></i></span>
            </div>
        </div>
        <div class="instagram" data-aos="fade-left" data-aos-delay="200">
            <h2>Instagram</h2>
            <div class="flex-row">
                <img src="<?php echo $urlBlog; ?>vistas/images/instagram/thumb-card3.png" alt="insta1">
                <img src="<?php echo $urlBlog; ?>vistas/images/instagram/thumb-card4.png" alt="insta2">
                <img src="<?php echo $urlBlog; ?>vistas/images/instagram/thumb-card5.png" alt="insta3">
            </div>
            <div class="flex-row">
                <img src="<?php echo $urlBlog; ?>vistas/images/instagram/thumb-card6.png" alt="insta4">
                <img src="<?php echo $urlBlog; ?>vistas/images/instagram/thumb-card7.png" alt="insta5">
                <img src="<?php echo $urlBlog; ?>vistas/images/instagram/thumb-card8.png" alt="insta6">
            </div>
        </div>
        <div class="follow" data-aos="fade-left" data-aos-delay="200">
            <h2>Síguenos</h2>
            <p>Seamos sociales</p>
            <div>
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </div>
    <div class="rights flex-row">
        <h4 class="text-gray">
            Copyright ©2020 Todos los derechos reservados | sitio hecho por TeamOne 
        </h4>
    </div>
    <div class="move-up">
        <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
    </div>
</footer>