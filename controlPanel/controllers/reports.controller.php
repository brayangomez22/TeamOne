<?php

class ControladorReportes{

    /*==============================================
     DESCARGAR REPORTE EN EXCEL  
    /*=============================================*/

    public function ctrDescargarReportes(){

        if(isset($_GET["reporte"])){

            $tabla = $_GET["reporte"];

            $reporte = ModeloReportes::mdlDescargarReporte($tabla);

            /*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$nombre = $_GET["reporte"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$nombre.'"');
            header("Content-Transfer-Encoding: binary");
            
			/*=============================================
			REPORTE DE VISITAS
			=============================================*/

			if($_GET["reporte"] == "visitaspersonas"){	

				echo utf8_decode("<table border='0'> 

					<tr> 

						<td style='font-weight:bold; border:1px solid #eee;'>IP</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>PAÍS</td>
						<td style='font-weight:bold; border:1px solid #eee;'>VISITAS</td>
						<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>	

					</tr>");

				foreach ($reporte as $key => $value) {

					echo utf8_decode("<tr>
				 			
						<td style='border:1px solid #eee;'>".$value["ip"]."</td>
						<td style='border:1px solid #eee;'>".$value["pais"]."</td>
						<td style='border:1px solid #eee;'>".$value["visitas"]."</td>
						<td style='border:1px solid #eee;'>".$value["fecha"]."</td>
						
					</tr>"); 		
							
				}
	
				echo "</table>";

			}

			/*=============================================
			REPORTE DE USUARIOS
			=============================================*/

			if($_GET["reporte"] == "usuarios"){	

				echo utf8_decode("<table border='0'> 

					<tr> 

						<td style='font-weight:bold; border:1px solid #eee;'>ID INSTITUCIÓN</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>LABOR</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>GRUPO</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>PASSWORD</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>EMAIL</td>
						<td style='font-weight:bold; border:1px solid #eee;'>ESTADO</td>
						<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>	

					</tr>");

				foreach ($reporte as $key => $value) {

					echo utf8_decode("<tr>
						 
						<td style='border:1px solid #eee;'>".$value["id_institucion"]."</td>
						<td style='border:1px solid #eee;'>".$value["nombre"]."</td>
						<td style='border:1px solid #eee;'>".$value["labor"]."</td>
						<td style='border:1px solid #eee;'>".$value["grupo"]."</td>
						<td style='border:1px solid #eee;'>".$value["password"]."</td>
						<td style='border:1px solid #eee;'>".$value["email"]."</td>
						<td style='border:1px solid #eee;'>");

					/*=============================================
  					REVISAR ESTADO
  					=============================================*/


					if($value["verificacion"] == 1){
						
						$estado = "Desactivado";			  			

					}else{
						
						$estado = "Activado";
					
					}	

					echo utf8_decode($estado."</td>
					 
				 		<td style='border:1px solid #eee;'>".$value["fecha"]."</td>
			 					  	 
			 		</tr>"); 		

				}


			echo "</table>";

			}


        }

    }

}