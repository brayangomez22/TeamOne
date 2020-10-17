<!--==============================================
 PRICES 
================================================-->

<div class="title-heading">
    <h1 class="title-text">Precios</h1>
</div>
<div class="pricing-table">
    <div class="pricing-card">
      <h3 class="pricing-card-header">BASIC</h3>
      <div class="price"><sup>$</sup>15<span>/al mes</span></div>
      <ul>
        <li><strong>100</strong> Correos como máximo</li>
        <li><strong>250 GB</strong> Como almacenamiento</li>
        <li><strong>100</strong> Publicaciones como máximo</li>
        <li><strong>20</strong> Visitas a tus amig@s</li>
      </ul>
      <a href="#" class="order-btn">Ordenar ahora</a>
    </div>

    <div class="pricing-card">
      <h3 class="pricing-card-header">EXPERT</h3>
      <div class="price"><sup>$</sup>50<span>/al mes</span></div>
      <ul>
        <li><strong>500</strong> Correos como máximo</li>
        <li><strong>450 GB</strong> Como almacenamiento</li>
        <li><strong>400</strong> Publicaciones como máximo</li>
        <li><strong>800</strong> Visitas a tus amig@s</li>
      </ul>
      <a href="#" class="order-btn">Ordenar ahora</a>
    </div>

    <div class="pricing-card">
      <h3 class="pricing-card-header">EXPERT +</h3>
      <div class="price"><sup>$</sup>80<span>/al mes</span></div>
      <ul>
        <li><strong>∞</strong> Correos</li>
        <li><strong>∞ GB</strong> Como almacenamiento</li>
        <li><strong>∞</strong> Publicaciones</li>
        <li><strong>∞</strong> Visitas a tus amig@s</li>
      </ul>

      <?php
        if(isset($_SESSION["validarSesion"])){
          echo '
            <a href="#exampleModalCenter" data-toggle="modal"  class="order-btn">Ordenar ahora</a>
          ';
        }else{
          echo '
            <a href="#priceError" data-toggle="modal" class="order-btn">Ordenar ahora</a>
          ';
        }
      ?>
      
    </div>
</div>

<!--==============================================
 MODAL OF PRICES 
================================================-->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLongTitle" style="font-size: 20px;">EXPERT +</h5>
      </div>
      <form method="post" style="font-size: 18px;">
        <div class="modal-body">
          <div>
            <p style="color: rgb(102, 99, 99);">
              <strong>IMPORTANTE: </strong> estos pagos nada más lo podrán realizar administradores de tu institución educativa, o el encargado de dicha institución, o aquellas personas que están encargadas de un grupo grande de personas y quieren obtener esté servicio y las cuales serán las encargadas de administrar dicho grupo. <strong>Si no eres un administrador y tienes una cuenta o quieres saber si tu institución educativa está registrada en nuestro sistema y más información, por favor entra en este enlace: <u><em><a href="#">INFO</a></em></u> .</strong> Siendo así, si eres la persona que estará encargada de administrar dicho sistema y aún no tienes nuestro servicio, te pedimos que nos envies un mensaje, donde especifiques, para que vas a utilizar nuestro LMS, una vez hecho esto nos pondremos en contacto para hacer el tramite de pago y aclarar dudas e inquietudes que tengas. Y una vez hecho todo esto, podras disfrutar de nuestro LMS.
            </p>
          </div>
          <hr>
          <div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" name="message-text" id="message-text" style="font-size: 15px;"></textarea>
            </div>
            <div>
              <input type="hidden" name="idUser" value="<?php echo $_SESSION["id"] ?>">
              <input type="hidden" name="id_institucion" value="<?php echo $_SESSION["id_institucion"] ?>">
              <input type="hidden" name="nombre" value="<?php echo $_SESSION["nombre"] ?>">
              <input type="hidden" name="labor" value="<?php echo $_SESSION["labor"] ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 15px;">Cerrar</button>
          <button type="submit" class="btn btn-primary" style="font-size: 15px;">Enviar</button>

          <?php
            $prices = new ControllerPrices();
            $prices -> ctrPrices();
          ?>
        </div>
      </form>
    </div>
  </div>
</div>

<!--==============================================
 MODAL OF PRICES ERROR 
================================================-->

<div class="modal fade" id="priceError" tabindex="-1" role="dialog" aria-labelledby="priceError" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLongTitle" style="font-size: 20px;">No estas registrado aún</h5>
      </div>
      <div class="modal-body">
        <div>
          <p style="color: rgb(102, 99, 99);">
            ¡Tines que registrarte o iniciar sesión para seguir!
          </p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 15px;">Cerrar</button>
      </div>
    </div>
  </div>
</div>