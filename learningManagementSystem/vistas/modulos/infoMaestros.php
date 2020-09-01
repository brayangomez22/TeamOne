<div class="content-wrapper">

  <section class="content-header">
    <h1>Gestor Informes</h1>
    <input type="hidden" id="grupo" value="<?php echo $_SESSION["grupo"] ?>">
    <input type="hidden" id="labor" value="<?php echo $_SESSION["labor"] ?>">
    <input type="hidden" id="email" value="<?php echo $_SESSION["email"] ?>">
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fas fa-home"></i> Inicio</a></li>
      <li class="active">Gestor Informes</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">

      <?php
        if(isset($_SESSION["validarSesion"])){ 
          if($_SESSION["labor"] == "profesor"){ 
            echo '<div class="box-header with-border">
              <button class="btn btn-primary" data-toggle="modal" data-target="#subirTarea">Agregar Tarea</button>
            </div>';
          }
        }
      ?>

      <div class="box-body">
        <table class="table table-bordered table-striped tablaInformes dt-responsive" width="100%">

          <thead>
            <tr>

              <th>#</th>
              <th>NombreMaestro</th>
              <th>TituloTarea</th>
              <th>Materia</th>
              <th>Descripcion</th>
              <th>Grupo</th>
              <th>Archivo</th>
              <th>FechaDeEntrega</th>
              <th>Acciones</th>

            </tr>
          </thead>

        </table>
      </div>

    </div>
  </section>

</div>

<!--==============================================
 MODAL PARA SUBIR LAS TAREAS  
================================================-->

<div id="subirTarea" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" enctype="multipart/form-data">
      
        <!--==============================================
          CABEZA DEL MODAL
        ================================================-->
        <div class="modal-header" style="background: #3c8dbc;color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Subir Tarea</h4>
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
                <span class="input-group-addon"><i class="fas fa-heading"></i></span>
                <input type="text" name="tituloTarea" placeholder="Titulo de la tarea *" class="form-control input-lg">
              </div>
            </div>

            <!--==============================================
             ENTRADA PARA EL TIPO DE MATERIA
            ================================================-->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-brain"></i></span>
                <input type="text" name="materia" placeholder="Materia de la tarea *" class="form-control input-lg">
              </div>
            </div>

            <!--==============================================
              ENTRADA PARA EL GRADO AL QUE SE LE ASIGNARA LA TAREA
            ================================================-->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-graduation-cap"></i></span>
                <input type="text" name="grado" placeholder="Grado al que le deseas subir la tarea *" class="form-control input-lg">
              </div>
            </div>

            <!--==============================================
             ENTRADA PARA LA DESCRIPCION DE LA TAREA
            ================================================-->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-pencil-alt"></i></span>
                <textarea name="descripcion" maxlength="400" rows="3" class="form-control input-lg" placeholder="Agrega la información *" required></textarea>
              </div>
            </div>

            <!--==============================================
             ADJUNTAR ARCHIVOS  
            ================================================-->

            <div class="form-group">
                <select name="desear" id="desear" class="input-lg custom-select desear">
                    <option value="" class="text-muted" selected>Deseas adjuntar un archivo ?</option>
                    <option value="si" class="text-muted">Si</option>
                    <option value="no" class="text-muted">No</option>
                </select>
            </div>


            <hr>
            <div class="form-group">
              <div  class="adjunto" style="display: none;">
                <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> Adjunto archivo
                    <input type="file" id="archivo[]" name="archivo" multiple="">
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
          <button type="submit" class="btn btn-primary">Subir Tarea</button>
        </div>

        <?php
          $subir = new ControladorInformes();
          $subir -> ctrSubirTareas();
        ?>
      </form>
    </div>
  </div>
</div>

<!--==============================================
 VENTANA MODAL PARA VER LOS EMAILS  
================================================-->

<div class="modal fade" id="modalVerInforme" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-black-gradient">
                <h2 class="title text-center" id="titulo"></h2>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div style="display:flex;">
                    <h4>Tu profesor <strong id="nombre"></strong> te asigno una nueva tarea</h4>
                </div>
              
                <hr>
                <h4>Enviado desde el correo: <strong id="de"></strong></h4>
                <hr>

                <h4>Nombre de la materia: <strong id="materia"></strong></h4>
                <hr>

                <div>
                    <h4><strong>Info</strong></h4>
                    <p id="info"></p>
                </div>
                
                <ul class="mailbox-attachments clearfix" id="archivosAdjuntos">
 
                </ul>
            </div>

            <div class="modal-footer">
                <h4>Gracias por atenderme</h4>
            </div>
            
        </div>
    </div>
</div>


<!--==============================================
 VENTANA MODAL PARA EDITAR INFORMES
================================================-->

<div id="modalEditarInformes" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST">
      
        <!--==============================================
          CABEZA DEL MODAL
        ================================================-->
        <div class="modal-header" style="background: #ec971f;color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Tarea</h4>
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
                <span class="input-group-addon"><i class="fas fa-heading"></i></span>
                <input type="text" name="editarTituloInformes" placeholder="Titulo de la tarea *" class="form-control input-lg tituloTarea">

                <input type="hidden" name="editarIdInformes" class="editarIdInformes" value="">
                <input type="hidden" name="archivoAntiguo" class="editarArchivo" value="">
              </div>
            </div>

            <!--==============================================
             ENTRADA PARA EL TIPO DE MATERIA
            ================================================-->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-brain"></i></span>
                <input type="text" name="editarMateria" placeholder="Materia de la tarea *" class="form-control input-lg materia">
              </div>
            </div>

            <!--==============================================
              ENTRADA PARA EL GRADO AL QUE SE LE ASIGNARA LA TAREA
            ================================================-->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-graduation-cap"></i></span>
                <input type="text" name="editarGrado" placeholder="Grado al que le deseas subir la tarea *" class="form-control input-lg grupo">
              </div>
            </div>

            <!--==============================================
             ENTRADA PARA LA DESCRIPCION DE LA TAREA
            ================================================-->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-pencil-alt"></i></span>
                <textarea name="editarDescripcion" maxlength="400" rows="5" class="form-control input-lg descripcion" placeholder="Agrega la información *" required></textarea>
              </div>
            </div>

            <!--==============================================
             ADJUNTAR ARCHIVOS  
            ================================================-->

            <div class="form-group">
                <select name="desear" id="desear" class="input-lg custom-select desear">
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
                    <input type="file" id="editarArchivo[]" name="editarArchivo" multiple="">
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
          <button type="submit" class="btn btn-warning">Guardar Tarea</button>
        </div>

      <?php
        $editarServicio = new ControladorInformes();
        $editarServicio -> ctrEditarInformes();
      ?>
      </form>
    </div>
  </div>
</div>

<?php
  $delete = new ControladorInformes();
  $delete -> ctrEliminarTarea();
?>