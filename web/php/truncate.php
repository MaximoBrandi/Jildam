<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Scripts/functions.js"></script>
    <title>Jildam</title>
</head>
</html>

<?php

//error_reporting(0);


if (null !== $_COOKIE["dbusername"]) {
    $dbusername = $_COOKIE["dbusername"];
}
$hotsdb = "localhost";  
$basededatos = "jildam";  

$usuariodb = "root";  
$clavedb = "";   

$tabla_username = $dbusername;

$mysqli = new mysqli($hotsdb, $usuariodb, $clavedb, $basededatos, 3306);

$consulta = "SELECT id FROM $tabla_username";

if ($resultado = mysqli_query($mysqli, $consulta)) {
    $fila = mysqli_fetch_row($resultado);
    if ($fila != null) {
        $sql = "TRUNCATE TABLE $tabla_username;";
        $mysqli->query($sql);
    
        echo "Contraseñas eliminadas correctamente";
        echo "<br><form><input type='submit' formaction='jildam/web/php/pswrds.php' value='Atras'></form>";
    } else{
        echo "Error, no hay contraseñas";
        echo "<br><form><input type='submit' formaction='jildam/web/php/pswrds.php' value='Atras'></form>";
    }
}





?>