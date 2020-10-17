<!--==============================================
  WAITING ROOM
================================================-->

<?php
    $url = Route::ctrRoute();
?>

<div class="containerVerify">

	<div id="containerBoxVerify">
        <div class="content">
            <h3>¡Opss!</h3>
            <h4>No puedes ingresar al sistema</h4>
            <p>¡Parece que tu administrador no te ha dado permiso para ingresar al LMS!</p>

            <a style="font-size:15px;" href="<?php echo $url; ?>">Volver</a>
		</div>
    </div>
</div>

<script type="text/javascript">
    var containerBoxVerify = document.getElementById('containerBoxVerify');
    window.onmousemove = function(e){
        var x = e.clientX/5,
            y = e.clientY/5;

        containerBoxVerify.style.backgroundPositionX = x + 'px';
        containerBoxVerify.style.backgroundPositionY = y + 'px';
    }
</script>