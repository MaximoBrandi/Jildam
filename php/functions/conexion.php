<?php
    define('DB_SERVER','');
    define('DB_USER','');
    define('DB_PASS','');
    define('DB_NAME','');
    error_reporting(0);


    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if(!$conn){
      if (mysqli_connect_error() == "Unknown database 'jildam'") {
        exit("<html lang='es-AR'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='css/globalStyles.css'>
            <link rel='stylesheet' href='css/normalize.css'>
            <link rel='stylesheet' href='css/globalStyles.css'>
            <title>Jildam</title>
        </head>
        <body class='index'>
            <section id='logSec'>
            <div id='LogedOut' class='secErrorBD'>
                    <img id='IconErrorBD' src='img/jildam_icon.svg' alt='Icono'>
                    <h2>Error, no tienes ninguna base de datos instalada</h2>
                    <p>No tienes la base de datos, <a href='https://cutt.ly/mYwUz8B/' target='_blank'>descargala de aqui</a></p>
            </div>
            </section>
            <footer style='margin-top: 7.5em;'>
                <?php include 'php/presetHTML/footer.php'; ?>
            </footer>
        </body>
        <script src='js/globalFunctions.js'></script>
        <script src='js/bootstrap.bundle.js'></script>
        </html> <br><br> ");
      }else{
        exit("Error en conexion: " . mysqli_connect_error());
      }
    }
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

    function validate_email($str){
        $matches = null;
        return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6}\\.)$/', $str, $matches));
    }
    function is_valid_email($str){
      $result = (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
  
      if ($result){
        list($user, $domain) = explode('@', $str);
        $result = checkdnsrr($domain, 'MX');
      }
      return $result;
    }
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