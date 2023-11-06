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
        //$objeto=file_get_contents("php://input");
        //$usuario=json_decode($objeto);
        $Categoria=new CATEGORIA(1,"Prioridad de paso");
        $Dificultad=new DIFICULTAD(1,"Medio");
        $Pregunta=new PREGUNTA($_PUT['id'], $Categoria,$Dificultad, '¿sdvvdsdssd?', 'Paris', 'Bedvdsvdsn', 'Madrid', 1, null,null);
        PREGUNTA_REPOSITORY::UpdateById($id,$Pregunta);
        echo "Pregunta actualizada";
    }
    //BORRA
    if ($_SERVER["REQUEST_METHOD"]=="DELETE"){
        $_DELETE = array();
        $id=$_GET["id"];
        parse_str($id, $_DELETE);
        $_DELETE['id'] = $id;
        //$objeto=file_get_contents("php://input");
        //$usuario=json_decode($objeto);
        PREGUNTA_REPOSITORY::DeleteById($_DELETE['id']);
        echo "Pregunta borrada";
    }
    //AÑADE
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        //$objeto=file_get_contents("php://input");
        $Categoria=new CATEGORIA(1,"Prioridad de paso");
        $Dificultad=new DIFICULTAD(1,"Medio");
        $Pregunta=new PREGUNTA(null, $Categoria,$Dificultad, '¿Otra?', 'Paris', 'Bedvdsvdsn', 'Madrid', 1, null,null);
        PREGUNTA_REPOSITORY::Insert($Pregunta);
        echo "Pregunta insertada";

    }


?>