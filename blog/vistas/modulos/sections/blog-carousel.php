<!-- --------------------- Blog Carousel ----------------- -->

<?php
    $urlBlog = Ruta::ctrRutaBlog();
?>

<section>
    <div class="blog">
        <div class="container">
            <div class="owl-carousel owl-theme blog-post">
                <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                    <img src="<?php echo $urlBlog; ?>vistas/images/Blog-post/post-1.jpg" alt="post-1">
                    <div class="blog-title">
                        <h3>Semana de la moda de Londres continuó la evolución</h3>
                        <button class="btn btn-blog">Moda</button>
                        <span>2 minutos</span>
                    </div>
                </div>
                <div class="blog-content" data-aos="fade-in" data-aos-delay="200">
                    <img src="<?php echo $urlBlog; ?>vistas/images/Blog-post/post-3.jpg" alt="post-1">
                    <div class="blog-title">
                        <h3>Semana de la moda de Londres continuó la evolución</h3>
                        <button class="btn btn-blog">Moda</button>
                        <span>2 minutos</span>
                    </div>
                </div>
                <div class="blog-content" data-aos="fade-left" data-aos-delay="200">
                    <img src="<?php echo $urlBlog; ?>vistas/images/Blog-post/post-2.jpg" alt="post-1">
                    <div class="blog-title">
                        <h3>Semana de la moda de Londres continuó la evolución</h3>
                        <button class="btn btn-blog">Moda</button>
                        <span>2 minutos</span>
                    </div>
                </div>
                <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                    <img src="<?php echo $urlBlog; ?>vistas/images/Blog-post/post-5.png" alt="post-1">
                    <div class="blog-title">
                        <h3>Semana de la moda de Londres continuó la evolución</h3>
                        <button class="btn btn-blog">Moda</button>
                        <span>2 minutos</span>
                    </div>
                </div>
            </div>
            <div class="owl-navigation">
                <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
            </div>
        </div>
    </div>
</section>

<!-- ----------x---------- Blog Carousel --------x-------- -->