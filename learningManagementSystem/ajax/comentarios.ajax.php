<?php

require_once "../controladores/usuario.controlador.php";

require_once "../controladores/comentarios.controlador.php";
require_once "../modelos/comentarios.modelo.php";

class AjaxComentario{

    /*==============================================
     LIKE 
    /*=============================================*/

    public $id;
    public $usuario;
    public $nombre;

    public function ajaxEnviarLike(){

        $usuario = $this -> usuario;
        $nombreUsuario = $this -> nombre;

        /*==============================================
         COMPROBAR SI HAY LIKES  
        /*=============================================*/

        $tabla2 = "likes";
        $item2 = "id_comentario";
        $valor2 = $this -> id;
        $item3 = "id_usuario";
        $valor3 = $usuario;
        
        $comprobar = ModeloComentarios::mdlComprobarLike($tabla2, $item2, $valor2, $item3, $valor3);

        if ($comprobar == 0) {

            /*==============================================
             INSERTAR EL NUEVO LIKE  
            /*=============================================*/

            $datos = array("id_usuario"=>$valor3,
                                    "usuario"=>$nombreUsuario,
                                    "id_comentario"=>$valor2);

            $insert = ModeloComentarios::mdlInsertarNuevoLike($tabla2, $datos);

            /*==============================================
             ACTUALIZAR LA TABLA DE COMENTARIOS CON EL NUEVO LIKE 
            /*=============================================*/

            $tabla3 = "comentarios";
            $id = "id";
            $valor3 = $this -> id;
            $comprobar = ModeloComentarios::mdlMostarLike($tabla3, $id, $valor3);

            $meGustas = "me_gustas";
            $valorNuevo = round($comprobar["me_gustas"]) + 1;

            $update = ModeloComentarios::mdlActualizarLikeComentarios($tabla3, $meGustas, $valorNuevo, $id, $valor3);

        }else{

            /*==============================================
             ELIMINAR LIKE DE LA TABLA DE LIKES 
            /*=============================================*/

            $tabla2 = "likes";
            $item2 = "id_comentario";
            $valor2 = $this -> id;
            $item3 = "id_usuario";
            $valor3 = $usuario;

            $delete = ModeloComentarios::mdlEliminarLike($tabla2, $item2, $valor2, $item3, $valor3);

            /*==============================================
             ACTUALIZAR LA TABLA DE COMENTARIOS CON EL DECREMENTO DEL LIKE 
            /*=============================================*/

            $tabla3 = "comentarios";
            $id = "id";
            $valor3 = $this -> id;
            $comprobar = ModeloComentarios::mdlMostarLike($tabla3, $id, $valor3);
            
            $meGustas = "me_gustas";
            $valorNuevo = round($comprobar["me_gustas"]) - 1;

            $update = ModeloComentarios::mdlActualizarLikeComentarios2($tabla3, $meGustas, $valorNuevo, $id, $valor3);

        }

        /*==============================================
         MANDAR EL NUMERO DE LIKES A JAVASCRIPT 
        /*=============================================*/

        $tabla3 = "comentarios";
        $id = "id";
        $valor3 = $this -> id;
        $comprobar = ModeloComentarios::mdlMostarLike($tabla3, $id, $valor3);

        $likes = $comprobar["me_gustas"];

        echo ($likes);

    }

}

/*==============================================
    LIKE 
/*=============================================*/

if(isset($_POST["id"])){

    $like = new AjaxComentario();
    $like -> id = $_POST["id"];
    $like -> usuario = $_POST["usuario"];
    $like -> nombre = $_POST["nombre"];
    $like -> ajaxEnviarLike();

}