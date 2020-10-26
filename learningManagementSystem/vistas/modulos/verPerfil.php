<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor Perfil
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
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#editarPerfil" data-toggle="tab">Editar perfil</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="editarPerfil">
                            <?php
                                include "perfil/editarPerfil.php";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>