<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "inicio") {
        require_once '../Autoescuela/FORMS/LOGIN.php';
    }
    if ($_GET['menu'] == "olvida_contraseña") {
        require_once '../Autoescuela/FORMS/FORGOT_PASSWORD.php';
    }
    if ($_GET['menu'] == "profesor") {
        require_once '../Autoescuela/FORMS/TEACHER_ROL.php';
     
    }
    if ($_GET['menu'] == "alumno") {
        require_once '../Autoescuela/FORMS/ALUMN_ROL.php';
     
    }

    if ($_GET['menu'] == "admin") {
        require_once '../Autoescuela/FORMS/ADMIN_ROL.php';
     
    }

    if ($_GET['menu']=="crea"){
        require_once "../Autoescuela/FORMS/CREAUSUARIOS.php";
    }

    if ($_GET['menu']=="borra"){
        require_once "../Autoescuela/FORMS/BORRAUSUARIOS.php";
    }

    if ($_GET['menu']=="examen"){
        require_once "../Autoescuela/FORMS/EXAMEN.php";
    }

    if ($_GET['menu']=="visualizacion"){
        require_once "../Autoescuela/FORMS/VISUALIZA_EXAMEN.php";
    }

    if ($_GET['menu']=="practica"){
        require_once "../Autoescuela/FORMS/PRACTICAEXAMEN.php";
    }


}

    

    
