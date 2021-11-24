<?php
    include "web/php/menu.php";
?>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/globalStyles.css">
    <title>Jildam</title>
</head>
<body onload='alertLogin("inicio")' class="index">
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
     <footer style="background-color:#2244;">
    <?php require "fotter/footer.php"; ?>
    </footer>
</body>
<script src="Scripts/functions.js"></script>
<script src="Scripts/bootstrap.bundle.js"></script>
</html>