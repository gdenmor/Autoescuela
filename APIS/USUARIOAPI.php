<?php
    //SELECT
    require_once "../HELPERS/AUTOLOAD.php";
    AUTOLOAD::AutoLoad();
    if ($_SERVER["REQUEST_METHOD"]=="GET"){
        $id=$_GET["id"];
        $Usuario=USER_REPOSITORY::FindBy($id);
        $userApi= new stdClass();
        $userApi->id=$id;
        $userApi->name=$Usuario->getUsername();
        $userApi->password=$Usuario->getPassword();
        $userApi->rol=$Usuario->getRol();
        echo json_encode($userApi);
    }
    //ACTUALIZA
    if ($_SERVER["REQUEST_METHOD"]=="PUT"){
        //$_PUT = array();
        $cuerpo = file_get_contents("php://input");
        $id=$_GET["id"];
        /*parse_str($cuerpo, $_PUT);
        $_PUT['id'] = $id;*/
        $usuario=json_decode($cuerpo);

        $user=new stdClass();
        $user->id=$id;
        $user->username=$usuario->username;
        $user->password=$usuario->password;
        $user->rol=$usuario->rol;
        USER_REPOSITORY::UpdateById($id,$user);
        echo "Usuario actualizado";
    }
    //BORRA
    if ($_SERVER["REQUEST_METHOD"]=="DELETE"){
        //$_DELETE = array();
        $id=$_GET["id"];
        //parse_str($id, $_DELETE);
        //$_DELETE['id'] = $id;
        USER_REPOSITORY::DeleteById($id);
        echo "Usuario borrado";
    }
    //AÑADE
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $objeto=file_get_contents("php://input");
        $user=json_decode($objeto);
        $usuario=new stdClass();
        $usuario->username=$user->username;
        $usuario->password=$user->password;
        $usuario->rol=$user->rol;
        USER_REPOSITORY::Insert($usuario);

    }


?>