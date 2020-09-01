<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor Blog
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
        <li class="active">Mi perfil</li>
      </ol>
    </section>

    <!--==============================================
     PERFIL  
    ================================================-->

    <section class="content">
    
        <div class="row">
        <div class="col-md-3">
    
            <!-- Profile Image -->
            <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="vistas/dist/img/user4-128x128.jpg" alt="User profile picture">
    
                <h3 class="profile-username text-center">Nina Mcintire</h3>
    
                <p class="text-muted text-center">Ingeniera de software</p>
    
                <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Seguidores</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                    <b>Siguiendo</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                    <b>Amigos</b> <a class="pull-right">13,287</a>
                </li>
                </ul>
    
                <a href="#" class="btn btn-primary btn-block"><b>Seguir</b></a>
            </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->
    
            <!-- About Me Box -->
            <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Sobre mí</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Educación</strong>
    
                <p class="text-muted">
                B.S. en Informática de la Universidad de Tennessee en Knoxville
                </p>
    
                <hr>
    
                <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong>
    
                <p class="text-muted">Colombia, Medellin</p>
    
                <hr>
    
                <strong><i class="fas fa-pencil-ruler margin-r-5"></i> Habilidades</strong>
    
                <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
                </p>
    
                <hr>
    
                <strong><i class="fas fa-file-alt margin-r-5"></i> Notas</strong>
    
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab">Actividad</a></li>
                <li><a href="#timeline" data-toggle="tab">Cronograma</a></li>
                <li><a href="#settings" data-toggle="tab">Configuraciones</a></li>
                <li><a href="#editarPerfil" data-toggle="tab">Editar perfil</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <?php
                        include "perfil/actividad.php";
                    ?>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="timeline">
                    <?php
                        include "perfil/cronograma.php";
                    ?>
                </div>
                <!-- /.tab-pane -->
    
                <div class="tab-pane" id="settings">
                    <?php
                        include "perfil/configuraciones.php";
                    ?>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="editarPerfil">
                    <?php
                        include "perfil/editarPerfil.php";
                    ?>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>