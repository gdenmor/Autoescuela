<?php
    require_once "../REPOSITORYS/USER_REPOSITORY.php";
    require_once "../ENTITYS/USER.php";



    $login=isset($_POST['login'])? $_POST['login']:"";
    $registro=isset($_POST['registro'])?$_POST['registro']:"";
    $usuario=isset($_POST['usuario'])?$_POST['usuario']:"";
    $password=isset($_POST['password'])?$_POST['password']:"";

    if ($login){

    }

    if ($registro){
        $existe=false;
        $Usuarios=USER_REPOSITORY::FindAll();
        for ($i= 0; $i < count($Usuarios); $i++){
            if ($Usuarios[$i]->getUsername()==$usuario&& $Usuarios[$i]->getPassword()==$password){
                $existe=true;
            }
        }

        if ($existe){
            echo "Este usuario ya existe";
        }else{
            $User=new USER($usuario,$password,null);
            USER_REPOSITORY::Insert($User);
            echo "Se ha registrado correctamente";
        }
    }

    





?>