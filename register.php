<html lang="es-AR">
<head>
    <meta charset="UTF-3">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jildam</title>
</head>
<body>
    <form action="register.php" method="post">
        Nombre: <input type="text" name="nombre"><br>
        Contraseña: <input type="password" name="contrasena"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit" value="Enviar">
        <br>
        <input type="submit" formaction="index.php" value="Atras">
    </form>
</body>
</html>

<?php

//error_reporting(0);


if (null !== htmlspecialchars($_POST["nombre"]) && null !== htmlspecialchars($_POST["contrasena"]) && null !== htmlspecialchars($_POST["email"])){
    $contrasenac = $_POST["contrasena"];
    $nombrec = $_POST["nombre"];
    $emailc = $_POST["email"];
    $contrasena = strip_tags($contrasenac);
    $usuario = strip_tags($nombrec);
    $email = strip_tags($emailc);
}

$hotsdb = "localhost";  
$basededatos = "jildam";  

$usuariodb = "root";  
$clavedb = "";   

$tabla_db1 = "login";

$mysqli = new mysqli($hotsdb, $usuariodb, $clavedb, $basededatos, 3306);

$consulta = "SELECT email, usuario FROM $tabla_db1 WHERE email='$email' OR usuario='$usuario'";
$result = $mysqli->query($consulta);
$row = $result->fetch_array(MYSQLI_ASSOC);

if ($usuario == null && $email == null) {
    echo "";
}elseif($usuario == $row["usuario"] || $email == $row["email"]){
    echo "Error, ya hay registrado una cuenta similar";
}else{
    $sql = "INSERT INTO $tabla_db1 (usuario, contrasena, email) VALUES ('$usuario', '$contrasena', '$email')";
    if (mysqli_query($mysqli, $sql)) {
        echo "Te has registrado correctamente";
        setcookie("login", "true", time() + (86400 * 30), "/");
        echo "<br><input type='submit' formaction='inicio.php' value='Inicio'>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>