<?php
    $url = Ruta::ctrRuta();
?>

<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php
           if(isset($_SESSION["validarSesion"])){
                if($_SESSION["foto"] != ""){
                    echo '<img src="'.$_SESSION["foto"].'" class="user-image">';
                }else{
                    echo '<img src="assets/img/default/anonymous.jpg" class="user-image">';
                }  
           }
           echo '<span class="hidden-xs">'.$_SESSION["nombre"].'</span>';
        ?>
    </a>

    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <?php
                if(isset($_SESSION["validarSesion"])){
                    if($_SESSION["foto"] != ""){
                        echo '<img src="'.$_SESSION["foto"].'" class="img-circle">';
                    }else{
                        echo '<img src="assets/img/default/anonymous.jpg" class="img-circle">';
                    } 
                }
                echo '<p>'.$_SESSION["nombre"].' - '.$_SESSION["labor"].'</p>';
            ?>
        </li>

        <li class="user-footer">
            <div class="pull-right">
                <a href="salir" class="btn btn-default btn-flat">Salir</a>
            </div>
        </li>
    </ul>
</li>