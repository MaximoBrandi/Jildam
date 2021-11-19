<?php

require_once "conexion.php";

//error_reporting(0);

if (isset($_POST["nombre"]) && isset($_POST["contrasena"]) && isset($_POST["email"])){
    $contrasena = strip_tags($_POST["contrasena"]);
    $usuario = strip_tags($_POST["nombre"]);
    $email = strip_tags($_POST["email"]);

    $consulta = "SELECT email, deleted FROM users WHERE email='$email'";
    $result = consulta($conn, $consulta);
    $row = mysqli_fetch_assoc($result);
  
  
    if(isset($usuario) && isset($email)){
        if ($row["email"] != $email || $row["deleted"] !== null ) {
            $sql = "INSERT INTO users (email, username , password) VALUES ( '$email', '$usuario', '$contrasena')";
            $res = consulta($conn, $sql);
      
            
            $sql = "SELECT MAX(`id`) FROM `users`";
            $res = consulta($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            $consulta = "INSERT INTO `profiles`(`user_id`) VALUES ('" . $row["MAX(`id`)"] . "')";
            $result = consulta($conn, $consulta);
            setcookie("login", $row["MAX(`id`)"], time() + (86400 * 30), "/");
        }
    }
    
}
header('Location: ../../index.php')
?>