<?php
	$item = "grupo";
	$valor = $_SESSION["grupo"];

	$item2 = "id_institucion";
	$valor2 = $_SESSION["id_institucion"];

	$usuarios = ControladorUsuarios::ctrMostrarTotalUsuarios($item, $valor, $item2, $valor2, "fecha");

?>

<!--=====================================
ÚLTIMOS USUARIOS
======================================-->

<!-- USERS LIST -->
<div class="box box-danger">

	<!-- box-header -->
  	<div class="box-header with-border">
  
	    <h3 class="box-title">Estudiantes de mi grupo</h3>

	    <div class="box-tools pull-right">
	      
	      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	      </button>
	  
	    </div>

  	</div>
  	<!-- /.box-header -->

  	<!-- box-body -->
  	<div class="box-body no-padding">

	    <!-- users-list -->
	    <ul class="users-list clearfix">

			<?php

				$urlHomePage = Ruta::ctrRuta();
				$urlLMS = Ruta::ctrRutaLMS();
				
				if(count($usuarios) > 8){
					$totalUsuarios = 8;
				}else{
					$totalUsuarios = count($usuarios);
				}
			
				for($i = 0; $i < $totalUsuarios; $i++){

					if($usuarios[$i]["id"] != $_SESSION["id"]){
						if($usuarios[$i]["foto"] != ""){
							echo '<li>
								<img src="'.$urlLMS.$usuarios[$i]["foto"].'" alt="User Image" style="width:100%;">
								<a class="users-list-name" href="">'.$usuarios[$i]["nombre"].'</a>
								<span class="users-list-date">'.$usuarios[$i]["fecha"].'</span>
							</li>';
						}else{
							echo '<li>
								<img src="'.$urlLMS.'assets/img/default/anonymous.jpg" alt="User Image" style="width:100%;">
								<a class="users-list-name" href="">'.$usuarios[$i]["nombre"].'</a>
								<span class="users-list-date">'.$usuarios[$i]["fecha"].'</span>
							</li>';
						}
					}

				}

			?>

	    </ul>
	  	<!-- /.users-list -->

  	</div>
  	<!-- /.box-body -->

  	<!-- box-footer -->
  	<div class="box-footer text-center">
    	<a href="gestorEstudiantes" class="uppercase">Ver todos los estudiantes</a>
  	</div>
  	<!-- /.box-footer -->

</div>
<!-- USERS LIST -->