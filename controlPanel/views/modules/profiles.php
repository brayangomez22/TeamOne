<?php

  // if($_SESSION["perfil"] != "administrador"){

  //   echo '<script>

  //     window.location = "inicio";

  //   </script>';

  //   return;

  // }

?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Administrar perfiles
    </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar perfiles</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPerfil">
          Agregar perfil
        </button>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tableProfiles" width="100%">
         
          <thead>
           <tr>
             <th style="width:10px">#</th>
             <th>Nombre</th>
             <th>Email</th>
             <th>Foto</th>
             <th>Perfil</th>
             <th>Estado</th>
             <th>Acciones</th>
           </tr> 
          </thead>

          <tbody>
            <?php

            $item = null;
            $valor = null;

            $profiles = ControllerAdministrator::ctrShowAdministrator($item, $valor);

             foreach ($profiles as $key => $value){

                 echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombre"].'</td>
                          <td>'.$value["email"].'</td>';

                         if($value["foto"] != ""){

                          echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                         }else{

                            echo '<td><img src="vistas/img/profiles/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                        }

                        echo '<td>'.$value["perfil"].'</td>';

                         if($value["estado"] != 0){

                          echo '<td><button class="btn btn-success btn-xs btnActivate" idProfile="'.$value["id"].'" profileStatus="0">Activado</button></td>';

                        }else{

                          echo '<td><button class="btn btn-danger btn-xs btnActivate" idProfile="'.$value["id"].'" profileStatus="1">Desactivado</button></td>';

                        } 

                         echo '<td>

                          <div class="btn-group">
                              
                            <button class="btn btn-warning btnEditProfile" idProfile="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarPerfil"><i class="fa fa-pencil"></i></button>

                            <button class="btn btn-danger btnDeleteProfile" idProfile="'.$value["id"].'" photoProfile="'.$value["foto"].'"><i class="fa fa-times"></i></button>

                          </div>  

                        </td>

                      </tr>';            
             }


            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PERFIL
======================================-->

<div id="modalAgregarPerfil" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Perfil</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar Email" id="nuevoEmail" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoPerfil">
                  
                  <option value="">Selecionar perfil</option>

                  <option value="administrador">Administrador</option>

                  <option value="editor">Editor</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="newPhone" name="newPhone">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="assets/dist/img/default/anonymous.jpg" class="img-thumbnail preview" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Perfil</button>

        </div>

        <?php

          $createProfile = new ControllerAdministrator();
          $createProfile -> ctrCreateProfile();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PERFIL
======================================-->

<div id="modalEditarPerfil" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Perfil</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

                <input type="hidden" id="idProfile" name="idProfile">

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" id="editarEmail" name="editarEmail" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarPerfil">
                  
                  <option value="" id="editarPerfil"></option>

                  <option value="administrador">Administrador</option>

                  <option value="editor">Editor</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="newPhone" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="assets/dist/img/default/anonymous.jpg" class="img-thumbnail preview" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Perfil</button>

        </div>

        <?php
      
          $editProfile = new ControllerAdministrator();
          $editProfile -> ctrEditProfile();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $eliminarPerfil = new ControllerAdministrator();
  $eliminarPerfil -> ctrDeleteProfile();

?> 
