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
<body onload='alertLogin("register")' >
  <section id="LogIn" style="height: auto; padding-bottom: 1em;">
    <div id='errorAlert' class='vanish'></div>
    <div id="LogIn_div" style="margin-top: 1.75em;">
      <h2>Regístrate</h2>
      <form action="web/php/register.php" method="post">
        <input type="text" name="nombre" placeholder="Usuario" class="login-input form-control" autocomplete="off" required><br>
        <input type="email" name="email" placeholder="Correo" class="login-input form-control" autocomplete="off" required><br>
        <input type="password" name="contrasena" placeholder="Contraseña" class="login-input form-control inputPasswordRegister" id="pswrd" onkeyup='confirmPswrd()' required>
        <input type="password" placeholder="Confirmar contraseña" class="login-input form-control inputPasswordRegister" id="pswrd_confirm" onkeyup='confirmPswrd()' required>
        <div class="d-flex justify-content-start mt-2">
          <input type="checkbox" id="seePasswordInputs" class="btn-check" onclick="seeRegisterPasswords()"><label class="btn btn-outline-primary" for="seePasswordInputs">Ver contraseñas</label>
        </div>
        <span id='message'></span>
        <a href="login.php">¿Tienes una cuenta? ¡Inicia sesión!</a>
        <button type="submit" onclick="isTheSame()" class="btn btn-primary" id="boton_repiola" style="background-color: #f85d09; margin-bottom: 2em;">Aceptar</button>
      </form>
    </div>
  </section>
  <script src="Scripts/functions.js"></script>
  <script src="Scripts/clickGestPass.js"></script>
</body>
</html>