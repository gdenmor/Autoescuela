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
}

    

    
