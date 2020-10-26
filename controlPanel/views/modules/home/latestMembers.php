<!--==============================================
 LATEST MEMBERS 
================================================-->

<?php

	$usuarios = ControllerUser::ctrMostrarTotalUsuarios("fecha");

?>

<!--=====================================
ÚLTIMOS USUARIOS
======================================-->

<!-- USERS LIST -->
<div class="col-md-6">
    <div class="box box-danger">

        <!-- box-header -->
        <div class="box-header with-border">
    
            <h3 class="box-title">Últimos usuarios registrados</h3>

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

                    $urlLMS = Route::ctrRouteLearningManagementSystem();

                    if(count($usuarios) > 8){
                        $totalUsuarios = 8;
                    }else{
                        $totalUsuarios = count($usuarios);
                    }
                
                    for($i = 0; $i < $totalUsuarios; $i++){
                        
                        if($usuarios[$i]["foto"] != ""){
                            echo '<li>
                                <img src="'.$urlLMS.$usuarios[$i]["foto"].'" alt="User Image" style="width:100%;height:110px;">
                                <a class="users-list-name" href="">'.$usuarios[$i]["nombre"].'</a>
                                <span class="users-list-date">'.$usuarios[$i]["fecha"].'</span>
                            </li>';
                        }else{
                            echo '<li>
                                <img src="'.$urlLMS.'assets/img/default/anonymous.jpg" alt="User Image" style="width:100%;height:110px;">
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
        
            <a href="users" class="uppercase">Ver todos los usuarios</a>
    
        </div>
        <!-- /.box-footer -->

    </div>
</div>