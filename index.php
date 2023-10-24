<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/login.css">
</head>
<body id="cuerpo">
    <div>
        <div>
            <img src="IMAGES/LOGO.png">
        </div>
        <form method="post" action="FORMS/LOGIN.php">
            <div id="usuario">
                <div>
                    <label id="lblUsuario"> Usuario </label>
                </div>
                <div id="contrasenia">
                    <input type="text" name="usuario">
                </div>
            </div>
            <div id="contraseña">
                <div>
                    <label> Contraseña </label>
                </div>
                <div>
                    <input type="password" name="password">
                </div>
            </div>
            <div>
                <div>
                    <input type="submit" value="REGISTRARSE" name="registro">
                </div>
                <div>
                    <input type="submit" value="INICIAR SESIÓN" name="login">
                </div>
            </div>
            <div>
                <?php 
                if (isset($mensajeError)){
                    echo $mensajeError;
                }
                ?>
                
            </div>
        </form>
    </div>
</body>
</html>

<?php
    require_once "REPOSITORYS/USER_REPOSITORY.php";
    require_once "../ENTITYS/USER.php";
    require_once "../HELPERS/SESSION.php";



    $login=isset($_POST['login'])? $_POST['login']:"";
    $registro=isset($_POST['registro'])?$_POST['registro']:"";
    $usuario=isset($_POST['usuario'])?$_POST['usuario']:"";
    $password=isset($_POST['password'])?$_POST['password']:"";

    if ($login){
        $existe=false;
        $User=null;
        $Usuarios=USER_REPOSITORY::FindAll();
        for ($i= 0; $i < count($Usuarios); $i++){
            if ($Usuarios[$i]->getUsername()==$usuario&& $Usuarios[$i]->getPassword()==$password){
                $User=$Usuarios[$i];
            }
        }

        if ($existe){
            if ($User->getRol()!==null){
                if ($User->getRol()=="ALUMNO"){
                    iniciaSesion("USER",$User,"http://localhost/AUTOESCUELA/FORMS/ALUMN_ROL.html");
                }else if ($User->getRol()== "PROFESOR"){
                    iniciaSesion("USER",$User,"http://localhost/AUTOESCUELA/FORMS/TEACHER_ROL.html");
                }
            }else{
                $mensajeError="El usuario está a la espera de ser aprobado";
            }
        }else{
            $mensajeError="El usuario no existe";
        }
    }

    if ($registro){
        $existe=false;
        $Usuarios=USER_REPOSITORY::FindAll();
        for ($i= 0; $i < count($Usuarios); $i++){
            if ($Usuarios[$i]->getUsername()==$usuario&& $Usuarios[$i]->getPassword()==$password|| $Usuarios[$i]->getUsername()==$usuario){
                $existe=true;
            }
        }

        if ($existe){
            $mensajeError="El usuario ya existe";
            header("Location: http://localhost/AUTOESCUELA/index.php");
        }else{
            $User=new USER($usuario,$password,null);
            USER_REPOSITORY::Insert($User);
        }
    }

?>