<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../AUTOESCUELA/CSS/crea_usuarios.css">
    <script src="../AUTOESCUELA/JS/CREAUSUARIOS.js"></script>
</head>
<body>
    <div>
        <nav id="navegacion">
            <div>
                <img src="../AUTOESCUELA/IMAGES/LOGO.png">
            </div>
            <div class="BOTONES">
                <a href="http://localhost/AUTOESCUELA/index.php?menu=crea"><input type="button" value="CREAR USUARIOS"></a>
            </div>
            <div class="BOTONES" id="borrar">
                <a><input type="button" value="BORRAR USUARIOS"></a>
            </div>
            <div id="CIERRA">
                <input type="submit" value="CERRAR SESIÓN">
            </div>
        </nav>

        <table border="1">
            <thead>
                <th>USUARIO</th>
                <th>CONTRASEÑA</th>
                <th>ROL</th>
                <th>ACEPTAR/RECHAZAR</th>
            </thead>
            <tbody id="cuerpo">
                <tr>
                    <td><input id="usuario" type="text" name="usuario"></td>
                    <td><input id="contrasena" type="text" name="contrasena"></td>
                    <td><select><option>ALUMNO</option><option>PROFESOR</option></td>
                    <td><input id="crear" type="submit" name="crear" value="Crear"></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>