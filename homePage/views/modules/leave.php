<?php

session_destroy();

$url = Route::ctrRoute();

if(!empty($_SESSION['id_token_google'])){
    unset($_SESSION['id_token_google']);
}

echo '<script>
    
    localStorage.removeItem("usuario");
    localStorage.clear();
    window.location = "'.$url.'";

</script>';