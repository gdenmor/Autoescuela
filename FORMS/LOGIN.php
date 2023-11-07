<?php
    AUTOLOAD::AutoLoad();

            $mensajeError = "";


            $login = isset($_POST['login']) ? $_POST['login'] : "";
            $registro = isset($_POST['registro']) ? $_POST['registro'] : "";
            $usuario = isset($_POST['usuario']) ? strtoupper(str_replace(" ","",$_POST['usuario'])) : "";
            $password = isset($_POST['password']) ? strtoupper(str_replace(" ","",$_POST['password'])) : "";
            $id=null;


            if ($_SERVER['REQUEST_METHOD']=="POST"){
                if ($login) {
                    $existe = false;
                    $User = null;
                    $Usuarios = USER_REPOSITORY::FindAll();

                    if (is_array($Usuarios) &&count($Usuarios)> 0) {

                        for ($i = 0; $i < count($Usuarios); $i++) {
                            if (strtoupper(str_replace(" ","",$Usuarios[$i]->username)) == $usuario && strtoupper(str_replace(" ","",$Usuarios[$i]->password))) {
                                $User = $Usuarios[$i];
                                $existe = true;
                                $i=999;
                            }
                        }
    
                        if ($existe) {
                            if ($User->rol !== "") {
                                if ($User->rol == "ALUMNO") {
                                    SESSION::iniciaSesion("USER", $User, "http://localhost/AUTOESCUELA/index.php?menu=alumno");
                                } else if ($User->rol == "PROFESOR") {
                                    SESSION::iniciaSesion("USER", $User, "http://localhost/AUTOESCUELA/index.php?menu=profesor");
                                }else if ($User->rol == "ADMINISTRADOR") {
                                    SESSION::iniciaSesion("USER", $User, "http://localhost/AUTOESCUELA/index.php?menu=admin");
                                }
                            } else if ($User->rol==null){
                                $mensajeError = "El usuario está a la espera de ser aprobado";
                            }
                        } else {
                            $mensajeError = "El usuario no existe";
                        }
                    }else {
                        $mensajeError="El usuario no existe";
                    }
                }
                }
    
                if ($registro) {
                    $existe = false;
                    $Usuarios = USER_REPOSITORY::FindAll();

                    if (is_array($Usuarios) && count($Usuarios) > 0) {
                        
                        for ($i = 0; $i < count($Usuarios); $i++) {
                            if (strtoupper(str_replace(" ","",$Usuarios[$i]->username)) == $usuario && strtoupper(str_replace(" ","",$Usuarios[$i]->password))) {
                                $existe = true;
                            }
                        }
    
                        if ($existe) {
                            $mensajeError = "El usuario ya existe";
                        } else {
                            if ((strlen($usuario)>0&&strlen($usuario)<=45)&&(strlen($password)>0&&strlen($password)<=45)){
                                $User = new USER($id,$usuario, $password, null);
                                USER_REPOSITORY::Insert($User);
                            }else{
                                $mensajeError="Debe de tener entre 1 y 45 caracteres tanto el usuario como la contraseña";
                            }
                        }
                    }else{
                        if ((strlen($usuario)>0&&strlen($usuario)<=45)&&(strlen($password)>0&&strlen($password)<=45)){
                            $User = new USER($id,$usuario, $password, null);
                            USER_REPOSITORY::Insert($User);
                        }else{
                            $mensajeError="Debe de tener entre 1 y 45 caracteres tanto el usuario como la contraseña";
                        }
                    }
    
    
                }

                if ($mensajeError != "") {
                    $mensajeError = '<p id="error">' . $mensajeError . '</p>';
                }
            
            ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/login.css">
</head>

<body id="cuerpo">
    <div id="contenedor">
        <main>
            <section id="imagen">
                <img src="IMAGES/LOGO.png">
            </section>
        <form method="post">
            <section id="usuario">
                <article id="lblUsuario">
                    <label><b> Usuario: </b></label>
                </article>
                <article id="contrasenia">
                    <input type="text" name="usuario" size="45">
                </article>
            </section>
            <section id="contraseña">
                <article id="lblContrasena">
                    <label><b> Contraseña: </b></label>
                </article>
                <article>
                    <input type="password" name="password" size="45">
                </article>
            </section>
            <section id="divbotones">
                <article class="botones">
                    <input type="submit" value="REGISTRARSE" name="registro">
                </article>
                <article class="botones">
                    <input type="submit" value="INICIAR SESIÓN" name="login">
                </article>
            </section>
            <section id="forgot_password">
                <a id="link" href="http://localhost/AUTOESCUELA/index.php?menu=olvida_contraseña">¿Has olvidado tu contraseña?</a>
            </section>

            <section id="diverror">
                <?php
                if ($mensajeError != "") {
                    echo $mensajeError;
                }
            ?>
            </section>
        </form>
        </main>
        
    </div>
</body>

</html>