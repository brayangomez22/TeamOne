<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Buzón
        <small>13 nuevos mensajes</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
        <li class="active">Componer Email</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="bandeja-de-entrada" class="btn btn-primary margin-bottom">De regreso a la bandeja de entrada</a>
            </div>
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Redactar nuevo mensaje</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <form method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="text" name="asunto" class="form-control" placeholder="Asunto:">
                            </div>
                            <div class="form-group">
                                <input type="email" name="nombreEmailUsuario" class="form-control" placeholder="Para:">
                            </div>
                            <div class="form-group">
                                <textarea id="compose-textarea" name="mensajeEmail" class="form-control" style="height: 200px"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fa fa-paperclip"></i> Adjunto archivo
                                    <input type="file" id="archivo[]" name="attachment" multiple="">
                                </div>
                                <p class="help-block">Por favor que el nombre de su archivo no tenga espaciados entre cada palabra.</p>
                                <p class="help-block">Maximo. 32MB</p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope"></i> Enviar</button>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                        <?php
                            $enviarEmail = new ControladorEmails();
                            $enviarEmail -> ctrCrearEmail();
                        ?>
                    </form>
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->