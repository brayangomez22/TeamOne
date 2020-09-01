<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tablero
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
        <li><a href="#">Tablero</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <?php
          include "inicio/cajas-superiores.php";
        ?>
      </div>

      <div class="row">
        <div class="col-lg-6 connectedSortable ui-sortable">
          <?php
            include "inicio/charla.php";
            include "inicio/estudiantes-de-mi-grupo.php";
          ?>
        </div>
        <div class="col-lg-6 connectedSortable ui-sortable">
          <?php
            include "inicio/quehaceres.php";
          ?>
        </div>
      </div>
      <div class="row connectedSortable ui-sortable">
        <div class="col-lg-12">
          <?php
            include "inicio/chatDirecto.php";
          ?>
        </div>
      </div>

    </section>
    <!-- /.content -->
</div>