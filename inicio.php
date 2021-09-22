<html lang="es-AR">
<head>
    <meta charset="UTF-3">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Scripts/functions.js"></script>
    <title>Jildam</title>
</head>
<body>
    <form action="register.php" method="post">
        Nombre: <input type="text" name="nombre"><br>
        <input type="submit" value="Enviar">
        <br>
        <input type="submit" formaction="index.php" value="Atras"> <br>
        <button onclick='deleteCookie("login", "Jildam/index.php")' >Cerrar Sesion</button>

        <script>
            document.write(getCookie("username"))
            document.write(getCookie("dbusername"))
        </script>
    </form>
</body>
</html>

<?php



?>