<?php
    require_once "conexion.php";
    /* Agregar contraseñas */
    if (isset($_POST["userADD"]) && isset($_POST["passADD"])){

        if(isset($_POST["webADD"])) $sub_web = $_POST["webADD"];
        else $sub_web = "---";

        $sub_user = $_POST["userADD"];
        $sub_pass = $_POST["passADD"];
        
        $web = strip_tags($sub_web);
        $user = strip_tags($sub_user);
        $pass = strip_tags($sub_pass);

        $consulta = "INSERT INTO `accounts` VALUES (null,'" . $_COOKIE["login"] . "','" . $web . "','" . $user . "','" . $pass . "', null)";
        $result = consulta($conn, $consulta);
    }
    /* Editar contraseñas */
    if (isset($_POST["id"]) && isset($_POST["webEDIT"]) && isset($_POST["userEDIT"]) && isset($_POST["passEDIT"])){
        $id = $_POST["id"];
        $sub_web = $_POST["webEDIT"];
        $sub_user = $_POST["userEDIT"];
        $sub_pass = $_POST["passEDIT"];
        
        $web = strip_tags($sub_web);
        $user = strip_tags($sub_user);
        $pass = strip_tags($sub_pass);

        $consulta = "UPDATE `accounts` SET `web`='" . $web . "',`username`='" . $user . "',`password`='" . $pass . "' WHERE `id` = " . $id;
        $result = consulta($conn, $consulta);
    }
    /* Eliminar contraseñas */
    if (isset($_GET["idCampo__Delete"])){
        $id = $_GET["idCampo__Delete"];
        $consulta = "UPDATE `accounts` SET `deleted`=NOW() WHERE `id` = " . $id;
        $result = consulta($conn, $consulta);
    }
    /* Eliminar todas las contraseñas */
    if (isset($_POST["idContraseñas__Reset"]) && isset($_POST["pswrdDelAccountsConfirm"])) {
        $delAccountsConfirm = $_POST["pswrdDelAccountsConfirm"];
        $id = $_POST["idContraseñas__Reset"];
        $sql = "SELECT password FROM users WHERE id = ".$id." AND deleted is NULL";
        $res = consulta($conn, $sql);
        $userPassword = mysqli_fetch_assoc($res);
        if(md5($delAccountsConfirm) == $userPassword['password']){
            $consulta = "UPDATE `accounts` SET `deleted`=NOW() WHERE `user_id` = " . $id;
            $result = consulta($conn, $consulta);
            $delAccountsRes = 'true';
        }
        else $delAccountsRes = 'false';
    }
    if($delAccountsRes == 'true') header('Location: ../../gestionarContrasenias.php?delAccountsRes=true');
    else if($delAccountsRes == 'false') header('Location: ../../gestionarContrasenias.php?delAccountsRes=false');
    else header('Location: ../../gestionarContrasenias.php');
?>