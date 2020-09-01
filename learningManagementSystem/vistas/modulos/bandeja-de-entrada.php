
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Buzón
        <small>13 nuevos mensajes</small>
        </h1>
        <input type="hidden" id="emailUser" value="<?php echo $_SESSION["email"]?>">
        <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
        <li class="active">Buzón</li>
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
                        <table class="table table-bordered table-striped tablaEmail dt-responsive" width="100%">

                        <thead>
                            <tr>

                            <th>#</th>
                            <th>Visto</th>
                            <th>Nombres</th>
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
 VENTANA MODAL PARA VER LOS EMAILS  
================================================-->

<div class="modal fade" id="modalVerEmail" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-black-gradient">
                <h2 class="title text-center" id="asunto"></h2>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div style="display:flex;">
                    <h4>Tu amig@ te envio un correo electronico</h4>
                    <h4 style="position:absolute; right:20px;"><strong id="labor"></strong></h4>
                </div>
              
                <hr>
                <h4>Correo enviado desde <strong id="de"></strong></h4>
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

<?php

    $delete = new ControladorEmails();
    $delete -> ctrEliminarEmail();

?>