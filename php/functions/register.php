<?php

require_once "conexion.php";

//error_reporting(0);

if (isset($_POST["email"]) && isset($_POST["nombre"]) && isset($_POST["contrasena"]) && isset($_POST["confirmContrasena"])){
    $contrasena = trim(strip_tags($_POST["contrasena"]));
    $confirmContrasena = trim(strip_tags($_POST["confirmContrasena"]));
    $usuario = trim(strip_tags($_POST["nombre"]));
    $email = trim(strip_tags($_POST["email"]));

    $consulta = "SELECT email, username, deleted FROM users WHERE email='" . $email . "' OR username = '" . $usuario . "'";
    $result = consulta($conn, $consulta);
    $row = mysqli_fetch_assoc($result);
    if(isset($usuario) && isset($email)){
        if($contrasena != $confirmContrasena || !is_valid_email($email) || ($row["email"] == $email && is_null($row["deleted"])) || (($contrasena == '' || $contrasena == null) || ($confirmContrasena == '' || $confirmContrasena == null) || ($usuario == '' || $usuario == null) || ($email == '' || $email == null))){
            if ($row["email"] == $email && is_null($row["deleted"])){
                setcookie("registerError", "<span>Ya existe una cuenta con el mismo correo</span>", time() + 10, "/");
                setcookie("tempEmail", $email , time() + 10, "/");
                setcookie("tempUser", $usuario , time() + 10, "/");
            }
            if(!is_valid_email($email)){
                setcookie("registerError", "<span>El correo ingresado no es válido</span>", time() + 10, "/");
                setcookie("tempEmail", $email , time() + 10, "/");
                setcookie("tempUser", $usuario , time() + 10, "/");
            }
            if ($contrasena != $confirmContrasena){
                setcookie("registerError", "<span>Las contraseñas no coinciden</span>", time() + 1, "/");
                setcookie("tempEmail", $email , time() + 10, "/");
                setcookie("tempUser", $usuario , time() + 10, "/");
            }
            if(($contrasena == '' || $contrasena == null) || ($confirmContrasena == '' || $confirmContrasena == null) || ($usuario == '' || $usuario == null) || ($email == '' || $email == null)){
                setcookie("registerError", "<span>Complete los campos</span>", time() + 1, "/");
                setcookie("tempEmail", $email , time() + 10, "/");
                setcookie("tempUser", $usuario , time() + 10, "/");
            }
            header('Location: ../../register.php');
        }
        else if(($row["username"] != $usuario && $row["email"] != $email || !is_null($row["deleted"])) && is_valid_email($email) ) {
            $sql = "INSERT INTO users VALUES (NULL, '" . $conn->real_escape_string($email) . "', '" . $conn->real_escape_string($usuario) . "', '" . $conn->real_escape_string(md5($contrasena)) . "', NULL, NULL)";
            $res = consulta($conn, $sql);

            $sql = "SELECT MAX(`id`) FROM `users`";
            $res = consulta($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            $consulta = "INSERT INTO `profiles` VALUES (null, '" . $row["MAX(`id`)"] . "', '', '', '', '')";
            $result = consulta($conn, $consulta);
            session_start();
            $_SESSION["Login"] = $row["MAX(`id`)"];
            setcookie("login", $row["MAX(`id`)"], time() + 1800, "/");
            header('Location: ../../index.php');
        }
        else{
            setcookie("registerError", "<span>Complete los cmapos</span>", time() + 10, "/");
            setcookie("tempEmail", $email , time() + 10, "/");
            setcookie("tempUser", $usuario , time() + 10, "/");
            header('Location: ../../register.php');
        }
    }
}
else{
    setcookie("registerError", "<span>Complete los cmapos</span>", time() + 10, "/");
    setcookie("tempEmail", $email , time() + 10, "/");
    setcookie("tempUser", $usuario , time() + 10, "/");
    header('Location: ../../register.php');
}
?>