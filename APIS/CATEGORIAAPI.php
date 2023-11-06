<?php
    //SELECT
    require_once "../HELPERS/AUTOLOAD.php";
    AUTOLOAD::AutoLoad();
    if ($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET["id"];
        $Categoria=CATEGORIA_REPOSITORY::FindBy($id);
        $Cat= new stdClass();
        $Cat->id=$id;
        $Cat->name=$Categoria->getNombre();
        echo json_encode($Cat);
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
        $Categoria=new CATEGORIA($_PUT['id'],"Prioridad de paso");
        CATEGORIA_REPOSITORY::UpdateById($id,$Categoria);
        echo "Categoría actualizada";
    }
    //BORRA
    if ($_SERVER["REQUEST_METHOD"]=="DELETE"){
        $_DELETE = array();
        $id=$_GET["id"];
        parse_str($id, $_DELETE);
        $_DELETE['id'] = $id;
        //$objeto=file_get_contents("php://input");
        //$usuario=json_decode($objeto);
        CATEGORIA_REPOSITORY::DeleteById($_DELETE['id']);
        echo "Categoría borrada";
    }
    //AÑADE
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        //$objeto=file_get_contents("php://input");
        $Categoria=new CATEGORIA(1,"Cargas");
        CATEGORIA_REPOSITORY::Insert($Categoria);
        echo "Categoría insertada";

    }


?>