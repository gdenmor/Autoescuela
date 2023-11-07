<?php
    //SELECT
    require_once "../HELPERS/AUTOLOAD.php";
    AUTOLOAD::AutoLoad();
    if ($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET["id"];
        $Pregunta=PREGUNTA_REPOSITORY::FindBy($id);
        $Preg= new stdClass();
        $Preg->id=$id;

        $Categoria=$Pregunta->getCategoria();
        $Cat= new stdClass();
        $Cat->id=$Categoria->getId();
        $Cat->nombre=$Categoria->getNombre();
        $Preg->Categoria=$Cat;

        $Dificultad=$Pregunta->getDificultad();
        $Dif=new stdClass();
        $Dif->id=$Dificultad->getId();
        $Dif->nombre=$Dificultad->getNom();

        $Preg->Dificultad=$Dif;
        $Preg->Enunciado=$Pregunta->getEnunciado();
        $Preg->rep1=$Pregunta->getr1();
        $Preg->rep2=$Pregunta->getrep2();
        $Preg->rep3=$Pregunta->getrep3();
        $Preg->correcta=$Pregunta->getcorrecta();
        $Preg->url=$Pregunta->getUrl();
        $Preg->tipo=$Pregunta->getTipo();
        echo json_encode($Preg);
    }
    //ACTUALIZA
    if ($_SERVER["REQUEST_METHOD"]=="PUT"){
        $_PUT = array();
        $cuerpo = file_get_contents("php://input");
        $id=$_GET["id"];
        parse_str($cuerpo, $_PUT);
        $_PUT['id'] = $id;
        $Pregunta=json_decode($cuerpo);
        PREGUNTA_REPOSITORY::UpdateById($id,$Pregunta);
        echo "Pregunta actualizada";
    }
    //BORRA
    if ($_SERVER["REQUEST_METHOD"]=="DELETE"){
        $_DELETE = array();
        $id=$_GET["id"];
        parse_str($id, $_DELETE);
        $_DELETE['id'] = $id;
        PREGUNTA_REPOSITORY::DeleteById($_DELETE['id']);
        echo "Pregunta borrada";
    }
    //AÑADE
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $objeto=file_get_contents("php://input");
        $Pregunta=json_decode($objeto);
        PREGUNTA_REPOSITORY::Insert($Pregunta);
        echo "Pregunta insertada";

    }


?>