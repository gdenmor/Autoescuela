<?php
    require_once "../HELPERS/AUTOLOAD.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/alumn_rol.css">
    <script src="../JS/ROL_ALUMN.js"></script>
</head>
<body>
    <div id="container">
        <div id="menu">
            <nav>
                <div class="elementos" id="logo">
                    <img src="../IMAGES/LOGO.png">
                </div>
                <div class="elementos">
                    <a><button class="boton">GENERAR EXÁMENES</button></a>
                    <div class="elementos_desplegable">
                        <div class="elementos">
                            <a><b>INICIAL</b></a>
                        </div>
                        <div class="elementos">
                            <a><b>MEDIO</b></a>
                        </div>
                        <div class="elementos">
                            <a><b>DIFÍCIL</b></a>
                        </div>
                    </div>
                </div>
                <div class="elementos">
                    <a><button class="boton">REPETIR</button></a>
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
                    <img src="../IMAGES/Captura de pantalla 2023-10-29 114459.png">
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
                        <tr>
                            <td>GABRIEL</td>
                            <td>7/10</td>
                            <td>1</td>
                            <td><input type="button" value="VISUALIZAR"></td>
                        </tr>

                    </tbody>
                </table>
        </div>




    </div>
</body>
</html>
