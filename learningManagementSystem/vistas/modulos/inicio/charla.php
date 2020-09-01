<?php

    require "vistas/modulos/funciones.php";

    $item = "id";
    $valor = $_SESSION["id"];

    $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

    echo '
    <input type="hidden" name="nameUserChatGroup" id="nameUserChatGroup" value="'.$usuario["nombre"].'">
    <input type="hidden" name="photoUserChatGroup" id="photoUserChatGroup" value="'.$usuario["foto"].'">
    <input type="hidden" name="groupChatGroup" id="groupChatGroup" value="'.$usuario["grupo"].'">
    <input type="hidden" name="idUserChatGroup" id="idUserChatGroup" value="'.$usuario["id"].'">';

?>

<!-- Chat box -->
<div class="box box-success">
    <div class="box-header">
        <i class="fas fa-comments"></i>

        <h3 class="box-title">Chat</h3>

        <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
        <div class="btn-group" data-toggle="btn-toggle">
            <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
            </button>
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
        </div>
        </div>
    </div>
    <div class="box-body chat direct-chat-warning" id="chat-box">

        <?php
        
            $item = "grupo";
            $valor = $_SESSION["grupo"];
            $chat = ControladorChatGroup::ctrMostrarChatGroup($item, $valor);

            foreach($chat as $key => $value){

                if($value["id_usuario"] == $_SESSION["id"]){
                    echo '
                    <div class="direct-chat-msg right">';
                }else{
                    echo '
                    <div class="direct-chat-msg">';
                }
                        echo '<div class="direct-chat-info clearfix">';
                            if($value["id_usuario"] == $_SESSION["id"]){
                                echo '<span class="direct-chat-name pull-right">'.$value["nombre"].'</span>
                                <span class="direct-chat-timestamp pull-left">';echo fecha($value["fecha"]);'</span>';
                            }else{
                                echo '<span class="direct-chat-name pull-left">'.$value["nombre"].'</span>
                                <span class="direct-chat-timestamp pull-right">';echo fecha($value["fecha"]);'</span>';
                            }
                        echo '</div>
                        <img class="direct-chat-img" src="'.$value["foto"].'" alt="message user image">
                        <div class="direct-chat-text">'.$value["informacion"].'</div>
                    </div>';
        
            }
        
        ?>
    </div>
    <!-- /.chat -->
    <div class="box-footer">
        <form action="#" id="form-chatGroup" method="post">
            <div class="input-group">
                <input type="text" name="comment" id="commentChatGroup" placeholder="Escribir mensaje..." class="form-control">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-warning btn-flat">Enviar</button>
                </span>
            </div>
        </form>
    </div>
</div>
<!-- /.box (chat box) -->