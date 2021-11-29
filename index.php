<?php
    require_once "php/functions/conexion.php";
    include "php/functions/checkSession.php";
    checkSession(1);
    include "php/presetHTML/menu.php";
?>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/globalStyles.css">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Jildam</title>
</head>
<body class="index">
    <section id="logSec">
        <div id="LogedOut">
            <h2>¡Bienvenido/a!</h2>
            <p>¡Hola! Somos un gestor de contraseñas de código abierto, eso significa que cualquier persona puede encontrar y solucionar errores, aumentando la eficacia del sistema. Sumado a eso, contamos con un apartado de "Perfil" donde podrás modificar tu perfil a tu gusto, cambiando la imagen, el nombre y el usuario. ¿Qué esperas para ingresar?</p>
            <form>
                <div id="logInSec" class="LogedOut__Div">
                    <label>Puede ingresar a su cuenta</label>
                    <button type="button" class="btn btn-primary" id="boton" onclick="location.href='login.php'">Ingresar</button>
                </div>
                
                <div id="registerSec" class="LogedOut__Div">
                    <label>Puede crear una cuenta</label>
                    <button type="button" class="btn btn-primary" id="boton" onclick="location.href='register.php'">Registrarse</button>
                </div>
            </form>
        </div>
    </section>
    <footer style="margin-top: 7.5em;">
        <?php include "php/presetHTML/footer.php"; ?>
    </footer>
</body>
<script src="js/globalFunctions.js"></script>
<script src="js/bootstrap.bundle.js"></script>
</html>