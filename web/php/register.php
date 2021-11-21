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
<<<<<<< HEAD
        if (($row["email"] != $email || $row["deleted"] !== null) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
=======
        if ($row["email"] != $email || $row["deleted"] !== null ) {
>>>>>>> 3fa7715cf150db3d9ca1d99b7ccf7bbe7e54c0b9
            $sql = "INSERT INTO users (email, username , password) VALUES ( '" . $conn->real_escape_string($email) . "', '" . $conn->real_escape_string($usuario) . "', '" . $conn->real_escape_string(md5($contrasena)) . "')";
            $res = consulta($conn, $sql);
            
            $sql = "SELECT MAX(`id`) FROM `users`";
            $res = consulta($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            $consulta = "INSERT INTO `profiles` VALUES (null, '" . $row["MAX(`id`)"] . "', '', '', '', '');"
            $result = consulta($conn, $consulta);
            setcookie("login", $row["MAX(`id`)"], time() + (86400 * 30), "/");
            $sql = "INSERT INTO accounts (id, user_id, web, username, password) VALUES ('null','" . $_COOKIE["login"]+1 . "', 'Jildam', '".$usuario."', '".$contrasena."')";
            $result = consulta($conn, $sql);
            header('Location: ../../index.php');
        }
        else{ 
            setcookie("registerError", "true", time()+1, "/");
            header('Location: ../../register.php');
        }
    }
}
else header('Location: ../../index.php');
?>