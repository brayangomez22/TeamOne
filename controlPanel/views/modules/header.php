<!--==============================================
 HEADER  
================================================-->
<header class="main-header">

    <!--==============================================
        LOGO 
    ================================================-->
    <a href="index2.html" class="logo">
        <span class="logo-mini"><b>A</b>LT</span>
        <span class="logo-lg"><b>Team</b>One</span>
    </a>

    <!--==============================================
        HEADER --- NAVBAR 
    ================================================-->
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!------- NAVBAR RIGHT -------->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo $_SESSION["foto"]; ?>" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="<?php echo $_SESSION["foto"]; ?>" class="img-circle" alt="User Image">

                        <p>
                        <?php echo $_SESSION["nombre"]; ?> -- <?php echo $_SESSION["perfil"]; ?> 
                        </p>
                    </li>

                    <li class="user-footer">
                        <div class="pull-right">
                            <a href="leave" class="btn btn-default btn-flat">Salir</a>
                        </div>
                    </li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>

    </nav>
</header>