<?php
    SESSION::CreaSesion();
    $User = SESSION::leer_session("USER");
    if ($User==null){
        SESSION::Cerrar_Sesion();
    }

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $logout=$_POST['logout'];
        if ($logout){
            SESSION::Cerrar_Sesion();
        }
    }
?>

<div>
    <?php
        $user= SESSION::leer_session('USER');
        echo '<div>
                    <div>
                        <div id="rol">'
                            .$user->getRol().'
                        </div> 
                        <div>'
                            .$user->getUsername().'
                            <br> 
                            <b>AUTOESCUELA PROYECTO</b>
                            <input id="idUser" type="hidden" value="'.$user->getId().'">
                        </div>
                    </div>
                </div>';

    ?>
    <div id="container-profesor">
        <div id="menu-profesor">
            <nav id="nav-profesor">
                <div class="elementos-profesor" id="profesor">
                    <img src="IMAGES/LOGO.png">
                </div>
                <div class="elementos-profesor">
                    <a id="link1"><input type="button" class="boton-profesor" value="GENERAR EXAMENES CON PILA DE PREGUNTAS"></input></a>
                </div>
                <div class="elementos-profesor">
                    <a href="http://localhost/AUTOESCUELA/index.php?menu=preguntas"><input type="button" class="boton-profesor" value="CREAR PREGUNTAS"></input></a>
                </div>
                <div id="elementos-profesor">
                    <a href="http://localhost/AUTOESCUELA/index.php?menu=creaexamen"><input type="button" name="logout" class="boton-alumno" value="GENERAR EXAMENES SIN PILA DE PREGUNTAS"></input></a>
                </div>
            <form method="post">
                <div id="elementos-alumno">
                    <a><input name="logout" type="button" name="logout" class="boton-alumno" value="CERRAR SESIÓN"></input></a>
                </div>
            </form>
            </nav>
        </div>
        <div id="historico">
            <table id="tabla-profesor"border="1">
                <thead>
                    <tr>
                        <th>NOMBRE ALUMNO</td>
                        <th>ID EXAMEN</th>
                        <th>CALIFICACIÓN</th>
                        <th>ID INTENTO</td>
                        <th>VISUALIZACIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       $user=SESSION::leer_session('USER');
                       $Intentos=TRY_REPOSITORY::IntentosAlumno();
                       if ($Intentos==null){

                       }else{
                            for ($i= 0; $i < count($Intentos); $i++) {
                                echo '<input class="idIntento" type="hidden" value="'.$Intentos[$i]->getIdTry().'">';
                                echo'<tr class="fila">
                                        <td>'.$Intentos[$i]->getUser()->getUsername().'</td>
                                        <td>'.$Intentos[$i]->getIdExamen().'</td>
                                        <td>'.$Intentos[$i]->getCalificacion().'/10'.'</td>
                                        <td>'.$Intentos[$i]->getIdTry().'</td>
                                        <td><input type="button" value="VISUALIZAR"></td>
                                    </tr>';
                            }
                       }


                    ?>
                </tbody>
            </table>
        </div>