<?php
    require_once "php/functions/conexion.php";
    include "php/functions/checkSession.php";
    checkSession(1);
    include "php/presetHTML/menu.php";
?>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/globalStyles.css">
    <title>Jildam</title>
</head>
<body onload='alerts("register")' style="padding-bottom:3em;">
  <section id="LogIn" style="height: auto; padding-bottom: 1em;">
    <div id='errorAlert' class='vanish'></div>
    <div id="LogIn_div" style="margin-top: 1.75em;">
      <h2>Regístrate</h2>
      <form action="php/functions/register.php" method="post">
      <input type="email" name="email" placeholder="Correo electrónico..." value="<?php if(isset($_COOKIE['tempEmail'])) echo $_COOKIE['tempEmail'];?>" class="login-input form-control" autocomplete="off" required>
        <input type="text" name="nombre" pattern="[A-Za-z0-9_-]{1,50}" placeholder="Nombre de usuario..." class="login-input form-control" value="<?php if(isset($_COOKIE['tempUser'])) echo $_COOKIE['tempUser'];?>" autocomplete="off" required>
        <input type="password" pattern="[A-Za-z0-9_-]{1,50}" name="contrasena" placeholder="Contraseña..." class="login-input form-control inputPasswordRegister" id="pswrd" onkeyup='confirmPswrd()' required>
        <input type="password" pattern="[A-Za-z0-9_-]{1,50}" name="confirmContrasena" placeholder="Confirmar contraseña..." class="login-input form-control inputPasswordRegister" id="pswrd_confirm" onkeyup='confirmPswrd()' required>
        <div class="d-flex justify-content-around align-items-center mt-2">
          <input type="checkbox" id="seePasswordInputs" class="btn-check align-middle" onclick="seeRegisterPasswords()" style="width: 40%;"><label class="btn btn-outline-primary pt-1" for="seePasswordInputs">Ver contraseñas</label>
          <button type="button" onclick="generatePassMultipleInputs()" class="btn btn-primary" style="width: 40%;">Genera una contraseña</button>
        </div>
        <div id='message'></div>
        <a href="login.php">¿Tienes una cuenta? ¡Inicia sesión!</a>
        <button type="submit" onclick="isTheSame()" class="btn btn-primary" id="boton_repiola" style="background-color: #f85d09; margin-bottom: 2em;">Aceptar</button>
      </form>
    </div>
  </section>
  <footer>
      <?php include "php/presetHTML/footer.php";?>
  </footer>
</body>
</html>
<script src="js/globalFunctions.js"></script>