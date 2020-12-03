<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Presentacion proyecto</title>
	<?php
		$url = Route::ctrRoute();

		echo '<link rel="icon" href="'.$url.'assets/images/logo.png">';
	?>

	<!--==============================================
	 STYLES 
	================================================-->

	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/table.min.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/hero.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/table.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/frontBack.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/footer.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!--==============================================
	 DATA TABLE 
	================================================-->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/dataTable/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/dataTable/css/responsive.bootstrap.min.css">

	<script src="<?php echo $url; ?>assets/dataTable/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo $url; ?>assets/dataTable/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo $url; ?>assets/dataTable/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo $url; ?>assets/dataTable/js/responsive.bootstrap.min.js"></script>
</head>
<body>

	<?php
	
		include "modules/hero.php";
		include "modules/actors.php";
		include "modules/table.php";
		include "modules/objective.php";
		include "modules/normalize.php";
		include "modules/diagram.php";
		include "modules/backend.php";
		include "modules/frontend.php";
		include "modules/description.php";
		include "modules/synthesis.php";
		include "modules/footer.php";

	?>

	<!------- SCRIPT -------->
	<script src="<?php echo $url; ?>assets/js/lax.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/script.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableUsers.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableInstitutions.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableRequests.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableInbox.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableUploadTasks.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableChatGroup.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableComments.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableAnswersComments.js" type="text/javascript"></script>
	<script src="<?php echo $url; ?>assets/js/tableLikes.js" type="text/javascript"></script>

</body>
</html>
