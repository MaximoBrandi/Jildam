<?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','jildam');

    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset('utf8');

    if(!$conn){
        exit("Error en conexion: " . mysqli_connect_error());
    }

    /* Función para realizar consultas en la base de datos de una manera más eficiente */
    function consulta($db, $consulta){
        $res = mysqli_query($db, $consulta);
        if(!$res){
            exit("Error en la consulta: " . mysqli_error($db));
        }
        return $res;
    }
    session_start();

    function validateURL($URL) {
        $pattern_1 = "/^(http|https|ftp):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+.(com|org|net|dk|at|us|tv|info|uk|co.uk|biz|se|ar|gob.ar|ch|co|do|fr|gt|jm|mx|pe|br|ca|cn|de|es|gr|hk|jp|pa|pr|uy|ws|io|cl)$)(:(\d+))?\/?/i";
        $pattern_2 = "/^(www)((\.[A-Z0-9][A-Z0-9_-]*)+.(com|org|net|dk|at|us|tv|info|uk|co.uk|biz|se|ar|gob.ar|ch|co|do|fr|gt|jm|mx|pe|br|ca|cn|de|es|gr|hk|jp|pa|pr|uy|ws|io|cl)$)(:(\d+))?\/?/i";       
        if(preg_match($pattern_1, $URL) || preg_match($pattern_2, $URL)){
          return true;
        } else{
          return false;
        }
      }
?>