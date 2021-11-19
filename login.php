<?php
include "web/php/menu.php";
?>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/globalStyles.css">
    <link rel="icon" href=""> <!-- icono web -->
    <title>LogIn</title>
</head>
<body onload='alertLogin("login")'>
    <script src="Scripts/theme.js"></script>
  <section id="LogIn" style="height: 40em;">
    <div id='errorAlert' class='vanish'></div>
    <div id="LogIn_div">
      <h2 style="margin-top: 1.75em;" id="tituloLogIn">Loguearte</h2>
      <form action="web/php/login.php" method="post">
        <input type="email" name="email" placeholder="E-Mail..." class="login-input form-control" required><br>
        <div class="d-flex">
          <input type="password" name="contrasena" placeholder="Contraseña..." class="login-input form-control" id="input-passGenerada" required style="margin-left: 2em;">
          <button type="button" onclick="showPasswordInput()" class="btn-verPassLogin" title="Mostrar"></button>
        </div>
        <a href="register.php">¿No tienes una cuenta? ¡Regístrate!</a>
        <button type="submit" class="btn btn-primary" id="boton_repiola">Iniciar Sesión</button>
      </form>
    </div>
  </section>
  <script src="Scripts/functions.js"></script>
  <script src="Scripts/bootstrap.bundle.js"></script>
  <script src="Scripts/clickGestPass.js"></script>
</body>
</html>