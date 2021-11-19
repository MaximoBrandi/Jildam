<?php

require_once "conexion.php";

error_reporting(0);

function eliminar_acentos($cadena){
		
  //Reemplazamos la A y a
  $cadena = str_replace(
  array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
  array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
  $cadena
  );

  //Reemplazamos la E y e
  $cadena = str_replace(
  array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
  array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
  $cadena );

  //Reemplazamos la I y i
  $cadena = str_replace(
  array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
  array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
  $cadena );

  //Reemplazamos la O y o
  $cadena = str_replace(
  array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
  array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
  $cadena );

  //Reemplazamos la U y u
  $cadena = str_replace(
  array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
  array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
  $cadena );

  //Reemplazamos la N, n, C y c
  $cadena = str_replace(
  array('Ñ', 'ñ', 'Ç', 'ç'),
  array('N', 'n', 'C', 'c'),
  $cadena
  );
  
  return $cadena;
}

if (isset($_POST["contrasena"]) && isset($_POST["email"])){
    $contrasenac = $_POST["contrasena"];
    $emailc = $_POST["email"];
    $contrasena = strip_tags($contrasenac);
    $emaila = strip_tags($emailc);
}

if (isset($emaila) && isset($contrasena)) {
  $consulta = "SELECT  id, email, username, deleted FROM users WHERE email='$emaila' AND password='$contrasena'";
  $result = consulta($conn, $consulta);
  $row = mysqli_fetch_assoc($result);
}
if ($row["deleted"] == null) {
  if (isset($row["email"]) && isset($row["username"]) ) {
    setcookie("loginError", "owo", time()-3600, "/");
    $user_id = $row["id"];
    $usuariocaps = strtolower($usernamecrud);
    $usuariospaces = str_replace(" ", "_", $usuariocaps);
  
    setcookie("login", $user_id, time() + (86400 * 30), "/");
    setcookie("username", $usernamecrud, time() + (86400 * 30), "/");
  }else if($contrasena != null | $emaila != null || $emaila != "" || $contrasena != ""){
    setcookie("loginError", "true", time()+3600, "/");
  }else{
    setcookie("loginError", "owo", time()-3600, "/");
  }
}

header('Location: ../../login.php')
?>