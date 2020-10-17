<?php

class ControllerPrices{

	/*==============================================
	 PRICES 
	/*=============================================*/

	public function ctrPrices(){

		if(isset($_POST["idUser"])){

			$table = "solicitudes_lms";
			$item = "id_usuario";
			$valor = $_POST["idUser"];

			$reply = ModelUsers::mdlShowUsers($table, $item, $valor);
			
			if($reply == null){

				$data = array("id_usuario"=>$_POST["idUser"],
							  "id_institucion"=>$_POST["id_institucion"],
							  "nombre"=>$_POST["nombre"],
							  "labor"=>$_POST["labor"],
							  "mensaje"=>$_POST["message-text"]);

				$reply2 = ModelPrices::mdlPrices($table, $data);

                if($reply2 == "ok"){

                    echo '<script> 
    
                        swal({
                            title: "¡OK!",
                            text: "¡Su solicitud ha sido enviada, muy pronto le responderemos!",
                            type: "success",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        });
    
                    </script>';

                }
				
			}else{

				echo'<script>

					swal({
						  title: "¡ERROR!",
						  text: "¡Usted ya solicitud este servicio!",
						  type: "error",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					});

				</script>';

			}

		}

	}

}