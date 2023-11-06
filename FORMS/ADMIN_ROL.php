<?php
    require_once "../HELPERS/AUTOLOAD.php";
    AUTOLOAD::AutoLoad();

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Usuario=file_get_contents("php://input");
            echo $Usuario;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/admin_rol.css">
    <script src="../JS/ADMIN.js"></script>
</head>
<body>
    <div>
        <nav id="navegacion">
            <div>
                <img src="../IMAGES/LOGO.png">
            </div>
            <div class="BOTONES">
                <a><input type="button" value="CREAR USUARIOS"></a>
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
                <th>ID</th>
                <th>USUARIO</th>
                <th>CONTRASEÑA</th>
                <th>ROL</th>
                <th>ACEPTAR/RECHAZAR</th>
            </thead>
            <tbody id="cuerpo">
                <?php
                    require_once "../HELPERS/AUTOLOAD.php";
                    AUTOLOAD::AutoLoad();
                    $Users=USER_REPOSITORY::FindAll();

                    for ($i=0;$i<count($Users);$i++) {
                        $User=$Users[$i];

                        echo'<tr>
                                <td> '.$User->getId() . '</td>
                                <td> ' .$User->getUsername(). '</td>
                                <td>'. $User->getPassword(). '</td>
                                <td>  <select> <option> ALUMNO </option> <option> PROFESOR </option> </td>
                                <td><form method="post" class="user_form"><input id="aceptar" class="acepta" name="aceptar'.$i.'" type="submit" value="+"></form> </td>
                            </tr>';
                    }


                ?>
            </tbody>
        </table>
        </form>
    </div>
</body>
</html>