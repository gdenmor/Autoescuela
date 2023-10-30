<?php
    require_once "../HELPERS/AUTOLOAD.php";
    AutoLoad();

    SESSION::CreaSesion();

    if ($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET["id"];

        $usuario=USER_REPOSITORY::FindBy($id);

        var_dump($usuario);

    

        echo json_encode($usuario);
    }






?>