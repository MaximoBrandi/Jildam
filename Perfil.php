<?php
    include "web/php/menu.php";
    require_once "web/php/conexion.php";
    
    error_reporting(0);

    /* $consulta = "SELECT `email` FROM `users` WHERE `deleted` is null AND `user_id` = " . $_COOKIE["login"];
    $result = consulta($conn, $consulta);
    $row = mysqli_fetch_assoc($result);

    if ($row["email"] == null) {
        setcookie("login", "owo", time()-3600, "/");
    } */
    if (isset($_COOKIE["login"])) {
        $consulta = "SELECT `name`, `surname`, `biography`, `pfp` FROM `profiles` WHERE `user_id` = " . $_COOKIE["login"];
        $result = consulta($conn, $consulta);
        $row = mysqli_fetch_assoc($result);
    
        $consulta = "SELECT `username` FROM `users` WHERE `id` = " . $_COOKIE["login"];
        $result = consulta($conn, $consulta);
        $username = mysqli_fetch_assoc($result);
    
        if (isset($_POST["User"]) && isset($_POST["Name"]) && isset($_POST["surName"]) && isset($_POST["Bio"])){
            $sub_User = $_POST["User"];
            $sub_Name = $_POST["Name"];
            $sub_surName = $_POST["surName"];
            $sub_Bio = $_POST["Bio"];
            
            $User = strip_tags($sub_User);
            $Name = strip_tags($sub_Name);
            $surName = strip_tags($sub_surName);
            $Bio = strip_tags($sub_Bio);
    
            $consulta = "UPDATE `profiles` SET `name`='" . $conn->real_escape_string($Name) . "',`surname`='" . $conn->real_escape_string($surName) . "',`biography`='" . $conn->real_escape_string($Bio) . "'WHERE `user_id` = " . $_COOKIE["login"];
            $result = consulta($conn, $consulta);
            $consulta = "UPDATE `users` SET `username`='" . $conn->real_escape_string($User) . "' WHERE `id` = " . $_COOKIE["login"];
            $result = consulta($conn, $consulta);
            header("Location: Perfil.php");
        }

        $consulta = "SELECT `password` FROM `users` WHERE `id` = " . $_COOKIE["login"];
        $result = consulta($conn, $consulta);
        $pass = mysqli_fetch_assoc($result);

        if (isset($_POST["actu"]) && isset($_POST["nue1"]) && isset($_POST["nue2"])) {
            $passactu = md5($_POST["actu"]);
            if ($pass["password"] == $passactu) {
                if ($_POST["nue1"] == $_POST["nue2"]) {
                    $newpass = md5($_POST["nue1"]) ;
                    $sql = "UPDATE users SET password = '" . $newpass . "' WHERE id = " . $_COOKIE["login"];
                    consulta($conn, $sql);
                }
            }
        }

        if (isset($_POST["webIMG"])) {
            $image = $_POST["webIMG"];

            $sql = "UPDATE profiles SET pfp = '$conn->real_escape_string($image)' WHERE user_id = " . $_COOKIE["login"];
            consulta($conn, $sql);
        }else if($row["pfp"] !== ""){
            $image = $row["pfp"];
        }else{
            $image = "recursos/img/perfilRandom.png";
        }
    
        if ($pass["password"] == $_POST["oldPass"] && isset($_POST["oldPass"]) && isset($_POST["newPass"])){
            $newPass = $_POST["newPass"];
    
            $consulta = "UPDATE `users` SET `password`='" . $newPass . "' WHERE `id` = " . $_COOKIE["login"];
            $result = consulta($conn, $consulta);
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="recursos/img/icon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/libraries/vex.css">
    <link rel="stylesheet" href="css/libraries/vex-theme-default.css">
    <link rel="stylesheet" href="css/globalStyles.css">
    <script src="Scripts/index.js"></script>
    <script src="Scripts/functions.js"></script>
    <script src="Scripts/libraries/vex.js"></script>
    <script src="Scripts/libraries/vex.combined.min.js"></script>
    <title>Perfil</title>
</head>
<body onload='alertLogin("checkSession")'>
    <center>
        <section id="seccionOpciones">
            <nav id="navPerfil">
                <img src="<?php echo $image; ?>" id="photoPerfil" alt="Perfil"> <!-- Style.css -->
                <div id="opciones">
                    <button type="button" id="personalizarButton" onclick="window.history.replaceState('owo', 'uwu', '?sec=2');" class="btn btn-primary btn-lg botonOpcion">Personalizar</button>
                    <button type="button" id="PySButton" onclick="window.history.replaceState('owo', 'uwu', '?sec=1');" class="btn btn-secondary btn-lg botonOpcion">Privacidad y Seguridad</button>
                </div>
            </nav>
            <div id="contenido">
                <section id="Personalizar">
                    <div id="PerfilCambiar">
                        <img id="photoPerfilCambiar" src="<?php echo $image; ?>">
                        <button id="linkPerfilCambiar" class="link" onclick="changeUserPic()">Cambiar</button>
                    </div>
                    <form id="formContenido" class="text-center" action="Perfil.php" method="post">
                        <div class="input-group flex-column flex-nowrap w-75 mx-auto">
                            <label>Usuario</label>
                            <input type="text" class="form-control" value="<?php echo $username["username"];?>" name="User" aria-describedby="addon-wrapping" autocomplete="off">
                        </div>
                        <div class="input-group flex-column flex-nowrap w-75 mx-auto">
                            <label class="espacio">Nombre</label>
                            <input type="text" class="form-control" value="<?php echo $row["name"];?>" name="Name" aria-describedby="addon-wrapping" autocomplete="off">
                        </div>
                        <div class="input-group flex-column flex-nowrap w-75 mx-auto">
                            <label class="espacio">Apellido</label>
                            <input type="text" class="form-control" value="<?php echo $row["surname"];?>" name="surName" aria-describedby="addon-wrapping" autocomplete="off">
                        </div>
                        <div class="mb-3 espacio w-75 mx-auto">
                            <label>Biografía</label>
                            <textarea class="form-control" name="Bio" id="exampleFormControlTextarea1" rows="3"><?php echo $row["biography"];?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-75 mx-auto" id="btn-guardarPerfil">Guardar</button>
                    </form>
                </section>
                <section id="PyS" class="vanish">
                    <form action="Perfil.php" method="post">
                        <h2 class="espacio">Cambiar contraseña</h2>
                        <button type="button" onclick="alertChangePassword(getCookie('login'))" class="btn btn-danger">Cambiar contraseña</button>
                        <h2 class="espacio">Eliminar cuenta</h2>
                        <button type="button" onclick="alertDeleteAccount(getCookie('login'))" class="btn btn-danger">Eliminar cuenta</button>
                        <h2 class="espacio">Resetear contraseñas</h2>
                        <button type="button" onclick="alertDeletePasswords(getCookie('login'))" class="btn btn-danger">Resetear contraseñas</button>
                    </form>
                </section>
            </div>
        </section>
    </center>
    <script>
        if (getCookie("login")==null) {
            location.href = "index.php";
        }
    </script>
    <script src="Scripts/gestionarContrasenias.js"></script>
    <script src="Scripts/alerts.js"></script>
    <script src="Scripts/clickGestPass.js"></script>
    <script src="Scripts/passGenerator.js"></script>
</body>
</html>