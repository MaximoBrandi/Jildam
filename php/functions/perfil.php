<?php
    require_once "conexion.php";
    
    error_reporting(0);

    if (isset($_SESSION["Login"])) {
        if (isset($_POST["User"]) && isset($_POST["Name"]) && isset($_POST["surName"]) && isset($_POST["Bio"])){
            $sub_User = $_POST["User"];
            $sub_Name = $_POST["Name"];
            $sub_surName = $_POST["surName"];
            $sub_Bio = $_POST["Bio"];
            
            $User = strip_tags($sub_User);
            $Name = strip_tags($sub_Name);
            $surName = strip_tags($sub_surName);
            $Bio = strip_tags($sub_Bio);
    
            $consulta = "UPDATE `profiles` SET `name`='" . $conn->real_escape_string($Name) . "',`surname`='" . $conn->real_escape_string($surName) . "',`biography`='" . $conn->real_escape_string($Bio) . "'WHERE `user_id` = " . $_SESSION["Login"];
            $result = consulta($conn, $consulta);
            $consulta = "UPDATE `users` SET `username`='" . $conn->real_escape_string($User) . "' WHERE `id` = " . $_SESSION["Login"];
            $result = consulta($conn, $consulta);
            header("Location: Perfil.php");
        }

        $consulta = "SELECT `password` FROM `users` WHERE `id` = " . $_SESSION["Login"];
        $result = consulta($conn, $consulta);
        $pass = mysqli_fetch_assoc($result);

        if (isset($_POST["actu"]) && isset($_POST["nue1"]) && isset($_POST["nue2"])) {
            if(($_POST["actu"] == '' || $_POST["actu"] == null) || ($_POST["nue1"] == '' || $_POST["nue1"] == null) || ($_POST["nue2"] || $_POST["nue2"] == null)){
                setcookie("profileError", "Campos incompletos", time()+10, "/");
                setcookie("operationRes", "error", time()+10, "/");
            }
            $passactu = md5($_POST["actu"]);
            if ($pass["password"] == $passactu) {
                if ($_POST["nue1"] == $_POST["nue2"]) {
                    $newpass = $_POST["nue1"];
                    $sql = "UPDATE users SET password = '" . md5($newpass) . "' WHERE id = " . $_SESSION["Login"];
                    consulta($conn, $sql);
                    $sql = "UPDATE accounts SET password = '" . $newpass . "' WHERE user_id = " . $_SESSION["Login"] . " AND web = 'Jildam'";
                    consulta($conn, $sql);
                }
                else{
                    setcookie("profileError", "Las contraseñas no coinciden", time()+10, "/");
                    setcookie("operationRes", "error", time()+10, "/");
                }
            }
            else{
                setcookie("profileError", "Contraseña incorrecta", time()+10, "/");
                setcookie("operationRes", "error", time()+10, "/");
            }
        }

        if (isset($_POST["webIMG"]) && filter_var($_POST["webIMG"], FILTER_VALIDATE_URL)) {
            $image = $_POST["webIMG"];

            $sql = "UPDATE profiles SET pfp = '$image' WHERE user_id = " . $_SESSION["Login"];
            consulta($conn, $sql);
        }else if($row["pfp"] !== ""){
            $image = $row["pfp"];
        }else{
            $image = "../../img/circled-user-icon.svg";
        }
    }
    header('Location: ../../Perfil.php');
?>