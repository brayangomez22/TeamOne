<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        LMS
        <small>Learning Management System</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Inicio <?php echo $_SESSION["labor"]?></a></li>
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
        <?php
          if($_SESSION["labor"] == "estudiante" || $_SESSION["labor"] == "profesor"){
            echo '
              <div class="col-lg-6 connectedSortable ui-sortable">';
                include "inicio/charla.php";
              echo '</div>
              <div class="col-lg-6 connectedSortable ui-sortable">';
                include "inicio/estudiantes-de-mi-grupo.php";
              echo '</div>
            ';
          }else{
            echo '
              <div class="col-lg-12 connectedSortable ui-sortable">';
                include "inicio/perfiles.php";
            echo '</div>';
          }
        ?>
      </div>
    </section>
    <!-- /.content -->
</div>