
<?php
                    require_once "../REPOSITORYS/USER_REPOSITORY.php";
                    require_once "../ENTITYS/USER.php";
                    $usuario=isset($_POST['user'])?$_POST['user']:"";
                    $password=isset($_POST['password'])?$_POST['password']:"";
                    $repeat_password=isset($_POST['repeat_password'])?$_POST['repeat_password']:"";
                    $existe=false;
                    $mensajeError="";
                    $user="";

                    $users=USER_REPOSITORY::FindAll();
                    if ($_SERVER['REQUEST_METHOD']=="POST"){
                        for ($i= 0;$i<count($users);$i++){
                            if ($users[$i]->getUsername()==$usuario){
                                $existe=true;
                                $user=new User($users[$i]->getUsername(),$users[$i]->getPassword(),$users[$i]->getRol());
                                
                            }
                        }
    
                        if ($existe){
                            if ($password==$repeat_password){
                                if ((strlen($usuario)>0&&strlen($usuario)<=45)&&(strlen($password)>0&&strlen($password)<=45)){
                                    $user->setPassword($password);
                                    $user->setUsername($usuario);
                                    USER_REPOSITORY::UpdateById($usuario,$user);
                                    header("Location: http://localhost/AUTOESCUELA/index.php");
                                }else{
                                    $mensajeError="Debe de tener entre 1 y 45 caracteres tanto el usuario como la contraseña";
                                }
                            }else{
                                $mensajeError="Las contraseñas no coinciden";
                            }
                        }else{
                            $mensajeError= "No existe este usuario";
                        }
    
                        $mensajeError='<p id="mensaje_error">'.$mensajeError.'</p>';
                    }
                
                ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contraseña olvidada</title>
    <link rel="stylesheet" href="../CSS/forgot_password.css">
</head>
<body id="cuerpo">
    <div id="container">
        <div id="enlace">
            <h2 id="letralink"><u>¿Has olvidado tú contraseña?</u></h2>
        </div>
        <form method="post" id="form" action="FORGOT_PASSWORD.php">
            <div class="campos">
                <div>
                    <label> Introduzca su usuario: </label>
                </div>
                <div>
                    <input type="text" name="user" size="45">
                </div>
            </div>
            <div class="campos">
                <div>
                    <label> Introduzca su nueva contraseña: </label>
                </div>
                <div>
                    <input type="password" name="password" size="45">
                </div>
            </div>
            <div class="campos">
                <div>
                    <label> Repita la contraseña de nuevo: </label>
                </div>
                <div>
                    <input type="password" name="repeat_password" size="45">
                </div>
            </div>
            <div id="cambiar">
                <input type="submit" value="CAMBIAR CONTRASEÑA">
            </div>
        </form>
        <div>
                <?php
                if (isset($mensajeError) && $mensajeError !== "") {
                    echo $mensajeError;
                }

                ?>
            </div>
    </div>
</body>
</html>

