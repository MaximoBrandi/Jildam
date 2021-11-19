<?php
    require_once "conexion.php";

    if (isset($_POST["User"]) && isset($_POST["Name"]) && isset($_POST["surName"]) && isset($_POST["Bio"])){
        $sub_User = $_POST["User"];
        $sub_Name = $_POST["Name"];
        $sub_surName = $_POST["surName"];
        $sub_Bio = $_POST["Bio"];
        
        $User = strip_tags($sub_User);
        $Name = strip_tags($sub_Name);
        $surName = strip_tags($sub_surName);
        $Bio = strip_tags($sub_Bio);

        $consulta = "UPDATE `profiles` SET `name`='" . $Name . "',`surname`='" . $surName . "',`biography`='" . $Bio . "WHERE `user_id` = " . $_COOKIE["login"];
        $result = consulta($conn, $consulta);
    }
    header('Location: ../../perfil.php')
?>