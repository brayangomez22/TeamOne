<?php

require_once "../modelos/chatGroup.modelo.php";

class AjaxChatGroup{

    /*==============================================
     CREATE COMMENT 
    /*=============================================*/

    public $name;
    public $photo;
    public $comment;
    public $group;
    public $id;
    public $idInstitucion;

    public function ajaxCrearComentario(){

        $tabla = "chat_group";

        $datos = array("name"=>$this->name,
                       "photo"=>$this->photo,
                       "comment"=>$this->comment,
                       "group"=>$this->group,
                       "id"=>$this->id,
                       "idInstitucion"=>$this->idInstitucion);

        $respuesta = ModeloChatGroup::mdlCrearComentario($tabla, $datos);

        echo $respuesta;

    }
    
}

/*==============================================
 CREATE COMMENT 
/*=============================================*/

if(isset($_POST["name"])){

    $createComment = new AjaxChatGroup();
    $createComment -> name = $_POST["name"];
    $createComment -> photo = $_POST["photo"];
    $createComment -> comment = $_POST["comment"];
    $createComment -> group = $_POST["group"];
    $createComment -> id = $_POST["id"];
    $createComment -> idInstitucion = $_POST["idInstitucion"];
    $createComment -> ajaxCrearComentario();

}