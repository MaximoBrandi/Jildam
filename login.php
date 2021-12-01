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
    <title>LogIn</title>
</head>
<body onload='alerts("login")'>
  <section id="LogIn" style="height: auto; padding-bottom: 1em;">
    <div id='errorAlert' class='vanish'></div>
    <div id="LogIn_div" style="padding-bottom: 1em;">
      <h2 style="margin-top: 1em;" id="tituloLogIn">Loguearte</h2>
      <form action="php/functions/login.php" method="post">
        <input type="email" name="email" placeholder="E-Mail..." value="<?php if(isset($_COOKIE['tempEmail'])) echo $_COOKIE['tempEmail'];?>" class="login-input form-control" required><br>
        <div class="d-flex">
          <input type="password" name="contrasena" pattern="[A-Za-z0-9_-]{1,50}" placeholder="Contraseña..." class="login-input form-control" id="input-passGenerada" required style="margin-left: 2em;">
          <button type="button" onclick="showPasswordInput()" class="btn-verPassLogin" title="Mostrar"></button>
        </div>
        <a href="register.php">¿No tienes una cuenta? ¡Regístrate!</a>
        <button type="submit" class="btn btn-primary" id="boton_repiola">Iniciar Sesión</button>
      </form>
    </div>
  </section>
  <footer>
        <?php include "php/presetHTML/footer.php"; ?>
    </footer>
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/clickGestPass.js"></script>
</body>
</html>
<script src="js/globalFunctions.js"></script>