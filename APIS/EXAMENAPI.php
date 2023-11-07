<?php
    //SELECT
    require_once "../HELPERS/AUTOLOAD.php";
    AUTOLOAD::AutoLoad();
    if ($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET['id'];
        $Examen=TEST_REPOSITORY::FindBy($id);

        $Ex=new stdClass();
        $Ex->id=$id;
        $Ex->fechahora=$Examen->getFechahora();

        $Trys = $Examen->getIntento();

        $Intento=[];

        for ($i= 0;$i<count($Trys);$i++){
            $Intento[]=$Trys[$i];
        }

        $Ex->Intentos=$Intento;

        $Users=$Examen->getUser();

        $Ex->Usuarios=$Users;

        $Preguntas=$Examen->getPreguntas();

        $Ex->preguntas=$Preguntas;
    
        
        
        echo json_encode($Ex);
    }

    //ACTUALIZA
    if ($_SERVER["REQUEST_METHOD"]=="PUT"){
        $_PUT = array();
        $cuerpo = file_get_contents("php://input");
        $id=$_GET["id"];
        parse_str($Examen, $_PUT);
        $Examen=json_decode($cuerpo);
        $_PUT['id'] = $id;
        TEST_REPOSITORY::UpdateById($id,$Examen);
        echo "Pregunta actualizada";
    }
    //BORRA
    if ($_SERVER["REQUEST_METHOD"]=="DELETE"){
        $_DELETE = array();
        $id=$_GET["id"];
        parse_str($id, $_DELETE);
        $_DELETE['id'] = $id;
        TEST_REPOSITORY::DeleteById($_DELETE['id']);
        echo "Pregunta borrada";
    }
    //AÑADE
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $objeto=file_get_contents("php://input");
        $Intento=json_decode($objeto);
        TEST_REPOSITORY::Insert($Intento);
        echo "Pregunta insertada";

    }

?>