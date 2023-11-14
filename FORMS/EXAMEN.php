<?php
    SESSION::CreaSesion();
    $User = SESSION::leer_session("USER");
    if ($User==null){
        SESSION::Cerrar_Sesion();
    }
?>

    <div id="container">
        <div id="countdown">Tiempo restante: <span id="timer">0:00</span></div>


    </div>