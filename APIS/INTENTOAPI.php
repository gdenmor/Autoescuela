<?php
    //SELECT
    require_once "../HELPERS/AUTOLOAD.php";
    AUTOLOAD::AutoLoad();
    if ($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET["id"];
        $Intento=TRY_REPOSITORY::FindBy($id);
        $Int= new stdClass();
        $Int->id=$id;

        $Usuario=$Intento->getUser();

        $User=new stdClass();
        $User->id=$Usuario->getId();
        $User->nombre=$Usuario->getUsername();
        $User->password=$Usuario->getPassword();
        $User->rol=$Usuario->getRol();

        $Userss=new stdClass();
        $Userss->usuarios=$User;

        $Int->usuarios=$Userss;
        $JSONRespuestas=$Intento->getJsonFileRespuestas();
        $JSON=new stdClass();
        $JSON->jsonrespuestas=$JSONRespuestas;
        $Int->JSONrespuestas=$JSON;
        $Int->fechaRealizado=$Intento->getfecha();

        $Int->idExamen=$Intento->getIdExamen();



        echo json_encode($Int);
    }
    //ACTUALIZA
    if ($_SERVER["REQUEST_METHOD"]=="PUT"){
        $_PUT = array();
        $cuerpo = file_get_contents("php://input");
        $id=$_GET["id"];
        parse_str($cuerpo, $_PUT);
        $_PUT['id'] = $id;
        TRY_REPOSITORY::UpdateById($id,$Pregunta);
        echo "Pregunta actualizada";
    }
    //BORRA
    if ($_SERVER["REQUEST_METHOD"]=="DELETE"){
        $_DELETE = array();
        $id=$_GET["id"];
        parse_str($id, $_DELETE);
        $_DELETE['id'] = $id;
        TRY_REPOSITORY::DeleteById($_DELETE['id']);
        echo "Pregunta borrada";
    }
    //AÑADE
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $objeto=file_get_contents("php://input");
        $intento=json_decode($objeto);
        $calificacion=0;
        $respuestas=json_decode($intento->JSON);
        $preguntas=PREGUNTA_REPOSITORY::PreguntasdeUnExamen($intento->idExamen);
        for ($i=0;$i<count($preguntas);$i++){
            if ($preguntas[$i]->correcta==$respuestas[$i]){
                $calificacion=$calificacion+1;
            }
        }

        $intento->calificacion=$calificacion;

        TRY_REPOSITORY::Insert($intento);

    }


?>