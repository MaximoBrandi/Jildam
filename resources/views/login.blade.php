@extends('layouts.app')

@section('scripts', '<script src="js/clickGestPass.js"></script>')



@section('bodyOnLoad', 'alerts("login")')

@section('body')
    <section id="LogIn" style="height: auto; padding-bottom: 1em;">
        <div id='errorAlert' class='vanish'></div>
        <div id="LogIn_div" style="padding-bottom: 1em;">
        <h2 style="margin-top: 1em;" id="tituloLogIn">Loguearte</h2>
        <form action="php/functions/login.php" method="post">
            <input type="email" name="email" placeholder="E-Mail..." value="{{$tempEmail}}" class="login-input form-control" required><br>
            <div class="d-flex">
            <input type="password" name="contrasena" pattern="[A-Za-z0-9_-]{1,50}" placeholder="Contraseña..." class="login-input form-control" id="input-passGenerada" required style="margin-left: 2em;">
            <button type="button" onclick="showPasswordInput()" class="btn-verPassLogin" title="Mostrar"></button>
            </div>
            <a href="register.php">¿No tienes una cuenta? ¡Regístrate!</a>
            <button type="submit" class="btn btn-primary" id="boton_repiola">Iniciar Sesión</button>
        </form>
        </div>
    </section>
@endsection
