<?php
    require_once "conexion.php";
    /* Agregar contraseñas */
    if (isset($_POST["userADD"]) && isset($_POST["passADD"])){

        if(isset($_POST["webADD"])){
            if($_POST["webADD"] != '' && $_POST["webADD"] != null){
                if (validateURL($_POST["webADD"])) $sub_web = strip_tags($_POST["webADD"]);
                else{
                    setcookie("managePassRes", "La URL ingresada no es válida", time()+10,"/");
                    setcookie("operationRes", "error", time()+10, "/");
                    header('Location: ../../gestionarContrasenias.php');
                    exit('La URL ingresada no es válida.');
                }
            }
            else $sub_web = "";    
        }
        else $sub_web = "";

        $sub_user = $_POST["userADD"];
        $sub_pass = $_POST["passADD"];
        
        $web = $sub_web;
        $user = strip_tags($sub_user);
        $pass = strip_tags($sub_pass);

        $consulta = "INSERT INTO `accounts` VALUES (null,'" . $_SESSION["Login"] . "','" . $web . "','" . $user . "','" . $pass . "', null)";
        $result = consulta($conn, $consulta);
    }
    /* Editar contraseñas */
    if (isset($_POST["id"]) && isset($_POST["userEDIT"]) && isset($_POST["passEDIT"])){
        $id = $_POST["id"];
        $consulta = "SELECT `user_id` FROM `accounts` WHERE `id` = " . $id;
        $result = consulta($conn, $consulta);
        $row = mysqli_fetch_assoc($result);
        if($row['user_id'] === $_SESSION["Login"]){
            if(isset($_POST["webEDIT"])){
                if($_POST["webEDIT"] != '' && $_POST["webEDIT"] != null){
                    if (validateURL($_POST["webEDIT"])) $sub_web = $_POST["webEDIT"];
                    else{
                        setcookie("managePassRes", "La URL ingresada no es válida", time()+10,"/");
                        setcookie("operationRes", "error", time()+10, "/");
                        header('Location: ../../gestionarContrasenias.php');
                        exit('La URL ingresada no es válida.');
                    }
                }
                else $sub_web = "";    
            }
            else $sub_web = "";
            $sub_web = $_POST["webEDIT"];
            $sub_user = $_POST["userEDIT"];
            $sub_pass = $_POST["passEDIT"];
            
            $web = strip_tags($sub_web);
            $user = strip_tags($sub_user);
            $pass = strip_tags($sub_pass);

            $consulta = "UPDATE `accounts` SET `web`='" . $web . "',`username`='" . $user . "',`password`='" . $pass . "' WHERE `id` = " . $id;
            $result = consulta($conn, $consulta);
        }
        else{
            setcookie("managePassRes", "Se ha producido un error", time()+10,"/");
            setcookie("operationRes", "error", time()+10, "/");
            header('Location: ../../gestionarContrasenias.php');
            exit('Error');
        }
    }
    /* Eliminar contraseñas */
    if (isset($_GET["idCampo__Delete"])){
        $id = $_GET["idCampo__Delete"];
        $consulta = "SELECT `user_id` FROM `accounts` WHERE `id` = " . $id;
        $result = consulta($conn, $consulta);
        $row = mysqli_fetch_assoc($result);
        if($row['user_id'] === $_SESSION["Login"]){
            $consulta = "UPDATE `accounts` SET `deleted`=NOW() WHERE `id` = " . $id;
            $result = consulta($conn, $consulta);
        }
        else{
            setcookie("managePassRes", "Se ha producido un error", time()+10,"/");
            setcookie("operationRes", "error", time()+10, "/");
            header('Location: ../../gestionarContrasenias.php');
            exit('Error');
        }
    }
    /* Eliminar todas las contraseñas */
    if (isset($_POST["pswrdDelAccountsConfirm"])) {
        $delAccountsConfirm = $_POST["pswrdDelAccountsConfirm"];
        $id = $_SESSION["Login"];
        $sql = "SELECT password FROM users WHERE id = ".$id." AND deleted is NULL";
        $res = consulta($conn, $sql);
        $userPassword = mysqli_fetch_assoc($res);
        if(md5($delAccountsConfirm) == $userPassword['password']){
            $consulta = "UPDATE `accounts` SET `deleted`=NOW() WHERE `user_id` = " . $id . " AND web != 'Jildam'";
            $result = consulta($conn, $consulta);
            setcookie("managePassRes", "Se han eliminado todas tus contraseñas", time()+10, "/");
            setcookie("operationRes", "success", time()+10, "/");
        }
        else{
            setcookie("managePassRes", "Contraseña incorrecta", time()+10, "/");
            setcookie("operationRes", "error", time()+10, "/");
        }
    }
    header('Location: ../../gestionarContrasenias.php');
?>