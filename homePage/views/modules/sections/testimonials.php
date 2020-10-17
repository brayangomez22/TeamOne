<?php

    $url = Route::ctrRoute();

?>

<!--==============================================
 TESTIMONIALS  
================================================-->

<section class="testimonials">
    <div class="container carousel py-lg-5">
        <div class="owl-carousel owl-theme wow zoomInUp delay-1s">

            <?php

                $urlCP = Route::ctrRouteControlPanel();

                $testimonials = ControllerTestimonials::ctrShowTestimonials();

                foreach ($testimonials as $key => $value) {
                    echo '
                        <div class="client row">
                            <div class="col-lg-4 col-md-12 client-img">
                                <img src="'.$urlCP.$value["imgTestimonio"].'" alt="img1" class="img-fluid">
                            </div>
                            <div class="col-lg-8 col-md-12 about-client">
                                <h4 class="text-uppercase">'.$value["nombreTestimonio"].'</h4>
                                <p class="para">'.$value["opinionTestimonio"].'</p>
                            </div>
                        </div>
                    ';
                }
            ?>
        </div>
    </div>
</section>