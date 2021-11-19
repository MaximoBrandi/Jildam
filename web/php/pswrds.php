<?php

require_once "conexion.php";

    if (isset($_GET["idCuenta__Delete"]) /* && isset($_POST["delete"]) */){
        $id = $_GET["idCuenta__Delete"];
        $consulta = "UPDATE `users` SET `deleted`='" . date("Y-m-d") . "' WHERE `id` = " . $id;
        $result = consulta($conn, $consulta);
        setcookie("login", "owo", time()-3600, "/");
    }
?>
<script>
    location.href = "../../index.php";
</script>