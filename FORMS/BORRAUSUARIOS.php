<?php
    SESSION::CreaSesion();
    
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $logout=isset($_POST["logout"]) ? $_POST["logout"] :"";
        if ($logout){
            SESSION::Cerrar_Sesion();
        }
    }


?>
    <div>
        <nav id="navegacion">
            <div>
                <a href="http://localhost/AUTOESCUELA/index.php?menu=admin"><img src="../AUTOESCUELA/IMAGES/LOGO.png"></a>
            </div>
            <div class="BOTONES">
                <a href="http://localhost/AUTOESCUELA/index.php?menu=crea"><input type="button" value="CREAR USUARIOS"></a>
            </div>
            <div class="BOTONES" id="borrar">
                <a href="http://localhost/AUTOESCUELA/index.php?menu=borra"><input type="button" value="BORRAR USUARIOS"></a>
            </div>
            <form method="post">
            <div id="CIERRA">
                <input type="submit" value="CERRAR SESIÓN" name="logout">
            </div>
            </form>
        </nav>

        <div id="divtablaborra">
        <table border="1">
            <thead>
                <th>ID</th>
                <th>USUARIO</th>
                <th>CONTRASEÑA</th>
                <th>ROL</th>
                <th>ACEPTAR/RECHAZAR</th>
            </thead>
            <tbody id="cuerpo">
                <?php
                    $Users=USER_REPOSITORY::FindAll();

                    for ($i=0;$i<count($Users);$i++) {
                        $User=$Users[$i];

                        echo'<tr>
                                <td> '.$User->getId() . '</td>
                                <td> ' .$User->getUsername(). '</td>
                                <td>'. $User->getPassword(). '</td>
                                <td>  <select> <option> ALUMNO </option> <option> PROFESOR </option> </td>
                                <td><form method="post" class="user_form"><input id="aceptar" class="acepta" name="aceptar'.$i.'" type="submit" value="BORRAR"></form> </td>
                            </tr>';
                    }


                ?>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>