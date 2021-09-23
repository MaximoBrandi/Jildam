<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Scripts/functions.js"></script>
    <title>Jildam</title>
</head>
<body>
    <form>
        <script>
            var logedArgument = "<br><input type='submit' formaction='inicio.php' value='Perfil'>"
            var loginArgument = "<br><input type='submit' formaction='login.php' value='Iniciar Sesion'>"
            var logoutArgument = "<br><input type='submit' formaction='register.php' value='Registrarse'>"
            
            firstTime()
            checkSesion(logedArgument, loginArgument, logoutArgument)
        </script>
    </form>
</body>
</html>