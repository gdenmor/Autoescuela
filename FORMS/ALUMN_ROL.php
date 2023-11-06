<?php
    AUTOLOAD::AutoLoad();
    SESSION::CreaSesion();
    $User = SESSION::leer_session("USER");
    if ($User==null){
        SESSION::Cerrar_Sesion();
    }
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $logout=$_POST['Cerrar_sesion'];
        if ($logout){
            SESSION::Cerrar_Sesion();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/alumn_rol.css">
    <script src="JS/ROL_ALUMN.js"></script>
</head>

<body>
    <div id="container">
        <div id="menu">
            <nav>
                <div class="elementos" id="logo">
                    <img src="IMAGES/LOGO.png">
                </div>
                <div class="elementos">
                    <a><input type="button" class="boton" value="GENERAR EXAMENES"></input></a>
                </div>
                <div class="elementos">
                    <a><input type="button" class="boton" value="REPETIR EXAMEN"></input></a>
                    <div class="elementos_desplegable">
                        <div class="elementos">
                            <a><b>EXAMEN 1</b></a>
                        </div>
                        <div class="elementos">
                            <a><b>EXAMEN 2</b></a>
                        </div>
                        <div class="elementos">
                            <a><b>EXAMEN 3</b></a>
                        </div>
                    </div>
                </div>

                <div id="login">
                    <img src="IMAGES/Captura de pantalla 2023-10-29 114459.png">
                </div>
            </nav>
        </div>

        <div id="historico">
            <table border="1">
                <thead>
                    <tr>
                        <td>NOMBRE</td>
                        <td>CALIFICACIÓN</td>
                        <td>NÚMERO DE INTENTO</td>
                        <td>VISUALIZAR</td>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>




    </div>
</body>

</html>