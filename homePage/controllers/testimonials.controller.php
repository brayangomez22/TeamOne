<?php

class ControllerTestimonials{

    /*==============================================
     MOSTRAR TODOS LOS TESTIMONIOS  
    /*=============================================*/

    public function ctrShowTestimonials(){

        $table = "testimonios";

        $reply = ModelTestimonials::mdlShowTestimonials($table);

		return $reply;

    }

}