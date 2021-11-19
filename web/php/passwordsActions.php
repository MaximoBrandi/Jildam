<?php
    require_once "conexion.php";

    if (isset($_POST["webADD"]) && isset($_POST["userADD"]) && isset($_POST["passADD"])){
        $sub_web = $_POST["webADD"];
        $sub_user = $_POST["userADD"];
        $sub_pass = $_POST["passADD"];
        
        $web = strip_tags($sub_web);
        $user = strip_tags($sub_user);
        $pass = strip_tags($sub_pass);

        $consulta = "INSERT INTO `accounts`(`id`, `user_id`, `web`, `username`, `password`) VALUES ('null','" . $_COOKIE["login"] . "','" . $web . "','" . $user . "','" . $pass . "')";
        $result = consulta($conn, $consulta);
    }
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
    if (isset($_GET["idCampo__Delete"]) /* && isset($_POST["delete"]) */){
        $id = $_GET["idCampo__Delete"];
        $consulta = "UPDATE `accounts` SET `deleted`='" . date("Y-m-d") . "' WHERE `id` = " . $id;
        $result = consulta($conn, $consulta);
    }
    if (isset($_GET["idContraseñas__Reset"])) {
        $id = $_GET["idContraseñas__Reset"];
        $consulta = "UPDATE `accounts` SET `deleted`='" . date("Y-m-d") . "' WHERE `user_id` = " . $id;
        $result = consulta($conn, $consulta);
    }
?>
<script>
    location.href = "../../gestionarContrasenias.php";
</script>