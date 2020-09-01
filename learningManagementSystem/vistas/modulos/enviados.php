
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Enviados
        </h1>
        <input type="hidden" id="emailUser" value="<?php echo $_SESSION["email"]?>">
        <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
        <li class="active">Enviados</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="componer" class="btn btn-primary margin-bottom">Componer</a>

                <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Carpetas</h3>

                    <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><i class="fa fa-inbox"></i> Buzón
                            <span class="label label-primary pull-right">12</span></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> Expedido</a></li>
                    </ul>
                </div>
                <!-- /.box-body -->
                </div>
            
            </div>
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <table class="table table-bordered table-striped tablaEnviados dt-responsive" width="100%">

                        <thead>
                            <tr>

                            <th>#</th>
                            <th>Para</th>
                            <th>Email</th>
                            <th>Labor</th>
                            <th>Informacion</th>
                            <th>Archivo</th>
                            <th>Fecha de Envio</th>
                            <th>Acciones</th>

                            </tr>
                        </thead>

                    </table>
                    </div>

                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--==============================================
 VENTANA MODAL PARA EDITAR INFORMES
================================================-->

<div id="modalEditarEmails" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST">
      
        <!--==============================================
          CABEZA DEL MODAL
        ================================================-->
        <div class="modal-header" style="background: #ec971f;color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Email</h4>
        </div>

        <!--==============================================
        CUERPO DEL MODAL  
        ================================================-->
        <div class="modal-body">
          <div class="box-body">

            <!--==============================================
             ENTRADA DEL TITULO DE LA TAREA  
            ================================================-->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-user"></i></span>
                <input type="text" name="editarParaEmails" placeholder="Para *" class="form-control input-lg editarParaEmails">

                <input type="hidden" name="editarIdEmails" class="editarIdEmails" value="">
                <input type="hidden" name="archivoAntiguo" class="archivoAntiguo" value="">
              </div>
            </div>

            <!--==============================================
             ENTRADA PARA LA DESCRIPCION DE LA TAREA
            ================================================-->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-pencil-alt"></i></span>
                <textarea name="editarInformacion" maxlength="400" rows="5" class="form-control input-lg editarInformacion" placeholder="Agrega la información *" required></textarea>
              </div>
            </div>

            <!--==============================================
             ADJUNTAR ARCHIVOS  
            ================================================-->

            <div class="form-group">
                <select name="cambiarEmail" id="cambiarEmail" class="input-lg custom-select cambiarEmail">
                    <option value="" class="text-muted" selected>Deseas cambiar el archivo adjunto?</option>
                    <option value="si" class="text-muted">Si</option>
                    <option value="no" class="text-muted">No</option>
                </select>
            </div>


            <hr>
            <div class="form-group">
              <div  class="adjunto" style="display: none;">
                <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> Adjunto archivo
                    <input type="file" id="editarArchivoEmail[]" name="editarArchivoEmail[]" multiple="">
                </div>
                <p class="help-block">Por favor que el nombre de su archivo no tenga espaciados entre cada palabra.</p>
                <p class="help-block">Maximo. 32MB</p>
              </div>
            </div>

          </div>
        </div>

        <!--==============================================
        PIE DEL MODAL  
        ================================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-warning">Editar Email</button>
        </div>

      <?php
        $editarServicio = new ControladorEmails();
        $editarServicio -> ctrEditarEmails();
      ?>
      </form>
    </div>
  </div>
</div>

<?php

    $delete = new ControladorEmails();
    $delete -> ctrEliminarEmail();

?>