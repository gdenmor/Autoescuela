<?php
    //SELECT
    require_once "../HELPERS/AUTOLOAD.php";
    AUTOLOAD::AutoLoad();
    if ($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET["id"];
        $Dificultad=DIFICULTAD_REPOSITORY::FindBy($id);
        $Dif= new stdClass();
        $Dif->id=$id;
        $Dif->name=$Dificultad->getNom();
        echo json_encode($Dif);
    }
    //ACTUALIZA
    if ($_SERVER["REQUEST_METHOD"]=="PUT"){
        $_PUT = array();
        $cuerpo = file_get_contents("php://input");
        $id=$_GET["id"];
        parse_str($cuerpo, $_PUT);
        $_PUT['id'] = $id;
        //$objeto=file_get_contents("php://input");
        //$usuario=json_decode($objeto);
        $Dificultad=new DIFICULTAD($_PUT['id'],"Medio");
        DIFICULTAD_REPOSITORY::UpdateById($id,$Dificultad);
        echo "Dificultad actualizada";
    }
    //BORRA
    if ($_SERVER["REQUEST_METHOD"]=="DELETE"){
        $_DELETE = array();
        $id=$_GET["id"];
        parse_str($id, $_DELETE);
        $_DELETE['id'] = $id;
        //$objeto=file_get_contents("php://input");
        //$usuario=json_decode($objeto);
        DIFICULTAD_REPOSITORY::DeleteById($_DELETE['id']);
        echo "Dificultad borrada";
    }
    //AÑADE
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        //$objeto=file_get_contents("php://input");
        $Dificultad=new DIFICULTAD(1,"Fácil");
        DIFICULTAD_REPOSITORY::Insert($Dificultad);
        echo "Dificultad insertada";
    }


?>