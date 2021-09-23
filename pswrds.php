<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Scripts/functions.js"></script>
    <title>Jildam</title>
</head>
<body>
        <button onclick="truncateTable()">Borrar contraseñas</button><br><br>
</body>
</html>

<?php
error_reporting(0);

$username = $_COOKIE["username"];
$dbusername = $_COOKIE["dbusername"];


$hotsdb = "localhost";  
$basededatos = "jildam";  

$usuariodb = "root";  
$clavedb = "";   

$tabla_db1 = "login";
$tabla_username = $dbusername;

$mysqli = new mysqli($hotsdb, $usuariodb, $clavedb, $basededatos, 3306);

$consulta = "SELECT nombre, contrasena FROM $tabla_username";

if ($resultado = mysqli_query($mysqli, $consulta)) {
    echo "Contraseñas de: $username <br>";
    /* obtener el array asociativo */
    while ($fila = mysqli_fetch_row($resultado)) {
        printf ("%s (%s)\n", $fila[0], $fila[1]);
        echo "<br>";
    }
    echo "<br><br><form><input type='submit' formaction='inicio.php' value='Atras'></form>";
    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
}
?>