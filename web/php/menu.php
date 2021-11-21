<link rel="icon" href="../../recursos/img/jildam_icon.svg">
<script src="Scripts/bootstrap.bundle.min.js"></script>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand align-middle d-flex logo-container">
            <button onclick="window.location.href = 'index.php'" formaction='index.php' class="btn-inicio"
                title="Inicio"></button>
            <p class="mt-auto">Jildam Secure</p>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse flex-grow-0 w-100 justify-content-center" id="navbarNavDropdown">
      <ul class="navbar-nav d-flex justify-content-end w-100">
        <?php
        if(isset($_COOKIE['login'])){ ?>
            <li class="nav-item mx-auto">
                <a class="nav-link active px-5" aria-current="page" href="inicio.php" style="color: var(--text-primary-color)">Inicio</a>
            </li>
            <li class="nav-item mx-auto">
                <a class="nav-link active px-5" href="gestionarContrasenias.php" style="color: var(--text-primary-color)">Gestionar contraseñas</a>
            </li>
            <li class="nav-item mx-auto mx-auto">
                <a class="nav-link active px-5" href="Perfil.php" style="color: var(--text-primary-color)">Perfil</a>
            </li>
        <?php } ?>
            <li class="nav-item">
              <div class="LogInAccount d-flex justify-content-end" id="LogInSession">
                <button id="switchTheme" class="darkMode" title="Cambiar a tema claro/oscuro"></button>
                <?php
                  if(isset($_COOKIE['login'])){ ?>
                    <button onclick='deleteCookie("login")' formaction='index.php' class="btn-logout me-2" title="Cerrar sesión"></button>
                <?php } ?>
              </div>
            </li>
      </ul>
    </div>
  </div>
</nav>
<script src="Scripts/theme.js"></script>