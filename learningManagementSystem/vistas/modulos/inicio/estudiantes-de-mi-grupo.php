<?php
	$item = null;
	$valor = null;

	$usuarios = ControladorUsuarios::ctrMostrarTotalUsuarios($item, $valor, "fecha");

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

				$urlServidor = Ruta::ctrRutaServidor();
				
				if(count($usuarios) > 8){
					$totalUsuarios = 8;
				}else{
					$totalUsuarios = count($usuarios);
				}
			
				for($i = 0; $i < $totalUsuarios; $i++){
					
					if($usuarios[$i]["foto"] != ""){
						if($usuarios[$i]["modo"] != "directo"){
							echo '<li>
								<img src="'.$usuarios[$i]["foto"].'" alt="User Image" style="width:100%;">
								<a class="users-list-name" href="">'.$usuarios[$i]["nombre"].'</a>
								<span class="users-list-date">'.$usuarios[$i]["fecha"].'</span>
							</li>';
						}else{
							echo '<li>
								<img src="'.$urlServidor.$usuarios[$i]["foto"].'" alt="User Image" style="width:100%;">
								<a class="users-list-name" href="">'.$usuarios[$i]["nombre"].'</a>
								<span class="users-list-date">'.$usuarios[$i]["fecha"].'</span>
							</li>';
						}
					}else{
						echo '<li>
							<img src="'.$urlServidor.'vistas/img/default/anonymous.png" alt="User Image" style="width:100%;">
							<a class="users-list-name" href="">'.$usuarios[$i]["nombre"].'</a>
							<span class="users-list-date">'.$usuarios[$i]["fecha"].'</span>
						</li>';
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