<div class="comentarios">
                            <div class="col-auto foto">
                                <a href="#" class="mt-4">';
                                    if($_SESSION["modo"] == "directo"){
                                        if($_SESSION["foto"] != ""){
                                            echo '<img src="'.$_SESSION["foto"].'" width="10%">';
                                        }else{
                                            echo '<img src="'.$url.'vistas/img/default/anonymous.png">';
                                        }
                                    }

                                    if($_SESSION["modo"] == "facebook"){
                                        echo '<img src="'.$_SESSION["foto"].'" alt="">';
                                    }

                                    if($_SESSION["modo"] == "google"){
                                        echo '<img src="'.$_SESSION["foto"].'" alt="">';
                                    }
                                echo '</a>
                            </div>
                            <div class="col">
                                <form method="post">
                                    <div class="form-group">                                              
                                        <div class="input-group">
                                            <textarea name="respuesta_comentario" placeholder="Da una respuesta"></textarea>
                                            <input type="hidden" name="oculto" value="'.$value["id"].'"></input>
                                            <input type="submit" name="responder" value="Responder"></input>
                                        </div>
                                    </div>   
                                </form>
                            </div>';

                            foreach($respuestaComentarios as $key => $value2){
                                if($value2["id_comentario"] == $value["id"]){
                                    echo '<div class="row no-gutters comentario">
                                        <div class="col-auto foto">
                                            <a href="#">
                                                <img src="'.$value2["foto"].'" alt="">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <p class="respuesta">';

                                            echo $value2["comentario"];
                                            echo '</p><span><strong>Publicado el  </strong>'.$value2["fecha"].'</span>';

                                        echo '</div>
                                    </div>';
                                }
                            }
    
                        echo '</div>






                                            <!-- timeline item -->
                    <li>
                      <i class="fa fa-user bg-aqua"></i>
        
                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> Hace 5 minutos</span>
    
                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> acepto tu solicitud de amistad</h3>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-comments bg-yellow"></i>
        
                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> Hace 27 minutos</span>
        
                        <h3 class="timeline-header"><a href="#">Jay White</a> comentó tu publicación</h3>
        
                        <div class="timeline-body">
                          ¡Llévame hasta tu líder!
                          ¡Suiza es pequeña y neutral!
                          ¡Somos más como Alemania, ambiciosos e incomprendidos!
                        </div>
                        <div class="timeline-footer">
                          <a class="btn btn-warning btn-flat btn-xs">Ver comentario</a>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <li class="time-label">
                          <span class="bg-green">
                            3 Julio. 2014
                          </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-camera bg-purple"></i>
        
                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> Hace 2 dias</span>
        
                        <h3 class="timeline-header"><a href="#">Mina Lee</a> subió nuevas fotos</h3>
        
                        <div class="timeline-body">
                          <img src="http://placehold.it/150x100" alt="..." class="margin">
                          <img src="http://placehold.it/150x100" alt="..." class="margin">
                          <img src="http://placehold.it/150x100" alt="..." class="margin">
                          <img src="http://placehold.it/150x100" alt="..." class="margin">
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-video-camera bg-maroon"></i>
        
                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i>Hace 5 dias</span>
        
                        <h3 class="timeline-header"><a href="#">Mr. Doe</a> compartir video</h3>
        
                        <div class="timeline-body">
                          <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs"
                                    frameborder="0" allowfullscreen></iframe>
                          </div>
                        </div>
                        <div class="timeline-footer">
                          <a href="#" class="btn btn-xs bg-maroon">Ver comentarios</a>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->