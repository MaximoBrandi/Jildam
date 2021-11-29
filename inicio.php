<?php
    require_once "php/functions/conexion.php";
    include "php/functions/checkSession.php";
    checkSession(0);
    include "php/presetHTML/menu.php";
    
    if(isset($_SESSION["Login"])){
        $sql = "SELECT username FROM users WHERE id=" . $_SESSION["Login"];
        $res = consulta($conn, $sql);
        $txt_username = mysqli_fetch_assoc($res);
    }  
    ?>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="libraries/vex/vex.css">
    <link rel="stylesheet" href="libraries/vex/vex-theme-default.css">
    <link rel="stylesheet" href="libraries/alertify/alertify.min.css"/>
    <link rel="stylesheet" href="libraries/alertify/alertify-theme-default.min.css"/>
    <link rel="stylesheet" href="libraries/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="css/globalStyles.css">
    <script src="libraries/alertify/alertify.min.js"></script>
    <script src="libraries/vex/vex.js"></script>
    <script src="libraries/vex/vex.combined.min.js"></script>
    <script src="libraries/sweetalert2/sweetalert2.all.min.js"></script>
    <title>Jildam</title>
</head>
<body onload="inicioEvent()">
    <section id="optionsMenu" class="flex-column">
        <div id="menuBase">
            <div class="opcionElegida w-100">
                <form class="MenuOpcions__base " id="bienvenida">
                    <h2>Bienvenido, <?php echo $txt_username['username'] ?></h2>
                </form>
                <footer class="w-100" style="padding-bottom: 23em; margin-top: -3em;">
                        <?php include "php/presetHTML/footer.php"; ?>
                    </footer>
            </div>
            <div class="opcionMenu logged d-flex justify-content-around" id="logedOpcionMenu">
                <div class="opcionMenu logged d-flex justify-content-around" id="loged" style="border: none;">
                    <button class="btn btn-primary text-center managePasswords" id="opUser1">Gestionar Contraseñas</button>
                    <button class="btn btn-primary text-center manageProfile" id="opUser2">Perfil</button>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="js/globalFunctions.js"></script>
<script src="js/inicio.js"></script>
</html>