<?php
    SESSION::CreaSesion();
    $User = SESSION::leer_session("USER");
    if ($User==null){
        SESSION::Cerrar_Sesion();
    }
    
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
        <div id="divcrea">
        <table border="1">
            <thead>
                <th>USUARIO</th>
                <th>CONTRASEÑA</th>
                <th>ROL</th>
                <th>ACEPTAR/RECHAZAR</th>
            </thead>
            <tbody id="cuerpo">
                <tr>
                    <td><input id="usuario" type="text"></td>
                    <td><input id="contrasena" type="text"></td>
                    <td><select><option>ALUMNO</option><option>PROFESOR</option></select></td>
                    <td><input type="button" value="+" id="aceptar"></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>