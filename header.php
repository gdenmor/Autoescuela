<header id="header">
            <?php
                SESSION::CreaSesion();

                

                if(SESSION::estaLogueado('USER'))
                {
                    $usuario =SESSION::leer_session('USER');

                        $rol = $usuario->getRol();
                        if($rol == "ALUMNO")
                        {
                            ?>
                                <div id="menu">
                                    <nav id="nav-alumno">
                                        <div class="elementos-profesor" id="loginalumno">
                                            <img src="IMAGES/LOGO.png">
                                        </div>
                                        <div class="elementos-profesor">
                                            <a class="link1"><input type="button" class="boton-alumno" value="GENERAR EXAMENES"></input></a>
                                            <div class="elementos_desplegable-alumno">
                                                <div class="elementos-alumno">
                                                    <a class="dificultad"><b>FÁCIL</b></a>
                                                </div>
                                                <div class="elementos-alumno">
                                                    <a class="dificultad"><b>MEDIO</b></a>
                                                </div>
                                                <div class="elementos-alumno">
                                                    <a class="dificultad"><b>DIFÍCIL</b></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementos-alumno">
                                            <a class="link1"><input type="button" class="boton-alumno" value="REPETIR EXAMEN"></input></a>
                                            <div class="elementos_desplegable-alumno">
                                                <?php 
                                                    $user=SESSION::leer_session('USER');
                                                    $ExamenesUsuario=TEST_REPOSITORY::ExamenesUsuario($user->getId());
                                                    if ($ExamenesUsuario!=null){
                                                        for ($i= 0; $i < count($ExamenesUsuario); $i++) {
                                                            echo
                                                                '<div class="elementos-alumno">
                                                                    <a class="Examenes"><b>'."Examen"." ".$ExamenesUsuario[$i]->getExamen()->getIds().'</b></a>
                                                                </div>';
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    <form method="post">
                                        <div id="elementos-alumno">
                                            <a class="link1"><input type="button" name="logout" class="boton-alumno" value="CERRAR SESIÓN"></input></a>
                                        </div>
                                    </form>
                                    </nav>
                                </div>
                            <?php
                        }

                        if($rol == "PROFESOR")
                        {
                            ?>
                                <div id="menu-profesor">
                                    <nav id="nav-profesor">
                                        <div class="elementos-profesor" id="loginprofesor">
                                            <img src="IMAGES/LOGO.png">
                                        </div>
                                        <div class="elementos-profesor">
                                            <a class="link1"><input type="button" class="boton-profesor" value="GENERAR EXAMENES CON PILA DE PREGUNTAS"></input></a>
                                        </div>
                                        <div class="elementos-profesor">
                                            <a class="link1" href="http://localhost/AUTOESCUELA/index.php?menu=preguntas"><input type="button" class="boton-profesor" value="CREAR PREGUNTAS"></input></a>
                                        </div>
                                        <div id="elementos-profesor">
                                            <a class="link1" href="http://localhost/AUTOESCUELA/index.php?menu=creaexamen"><input type="button" name="logout" class="boton-profesor" value="GENERAR EXAMENES SIN PILA DE PREGUNTAS"></input></a>
                                        </div>
                                    <form method="post">
                                        <div id="elementos-profesor">
                                            <a><input name="logout" type="button" name="logout" class="boton-alumno" value="CERRAR SESIÓN"></input></a>
                                        </div>
                                    </form>
                                    </nav>
                                </div>
                            <?php
                        }

                        if($rol == "ADMINISTRADOR")
                        {
                            ?>
                                <nav id="navegacion">
                                    <div id="si">
                                        <a class="link1" href="http://localhost/AUTOESCUELA/index.php?menu=admin"><img src="../AUTOESCUELA/IMAGES/LOGO.png"></a>
                                    </div>
                                    <div class="elementos-profesor">
                                        <a class="link1" href="http://localhost/AUTOESCUELA/index.php?menu=crea"><input type="button" value="CREAR USUARIOS"></a>
                                    </div>
                                    <div class="elementos-profesor" id="borrar">
                                        <a class="link1" href="http://localhost/AUTOESCUELA/index.php?menu=borra"><input type="button" value="BORRAR USUARIOS"></a>
                                    </div>
                                    <form method="post">
                                    <div id="elementos-profesor">
                                        <input type="submit" value="CERRAR SESIÓN" name="logout">
                                    </div>
                                    </form>
                                </nav>
                            <?php
                        }



                    }

?>
        </nav>
    </header>