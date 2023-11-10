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
    <div id="container-alumno">
        <div id="menu">
            <nav id="nav-alumno">
                <div class="elementos-alumno" id="logo">
                    <img src="IMAGES/LOGO.png">
                </div>
                <div class="elementos-alumno">
                    <a><input type="button" class="boton-alumno" value="GENERAR EXAMENES"></input></a>
                    <div class="elementos_desplegable-alumno">
                        <div class="elementos-alumno">
                            <a><b>FÁCIL</b></a>
                        </div>
                        <div class="elementos-alumno">
                            <a><b>MEDIO</b></a>
                        </div>
                        <div class="elementos-alumno">
                            <a><b>DIFÍCIL</b></a>
                        </div>
                    </div>
                </div>
                <div class="elementos-alumno">
                    <a><input type="button" class="boton-alumno" value="REPETIR EXAMEN"></input></a>
                    <div class="elementos_desplegable-alumno">
                        <?php 
                        $user=SESSION::leer_session('USER');
                        $ExamenesUsuario=TEST_REPOSITORY::ExamenesUsuario($user->id);
                        for ($i= 0; $i < count($ExamenesUsuario); $i++) {
                            echo
                                '<div class="elementos-alumno">
                                    <a class="Examenes"><b>'."Examen"." ".$ExamenesUsuario[$i]->id.'</b></a>
                                </div>';
                        }
                        ?>
                    </div>
                </div>
            <form method="post">
                <div id="elementos-alumno">
                    <a><input type="button" name="logout" class="boton-alumno" value="CERRAR SESIÓN"></input></a>
                </div>
            </form>
            </nav>
        </div>

        <?php
            $user= SESSION::leer_session('USER');
        echo '  <div id="padre-alumno">
                    <div>
                        <div id="rol">'
                            .$user->rol.'
                        </div> 
                        <div>'
                            .$user->username.'
                            <br> 
                            <b>AUTOESCUELA PROYECTO</b>
                            <input id="idUser" type="hidden" value="'.$user->getId().'">
                        </div>
                    </div>
                </div>';

        ?>
        

        <div id="historico">
            <table id="tabla-alumno">
                <thead>
                    <tr>
                        <th>FECHA</td>
                        <th>ID EXAMEN</th>
                        <th>VISUALIZAR</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       $user=SESSION::leer_session('USER');
                       $Intentos=TRY_REPOSITORY::IntentosdeUnUsuario($user->id);
                       if ($Intentos==null){

                       }else{
                            for ($i= 0; $i < count($Intentos); $i++) {
                                echo'<tr class="fila">
                                        <td>'.$Intentos[$i]->getfecha().'</td>
                                        <td>'.$Intentos[$i]->getIdExamen().'</td>
                                        <td><input type="button" value="VISUALIZAR"></td>
                                    </tr>';
                            }
                       }


                    ?>
                </tbody>
            </table>
        </div>




    </div>
</div>