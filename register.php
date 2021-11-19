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
    <title>Jildam</title>
</head>
<!-- style="background: linear-gradient(#ff8000, #f44611);" -->
<body onload='alertLogin("register")' >
    <!-- <nav class="navbar navbar-light passnarvbar">
        <div class="container-fluid">
            <a class="navbar-brand align-middle d-flex">
                <button onclick="window.location.href = 'index.php'" formaction='index.php' class="btn-inicio"
                    title="Inicio"></button>
                <p class="mt-auto">Password Manager</p>
            </a>
        </div>
        <div class="LogInAccount" id="LogInSession">
          <button id="switchTheme" class="darkMode" title="Cambiar a tema claro/oscuro"></button>
      </div>
    </nav> -->
    <script src="Scripts/theme.js"></script>
  <section id="LogIn" style="height: auto;">
    <div id='errorAlert' class='vanish'></div>
    <div id="LogIn_div" style="margin-top: 1.75em;">
      <h2>Registrate</h2>
      <form action="web/php/register.php" method="post">
        <input type="text" name="nombre" placeholder="Usuario" class="login-input form-control" required><br>
        <input type="email" name="email" placeholder="Correo" class="login-input form-control" required><br>
        <div class="d-flex">
          <input type="password" name="contrasena" placeholder="Contraseña" class="login-input form-control" id="pswrd" onkeyup='confirmPswrd()' required style="margin-left: 2em;">
          <button type="button" class="btn-verPassLogin" title="Mostrar"></button>
        </div>
        <div class="d-flex">
          <input type="password" placeholder="Confirmar contraseña" class="login-input form-control" id="pswrd_confirm" onkeyup='confirmPswrd()' required style="margin-left: 2em;">
          <button type="button" class="btn-verPassLogin" title="Mostrar"></button>
        </div>
        <span id='message'></span>
        <a href="login.php">¿Tienes una cuenta? ¡Inicia sesión!</a>
        <button type="submit" onclick="isTheSame()" class="btn btn-primary" id="boton_repiola" style="background-color: #f85d09; margin-bottom: 2em;">Aceptar</button>
      </form>
    </div>
  </section>
  <script src="Scripts/functions.js"></script>
  <script src="Scripts/clickGestPass.js"></script>
  <script src="Scripts/bootstrap.bundle.js"></script>
</body>
</html>