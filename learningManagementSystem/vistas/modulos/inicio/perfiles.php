
<section class="content-header">
    <h1>
        Administrar perfiles
    </h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
          <small>Entidades de mi institución</small>
        </div>

        <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tableProfiles" width="100%">
            
            <thead>
                <tr>
                    <th style="width:10px">#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Labor</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr> 
            </thead>

            <tbody>
            <?php

                $item = "id_institucion";
                $valor = $_SESSION["id_institucion"];

                $profiles = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                foreach ($profiles as $key => $value){

                    if($value["id"] != $_SESSION["id"]){
                        echo ' <tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["email"].'</td>';

                        if($value["foto"] != ""){
                            echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                        }else{
                            echo '<td><img src="assets/img/default/anonymous.jpg" class="img-thumbnail" width="40px"></td>';
                        }

                        echo '<td>'.$value["labor"].'</td>';

                        if($value["acceso"] != 0){
                            echo '<td><button class="btn btn-success btn-xs btnActivate" idProfile="'.$value["id"].'" profileStatus="0">Activado</button></td>';
                        }else{
                            echo '<td><button class="btn btn-danger btn-xs btnActivate" idProfile="'.$value["id"].'" profileStatus="1">Desactivado</button></td>';
                        } 

                        echo '<td>

                        <div class="btn-group">
                          <button class="btn btn-danger btnDeleteProfile" idProfile="'.$value["id"].'" photoProfile="'.$value["foto"].'"><i class="fa fa-times"></i></button>
                        </div>  

                        </td>

                    </tr>';   
                    }
         
                }

            ?>

          </tbody>

        </table>

        </div>

    </div>
</section>

<?php

  $eliminarPerfil = new ControladorUsuarios();
  $eliminarPerfil -> ctrEliminarUsuario();

?> 