<?php
    require_once "php/functions/conexion.php";
    include "php/functions/checkSession.php";
    checkSession(0);
    include "php/presetHTML/menu.php";
    
    error_reporting(0);
    
    $consulta = "SELECT users.username, `name`, `surname`, `biography`, `pfp` FROM `profiles` INNER JOIN users ON profiles.user_id = users.id WHERE `user_id` = " . $_SESSION["Login"];
    $result = consulta($conn, $consulta);
    $row = mysqli_fetch_assoc($result);
    if($row['pfp'] == ''){
        $image = 'img/circled-user-icon.svg';
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="libraries/vex/vex.css">
    <link rel="stylesheet" href="libraries/vex/vex-theme-default.css">
    <link rel="stylesheet" href="libraries/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="css/globalStyles.css">
    <script src="libraries/sweetalert2/sweetalert2.all.min.js"></script>
    <title>Perfil</title>
</head>
<body onLoad="profileEvents()">
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
                    <form id="formContenido" class="text-center" action="php/functions/perfil.php" method="post">
                        <div class="input-group flex-column flex-nowrap w-75 mx-auto">
                            <label>Usuario</label>
                            <input type="text" class="form-control" value="<?php echo $row["username"];?>" name="User" aria-describedby="addon-wrapping" autocomplete="off">
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
                    <form action="php/functions/perfil.php" method="post">
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
    <footer id="footerPerfil">
        <?php include "php/presetHTML/footer.php"; ?>
    </footer>
    <script src="js/alerts.js"></script>
    <script src="js/globalFunctions.js"></script>
    <script src="libraries/vex/vex.js"></script>
    <script src="libraries/vex/vex.combined.min.js"></script>
</body>
</html>