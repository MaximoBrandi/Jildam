<?php

require_once "conexion.php";

    if (isset($_POST["DeleteAccountConfirm"])){
        $id = $_SESSION["Login"];
        $DeleteAccountConfirm = $_POST["DeleteAccountConfirm"];
        $sql = "SELECT password FROM users WHERE id = ".$id." AND deleted is NULL";
        $res = consulta($conn, $sql);
        $pswrdConfirm = mysqli_fetch_assoc($res);
        if(md5($DeleteAccountConfirm) == $pswrdConfirm['password']){
            $consulta = "UPDATE `users` SET `deleted`=NOW() WHERE `id` = " . $id;
            $result = consulta($conn, $consulta);
            setcookie("login", "owo", time()-3600, "/");
        }
        else{
            setcookie("profileError", "Contraseña incorrecta", time()+10, "/");
            setcookie("operationRes", "error", time()+10, "/");
            header('Location: ../../Perfil.php');
            exit();
        }
    }
    header('Location: ../../index.php');
?>