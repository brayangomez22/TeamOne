<!--==============================================
 EDITAR PERFIL  
================================================-->

<section class="content" id="perfil">
    <div class="row">
        <div class="col-12">
            <div class="box box-danger">
                <!-- box-header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Perfil</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->

                <!-- box-body -->
                <div class="box-body no-padding">
                    <form method="post" enctype="multipart/form-data" class="row">
                        <div class="col-md-3 col-sm-4 col-xs-12 text-center" style="margin-left:13px;">
                            <br>

                            <figure id="imgPerfil">
                                
                                <?php

                                    echo '<input type="hidden" value="'.$_SESSION["id"].'" id="idUsuario" name="idUsuario">
                                    <input type="hidden" value="'.$_SESSION["password"].'" name="passUsuario">
                                    <input type="hidden" value="'.$_SESSION["foto"].'" name="fotoUsuario" id="fotoUsuario">
                                    <input type="hidden" value="'.$_SESSION["modo"].'" name="modoUsuario" id="modoUsuario">';

                                    if($_SESSION["modo"] == "directo"){
                                        if($_SESSION["foto"] != ""){
                                            echo '<img src="'.$_SESSION["foto"].'" class="img-thumbnail">';
                                        }else{
                                            echo '<img src="vistas/img/default/anonymous.png" class="img-thumbnail">';
                                        }                              
                                    }else{
                                        echo '<img src="'.$_SESSION["foto"].'" class="img-thumbnail">';	
                                    }

                                ?>

                            </figure>

                            <br>

                            <?php
                                if($_SESSION["modo"] == "directo"){
                                    echo '<button type="button" class="btn btn-block btn-info btn-flat" id="btnCambiarFoto">
                                        Cambiar foto de perfil
                                    </button>';
                                }
                            ?>

                            <div id="subirImagen">
                                <input type="file" class="form-control" id="datosImagen" name="datosImagen">
                                <img class="previsualizar">
                            </div>
                        </div>	

                        <div class="col-md-9 col-sm-8" style="margin-left:-13px;">
                            <br>
                                
                            <?php

                                if($_SESSION["modo"] != "directo"){

                                    echo '<label class="control-label text-uppercase" style="margin:7px 0 4px 13px;">Nombre:</label>
                                        <div class="input-group" style="margin:0 13px;">
                                            <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                            <input type="text" class="form-control"  value="'.$_SESSION["nombre"].'" readonly>
                                        </div>                  

                                        <label class="control-label text-uppercase" style="margin:22px 0 4px 13px;">Correo Electrónico::</label>
                                        <div class="input-group" style="margin:0 13px;">
                                            <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                            <input type="text" class="form-control"  value="'.$_SESSION["email"].'" readonly>
                                        </div>       

                                        <label class="text-uppercase box-title" style="margin:22px 0 4px 13px;">Modo de Registro en el Sistema:</label>
                                        <div class="input-group" style="margin:0 13px;">
                                            <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                                            <input type="text" class="form-control text-uppercase"  value="'.$_SESSION["modo"].'" readonly>
                                        </div>       

                                    <br>';

                                }else{
                                    
                                    echo '<label class="control-label text-uppercase" for="editarNombre" style="margin:7px 0 4px 13px;">Cambiar Nombre:</label>
                                        <div class="input-group" style="margin:0 13px;">
                                            <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                            <input type="text" class="form-control" id="editarNombre" name="editarNombre" value="'.$_SESSION["nombre"].'">
                                        </div>             
                                        
                                        <label class="control-label text-uppercase"style="margin:22px 0 4px 13px;" for="editarEmail">Cambiar Correo Electrónico:</label>
                                        <div class="input-group" style="margin:0 13px;">
                                            <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                            <input type="text" class="form-control" id="editarEmail" name="editarEmail" value="'.$_SESSION["email"].'">
                                        </div>       

                                        <label class="control-label text-uppercase" style="margin:22px 0 4px 13px;" for="editarPassword">Cambiar Contraseña:</label>
                                        <div class="input-group" style="margin:0 13px;">
                                            <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                                            <input type="text" class="form-control" id="editarPassword" name="editarPassword" placeholder="Escribe la nueva contraseña">
                                        </div>       

                                    <button type="submit" class="btn btn-info btn-flat" style="margin:10px 0 0 13px;">Actualizar Datos</button>';

                                }

                            ?>

                        </div>

                        <?php
                            $actualizarPerfilUsuario = new ControladorUsuarios();
                            $actualizarPerfilUsuario -> ctrActualizarPerfil();
                        ?>		

                    </form>

                    <button class="btn btn-danger btn-md mb-5 pull-right" style="margin: 10px;"  id="eliminarUsuario">Eliminar cuenta</button>

                    <?php
                        $borrarUsuario = new ControladorUsuarios();
                        $borrarUsuario -> ctrEliminarUsuario();
                    ?>	
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>