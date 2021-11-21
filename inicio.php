<?php
    include "web/php/menu.php";
    require_once "web/php/conexion.php";
    if(isset($_COOKIE['login'])){
        $sql = "SELECT username FROM users WHERE id=" . $_COOKIE['login'];
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/globalStyles.css">
    <title>Jildam</title>
</head>
<body onload='alertLogin("checkSession")'>
    <section id="optionsMenu">
        <div id="menuBase">
            <div class="opcionElegida w-100">
                <form class="MenuOpcions__base " id="bienvenida">
                    <h2>Bienvenido, <?php echo $txt_username['username'] ?></h2>
                </form>
            </div>
            <div class="opcionMenu logged d-flex justify-content-around" id="logedOpcionMenu">
                <div class="opcionMenu logged d-flex justify-content-around" id="loged" style="border: none;">
                    <button class="btn btn-primary w-25 text-center managePasswords" id="opUser1">Gestionar Contraseñas</button>
                    <button class="btn btn-primary w-25 text-center manageProfile" id="opUser2">Perfil</button>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="Scripts/index.js"></script>
<script src="Scripts/functions.js"></script>
<script src="Scripts/inicio.js"></script>
</html>