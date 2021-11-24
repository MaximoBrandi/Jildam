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
<body onload='alertLogin("register")' style="padding-bottom:3em;">
  <section id="LogIn" style="height: auto; padding-bottom: 1em;">
    <div id='errorAlert' class='vanish'></div>
    <div id="LogIn_div" style="margin-top: 1.75em;">
      <h2>Regístrate</h2>
      <form action="web/php/register.php" method="post">
      <input type="email" name="email" placeholder="Correo electrónico..." class="login-input form-control" autocomplete="off" required>
        <input type="text" name="nombre" pattern="[A-Za-z0-9_-]{1,50}" placeholder="Nombre de usuario..." class="login-input form-control" autocomplete="off" required>
        <input type="password" pattern="[A-Za-z0-9_-]{1,50}" name="contrasena" placeholder="Contraseña..." class="login-input form-control inputPasswordRegister" id="pswrd" onkeyup='confirmPswrd()' required>
        <input type="password" pattern="[A-Za-z0-9_-]{1,50}" placeholder="Confirmar contraseña..." class="login-input form-control inputPasswordRegister" id="pswrd_confirm" onkeyup='confirmPswrd()' required>
        <div class="d-flex justify-content-around align-items-center mt-2">
          <input type="checkbox" id="seePasswordInputs" class="btn-check align-middle" onclick="seeRegisterPasswords()" style="width: 40%;"><label class="btn btn-outline-primary pt-1" for="seePasswordInputs">Ver contraseñas</label>
          <button type="button" onclick="generatePassMultipleInputs()" class="btn btn-primary" style="width: 40%;">Genera una contraseña</button>
        </div>
        <span id='message'></span>
        <a href="login.php">¿Tienes una cuenta? ¡Inicia sesión!</a>
        <button type="submit" onclick="isTheSame()" class="btn btn-primary" id="boton_repiola" style="background-color: #f85d09; margin-bottom: 2em;">Aceptar</button>
      </form>
    </div>
  </section>
  <footer style="background-color:#2244;">
    <?php require "fotter/footer.php"; ?>
    </footer>

</body>
<script src="Scripts/clickGestPass.js"></script>
  <script src="Scripts/functions.js"></script>
</html>