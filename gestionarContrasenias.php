<?php
    include "web/php/menu.php";
    require_once "web/php/conexion.php";

    $consulta = "SELECT `id`, `user_id`, `web`, `username`, `password`, `deleted` FROM `accounts` WHERE `user_id` = " . $_COOKIE["login"] . " AND deleted is NULL";
    $result = consulta($conn, $consulta);
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/libraries/vex.css">
    <link rel="stylesheet" href="css/libraries/vex-theme-default.css">
    <link rel="stylesheet" href="css/globalStyles.css"> 
    <link rel="stylesheet" href="css/libraries/alertify.min.css"/>
    <link rel="stylesheet" href="css/libraries/alertify-theme-default.min.css"/>
    <script src="Scripts/libraries/alertify.min.js"></script>
    <script src="Scripts/index.js"></script>
    <script src="Scripts/functions.js"></script>
    <script src="Scripts/libraries/vex.js"></script>
    <script src="Scripts/libraries/vex.combined.min.js"></script>
    <title>Gestionar Contraseñas</title>
</head>
<body onload='alertLogin("checkSession")'>
    <?php
        if(isset($_GET['delAccountsRes'])){
            $delAccountsResult = $_GET['delAccountsRes'];
            if($delAccountsResult == 'true') echo "<script>alertify.notify('Contraseñas eliminadas exitosamente', 'success', 5, function(){});</script>";

            else if($delAccountsResult == 'false') echo "<script>alertify.notify('No se ha podido validar tu identidad', 'error', 5, function(){});</script>";
        }
    ?>
    <section id="gestionarPass">
        <h2>Gestionar contraseñas</h2>
        <hr><br><br>
        <table class="table-accounts mx-auto" id="table-accounts">
            <thead id="table-head">
                <tr style="border-top: none;">
                    <th align="center" style="border-top-left-radius: inherit;">Página</th>
                    <th align="center">Usuario</th>
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
                    <td><?php echo $fila["web"];?></td>
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
                        <div class="btn-group">
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
    <script src="Scripts/alerts.js"></script>
    <script src="Scripts/clickGestPass.js"></script>
    <script src="Scripts/passGenerator.js"></script>
</body>
</html>
