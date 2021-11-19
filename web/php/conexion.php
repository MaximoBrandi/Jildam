<?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','jildam');

    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if(!$conn){
        exit("Error en conexion: " . mysqli_connect_error());
    }

    function consulta($db, $consulta){
        $res = mysqli_query($db, $consulta);
        if(!$res){
            exit("Error en la consulta: " . mysqli_error($db));
        }
        return $res;
    }
?>