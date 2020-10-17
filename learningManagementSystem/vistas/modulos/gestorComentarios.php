<?php

  require_once "funciones.php";

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Gestor Comentarios
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
        <li><a href="#">Publicaciones del colegio</a></li>
        </ol>
    </section>

    <!--==============================================
    HACER COMENTARIO  
    ================================================-->

    <section class="content">
        <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">CK Editor
                <small>Avanzado y lleno de características</small>
                </h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <form method="POST">
                  <textarea id="editor1" name="mensaje" rows="10" cols="80"></textarea>
                  <div>   
                    <input type="submit" class="btn btn-primary pull-right" style="margin-top:7px;" value="Publicar"></input>
                  </div>

                  <?php       
                    $comentarios = new ControladorComentarios();
                    $comentarios -> ctrCrearComentarios();
                  ?>
                </form>
            </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>

    <!--==============================================
     PUBLICACIONES  
    ================================================-->
    <!-- Main content -->
    <section class="content comentarios">

      <!-- row -->
      <div class="row">

        <div class="col">
          <ul class="timeline">

            <?php

                $tabla3 = "usuarios";
                $item = "email";
                $valor = $_SESSION["email"];
                $usuario = ModeloUsuarios::mdlMostrarUsuarios($tabla3, $item, $valor);

                echo '<input type="hidden" id="usuario" value="'.$usuario["id"].'">
                <input type="hidden" id="nombre" value="'.$usuario["nombre"].'">';

                /*==============================================
                TRAER EL TOTAL DE COMENTARIOS 
                /*=============================================*/

                $item2 = "id_institucion";
                $valor2 = $_SESSION["id_institucion"];

                $traerComentarios = ControladorComentarios::ctrMostrarComentarios($item2, $valor2);

                $totalComents = count($traerComentarios);

                echo '
                  <li class="time-label">
                    <span class="bg-green">
                      '.$totalComents.' Publicaciones
                    </span>
                  </li>
                ';
                
                foreach($traerComentarios as $key => $value){

                  date_default_timezone_set('America/Bogota');
      
                  $date1 = new DateTime($value["fecha"]);
                  $date2 = new DateTime("now");
                  $diff = $date1->diff($date2);
                  $hora = ($diff->days * 24 ) * 60  + ( $diff->i ) . ' minutes';

                  /*==============================================
                    TRAER TODAS LAS RESPUESTAS DE LOS COMENTARIOS
                  /*=============================================*/
                  
                  $item = "id_comentario";
                  $valor = $value["id"];
                  $respuestaComentarios = ControladorComentarios::ctrMostrarRespuestasComentarios($item, $valor);

                  echo '
                  <!-- PUBLICACIONES -->
                  <li class="publicaciones">
                    <i class="fa fa-comments bg-yellow"></i>
      
                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o" style="margin-right:10px;"></i>'.fecha($value["fecha"]).'</span>
      
                      <div style="display:flex;">
                        <a href="#" class="foto">';

                          if($value["foto"] != ""){
                            echo '<img src="'.$value["foto"].'" alt="" width="100%" class="img-circle">';
                          }else{
                            echo '<img src="assets/img/default/anonymous.jpg" alt="" width="100%" class="img-circle">';
                          }
                          
                        echo '</a>
                        <h3 class="timeline-header" style="text-align:center;"><a href="#">'.$value["nombre"].'</a> compartio publicidad</h3>
                      </div>

                      <div class="timeline-body">
                        '.$value["comentarios"].'
                      </div>
                      <div class="timeline-footer">
                        <div class="content-like">  
                          <span class="heart" id="'.$value["id"].'"></span>
                          <span class="text">Like</span>
                          <span class="numb" id="like_'.$value["id"].'">'.$value["me_gustas"].'</span>
                        </div>';

                        if($value["respuestas"] == 1){
                          echo '<a class="MostrarCampoRespuesta btn btn-danger btn-xs pull-right" id="'.$value["id"].'" style="position:relative; bottom:30px;">Responder</a>';
                          echo '<button class="MostrarComentario  btn btn-danger btn-xs pull-right" style="position:relative; bottom:30px;margin-right:10px;" id="'.$value["id"].'" respuestas="'.$value["respuestas"].'">Ver Respuesta</button>';
                        }elseif($value["respuestas"] == 0){
                          echo '<a class="MostrarCampoRespuesta btn btn-danger btn-xs pull-right" id="'.$value["id"].'" style="position:relative; bottom:30px;">Responder</a>';
                        }else{
                          echo '<a class="MostrarCampoRespuesta btn btn-danger btn-xs pull-right" id="'.$value["id"].'" style="position:relative; bottom:30px;">Responder</a>';
                          echo '<button class="MostrarComentario btn btn-danger btn-xs pull-right" style="position:relative; bottom:30px;margin-right:10px;" id="'.$value["id"].'" respuestas="'.$value["respuestas"].'">Ver '.$value["respuestas"].' Respuestas</button>';
                        }
                      echo '</div>
                    </div>

                    <hr>

                    <!--==============================================
                      CAMPO PARA RESPONDER  
                    ================================================-->
                    <div class="timeline-item manco'.$value["id"].'" style="display:none;">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
      
                      <div style="display:flex;">
                        <a href="#" class="foto">';
                          if($_SESSION["foto"] != ""){
                            echo '<img src="'.$_SESSION["foto"].'" width="100%" class="img-circle">';
                          }else{
                            echo '<img src="assets/img/default/anonymous.jpg" class="img-circle" width="100%">';
                          }                  
                        echo '</a>
                        <h3 class="timeline-header" style="text-align:center;"><a href="#">Hola!</a> da una respuesta a este comentario</h3>
                      </div>

                      <div class="timeline-body">
                        <form method="post">
                                <textarea name="respuesta_comentario" placeholder="Da una respuesta"></textarea>
                                <input type="hidden" name="oculto" value="'.$value["id"].'"></input>

                                <div class="timeline-footer">
                                  <input type="submit" name="responder" value="Responder" class="btn btn-primary mt-3"></input>
                                </div>
                        </form>
                      </div>
                    </div>

                    <!--==============================================
                      RESPUESTAS
                    ================================================-->';
                    foreach($respuestaComentarios as $key => $value2){
                      if($value2["id_comentario"] == $value["id"]){
                        echo '<div class="timeline-item brayan'.$value["id"].'" style="display:none;">
                          <span class="time"><i class="fa fa-clock-o" style="margin-right:10px;"></i>'.fecha($value2["fecha"]).'</span>
                          <h3 class="timeline-header"><a href="#">'.$value2["nombre"].'</a> respondio a este comentario</h3>
  
                          <div class="timeline-body">
                            '.$value2["comentario"].'
                          </div>
                          <hr>
                        </div>';
                      }
                    }

                  echo '</li>';
                }

                $respuestaComentarios2 = new ControladorComentarios();
                $respuestaComentarios2 -> ctrRespuestasComentarios();
            ?>
        
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
</div>


