<div class="content-wrapper">

  <section class="content-header">
    <h1>Gestor Acerca De / Testimonios</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Gestor Acerca De / Testimonios</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">

      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTestimonio">Agregar un nuevo Testimonio</button>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped tableTestimonials dt-responsive" width="100%">

          <thead>
            <tr>

              <th>#</th>
              <th>Nombre</th>
              <th>Img</th>
              <th>Opinion</th>
              <th>Acciones</th>

            </tr>
          </thead>

        </table>
      </div>

    </div>
  </section>

</div>

<!--==============================================
 VENTANA MODAL PARA AGREGAR SERVICIO  
================================================-->

<div id="modalAgregarTestimonio" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" enctype="multipart/form-data">
      
        <!--==============================================
          CABEZA DEL MODAL
        ================================================-->
        <div class="modal-header" style="background: #3c8dbc;color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar un nuevo Testimonio</h4>
        </div>

        <!--==============================================
        CUERPO DEL MODAL  
        ================================================-->
        <div class="modal-body">
          <div class="box-body">

            <!--==============================================
             ENTRADA PARA EL NOMBRE DEL TESTIMONIO  
            ================================================-->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control input-lg validarTestimonio nombreTestimonio" placeholder="Ingresar el nombre del testimonio *" name="nombreTestimonio" required>
              </div>
            </div>

            <!--=====================================
            ENTRADA PARA SUBIR FOTO DE PORTADA
            ======================================-->

            <div class="form-group">
              <div class="panel">SUBIR FOTO DEL TESTIMONIO</div>
                <input type="file" class="fotoTestimonio" name="fotoTestimonio">
                <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>
                <img src="assets/dist/img/default/anonymous.jpg" class="img-thumbnail previsualizarTestimonio" width="100%">
            </div>

            <!--==============================================
             ENTRADA PARA LA OPINION DEL TESTIMONIO  
            ================================================-->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-award"></i></span>
                <textarea name="opinion" maxlength="250" rows="3" class="form-control input-lg" placeholder="Ingresar la opinion del testimonio *"></textarea>
              </div>
            </div>

          </div>
        </div>

        <!--==============================================
        PIE DEL MODAL  
        ================================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Testimonio</button>
        </div>

      </form>

      <?php

        $crearTestimonio = new ControladorTestimonios();
        $crearTestimonio -> ctrCrearTestimonio();

      ?>
      
    </div>
  </div>
</div>

<!--==============================================
 VENTANA MODAL PARA EDITAR SERVICIO
================================================-->

<div id="modalEditarTestimonio" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" enctype="multipart/form-data">
      
        <!--==============================================
          CABEZA DEL MODAL
        ================================================-->
        <div class="modal-header" style="background: #ec971f;;color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar un nuevo Testimonio</h4>
        </div>

        <!--==============================================
        CUERPO DEL MODAL  
        ================================================-->
        <div class="modal-body">
          <div class="box-body">

            <!--==============================================
             ENTRADA PARA EL NOMBRE DEL TESTIMONIO  
            ================================================-->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control input-lg editarTestimonio" placeholder="Ingresar el nombre del testimonio *" name="editarTestimonio" required>
              
                <input type="hidden" class="editarIdTestimonio" name="editarIdTestimonio">
              </div>
            </div>

            <!--=====================================
            ENTRADA PARA SUBIR FOTO DE PORTADA
            ======================================-->

            <div class="form-group">
              <div class="panel">SUBIR FOTO DEL TESTIMONIO</div>
                <input type="file" class="fotoTestimonio" name="fotoTestimonio">
                <input type="hidden" class="antiguaFotoTestimonio" name="antiguaFotoTestimonio">

                <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>
                <img src="" class="img-thumbnail previsualizarTestimonio" width="100%">
            </div>

            <!--==============================================
             ENTRADA PARA LA OPINION DEL TESTIMONIO  
            ================================================-->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-award"></i></span>
                <textarea name="opinion" maxlength="250" rows="3" class="form-control input-lg opinion" placeholder="Ingresar la opinion del testimonio *"></textarea>
              </div>
            </div>

          </div>
        </div>

        <!--==============================================
        PIE DEL MODAL  
        ================================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-warning">Editar Testimonio</button>
        </div>

      </form>

      <?php

        $editarTestimonio = new ControladorTestimonios();
        $editarTestimonio -> ctrEditarTestimonio();

      ?>
      
    </div>
  </div>
</div>

<?php

$eliminarTestimonio = new ControladorTestimonios();
$eliminarTestimonio -> ctrEliminarTestimonio();

?>