<html lang="es-AR">
<head>
    <meta charset="UTF-3">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Scripts/functions.js"></script>
    <title>Jildam</title>
</head>
<body>
    <form action="submit.php" method="post">
        Nombre: <input type="text" name="nombre"><br>
        Ingresa una contraseña: <input type="text" name="contrasenea"> <br>
        <input type="submit" value="Enviar">
        <br>
        <input type="submit" formaction="inicio.php" value="Atras"> <br>
    </form>
</body>
</html>

<?php

error_reporting(0);

function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

if (null !== htmlspecialchars($_POST["nombre"]) && null !== htmlspecialchars($_POST["contrasenea"])) {
    $nombrec = $_POST["nombre"];
    $pswrc = $_POST["contrasenea"];
    $username = $_COOKIE["username"];
    $dbusername = $_COOKIE["dbusername"];
    $nombre = strip_tags($nombrec);
    $pswr = strip_tags($pswrc);
}

$hotsdb = "localhost";  
$basededatos = "jildam";  

$usuariodb = "root";  
$clavedb = "";   

$tabla_db1 = "login";
$tabla_username = $dbusername;

$mysqli = new mysqli($hotsdb, $usuariodb, $clavedb, $basededatos, 3306);

$consulta = "SELECT id, nombre, contrasena FROM $tabla_username WHERE nombre='$nombre' OR contrasena='$pswr'";
$result = $mysqli->query($consulta);
$row = $result->fetch_array(MYSQLI_ASSOC);

if ($row["nombre"] != $nombre && $row["contrasena"] != $pswr) {
    $sql = "INSERT INTO $tabla_username (nombre, contrasena) VALUES ('$nombre', '$pswr')";
    $mysqli->query($sql);
    echo "Contraseña generada satisfactoriamente <br> <br>";
} elseif($pswr == null && $nombre == null){
    echo "";
}else{
    echo "Error";
}

$consulta = "SELECT nombre, contrasena FROM $tabla_username";

if ($resultado = mysqli_query($mysqli, $consulta)) {
    echo "Contraseñas de: $username <br>";
    /* obtener el array asociativo */
    while ($fila = mysqli_fetch_row($resultado)) {
        printf ("%s (%s)\n", $fila[0], $fila[1]);
        echo "<br>";
    }

    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
}
?>