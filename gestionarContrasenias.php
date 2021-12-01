<?php
    require_once "php/functions/conexion.php";
    include "php/functions/checkSession.php";
    checkSession(0);
    include "php/presetHTML/menu.php";
    $_POST['webSEARCH'] = (isset($_POST['webSEARCH'])) ? strip_tags($_POST['webSEARCH']) : "";
    $_POST['userSEARCH'] = (isset($_POST['userSEARCH'])) ? strip_tags($_POST['userSEARCH']) : "";
    $consulta = "SELECT `id`, `user_id`, `web`, `username`, `password`, `deleted` FROM `accounts` WHERE `user_id` = " . $_SESSION["Login"] . " AND deleted is NULL AND `web` LIKE '%".$conn->real_escape_string($_POST['webSEARCH'])."%' AND `username` LIKE '%".$conn->real_escape_string($_POST['userSEARCH'])."%'";
    $result = consulta($conn, $consulta);
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="">
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
    <title>Gestionar Contraseñas</title>
</head>
<body onload="alerts('passManagement')">
    <section id="gestionarPass">
        <h2>Gestionar contraseñas</h2>
        <hr><br><br>
        <h3 class="text-start">Buscar contraseñas</h3>
        <form action="gestionarContrasenias.php"  method="post">
        <div class="buscador-container text-center">
            <div class="inputSearch-container">
                <input type="text" class="inputSearch" value="<?php echo $_POST['webSEARCH'] ?>" name="webSEARCH" placeholder="Sitio web..." autocomplete="off">
            </div>
            <div class="inputSearch-container">
                <input type="text" class="inputSearch" value="<?php echo $_POST['userSEARCH'] ?>" name="userSEARCH" placeholder="Nombre/email..." autocomplete="off">
            </div>
            <div class="searchButton-container">
                <button type="submit" class="btn btn-primary searchButton">Buscar</button>
            </div>
        </div>
        </form>
        <table class="table-accounts mx-auto" id="table-accounts">
            <thead id="table-head">
                <tr style="border-top: none;">
                    <th align="center" style="border-top-left-radius: inherit;">Sitio</th>
                    <th align="center">Nombre</th>
                    <th align="center">Contraseña</th>
                    <th align="center" colspan="3" style="border-top-right-radius: inherit;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = mysqli_fetch_assoc($result)){
                        if (is_null($fila["deleted"])) {
                ?>
                
                <tr>
                    <td> <a target="_blank" href="http://<?php echo $fila["web"];?>"><?php echo $fila["web"];?></a></td>
                    <td align="center"><?php echo $fila["username"];?></td>
                    <td align="center">
                        <input type="password" class="td-password" id="pass<?php echo $fila['id'];?>" value="<?php echo $fila['password'] ?>" readonly>
                        <button id="ver" class="btn-showPass" class="btn-opcion" onclick="clickedView('pass<?php echo $fila['id'];?>')" title="Mostrar"></button>
                    </td>
                    <td class="opciones desktopButtons" align="center">
                        <button type="button" onclick="alertDeletePass(<?php echo $fila['id'] ?>)" class="btn-opcion btn-delPass" title="Eliminar"></button>
                    </td>
                    <td class="opciones desktopButtons" align="center">
                        <button class="btn-opcion btn-editPass" onclick="alertEditPass('<?php echo $fila['id']; ?>', '<?php echo $fila['web']; ?>', '<?php echo $fila['username']; ?>', '<?php echo $fila['password']; ?>')" title="Editar"></button>
                    </td>
                    <td class="opciones desktopButtons" align="center">
                            <button class="btn-opcion btn-copyPass" onclick="copyPassword('pass<?php echo $fila['id'] ?>')"></button>
                    </td>
                    <td id="mobileButton">
                        <div class="btn-group mt-3">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Opciones
                            </button>
                            <ul class="dropdown-menu">
                                <li><div class="dropdown-item" onclick="clickedView('pass<?php echo $fila['id'];?>')">Ver</div></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><div class="dropdown-item" onclick="alertDeletePass(<?php echo $fila['id'] ?>)">Eliminar</div></li>
                                <li><div class="dropdown-item" onclick="alertEditPass('<?php echo $fila['id']; ?>', '<?php echo $fila['web']; ?>', '<?php echo $fila['username']; ?>', '<?php echo $fila['password']; ?>')">Editar</div></li>
                                <li><div class="dropdown-item" onclick="copyPassword('pass<?php echo $fila['id'] ?>')">Copiar</div></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
                <tr id="filaAddPass" style="border-bottom-left-radius: inherit;border-bottom-right-radius: inherit;">
                    <td align="center" colspan="6" id="Agregar"><button onclick="alertAddPass()" class="btn-addPass">+ Añadir</button></td>
                </tr>
            </tbody>
        </table>
    </section>
    <footer class="w-100" style="position:static;bottom:0;">
        <?php include "php/presetHTML/footer.php"; ?>
    </footer>
    <script src="js/globalFunctions.js"></script>
    <script src="js/alerts.js"></script>
</body>
</html>
