<?php
    SESSION::CreaSesion();
    $User = SESSION::leer_session("USER");
    if ($User==null){
        SESSION::Cerrar_Sesion();
    }
?>
<div id="practica">

</div>