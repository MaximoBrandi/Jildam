<?php

require_once "conexion.php";

error_reporting(0);

if (isset($_POST["contrasena"]) && isset($_POST["email"])){
    $contrasenac = $_POST["contrasena"];
    $emailc = $_POST["email"];
    $contrasena = strip_tags($contrasenac);
    $emaila = strip_tags($emailc);
}

if (isset($emaila) && isset($contrasena)) {
  $consulta = "SELECT  id, email, username, deleted FROM users WHERE email='" . $conn->real_escape_string($emaila) . " ' AND password='" . md5($contrasena) . "'";
  $result = consulta($conn, $consulta);
  $row = mysqli_fetch_assoc($result);

  if ($row["deleted"] == null) {
    if (isset($row["email"]) && isset($row["username"]) ) {
      setcookie("loginError", "owo", time()-3600, "/");
      $user_id = $row["id"];
      $usuariocaps = strtolower($usernamecrud);
      $usuariospaces = str_replace(" ", "_", $usuariocaps);
    
      session_start();
      $_SESSION["Login"] = $user_id;
      setcookie("login", $user_id, time() + (86400 * 30), "/");
      setcookie("username", $usernamecrud, time() + (86400 * 30), "/");
    }
    else if($contrasena != $row["password"] && $emaila == $row["email"]){
      setcookie("loginError", "Correo o contraseña incorrectos", time() + 10, "/");
      setcookie("tempEmail", $emaila , time() + 10, "/");
    }
    else if(($contrasena != null || $emaila != null || $emaila != "" || $contrasena != "") && !isset($row["email"])){
      setcookie("loginError", "Correo o contraseña incorrectos", time()+1, "/");
      setcookie("tempEmail", $emaila , time() + 10, "/");
    }
    else{
      setcookie("loginError", "error", time() + 10, "/");
      setcookie("tempEmail", $emaila , time() + 10, "/");
    }
  }
  else{
      setcookie("loginError", "Correo o contraseña incorrectos", time() + 10, "/");
      setcookie("tempEmail", $emaila , time() + 10, "/");
  }
}
header('Location: ../../login.php');
?>