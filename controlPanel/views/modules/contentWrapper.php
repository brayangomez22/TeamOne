<!--==============================================
 CONTENT WRAPPER. CONTAINS PAGE CONTENT 
================================================-->
<div class="content-wrapper">
    <!--==============================================
    CONTENT HEADER (PAGE HEADER) 
    ================================================-->
    <section class="content-header">
        <h1>
            Tablero
            <small>Panel de Control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tablero</li>
        </ol>
    </section>

    <!--==============================================
    MAIN CONTENT 
    ================================================-->
    <section class="content">
        <div class="row">
            <?php
                include "home/topBoxes.php";
            ?>
        </div>

        <div class="row">
            <?php
                include "home/visits.php";
            ?>
        </div>

        <div class="row">
            <?php
                include "home/latestMembers.php";
            ?>
        </div>
    </section>
</div>