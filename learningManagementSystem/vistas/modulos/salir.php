<?php

session_destroy();

$url = Ruta::ctrRuta();

echo '<script>
    window.location = "'.$url.'";
</script>';