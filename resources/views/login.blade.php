@extends('layouts.app')

@section('scripts', '<script src="js/clickGestPass.js"></script>')



@section('bodyOnLoad', 'alerts("login")')

@section('body')
    <section id="LogIn" style="height: auto; padding-bottom: 1em;">
        <div id='errorAlert' class='vanish'></div>
        <div id="LogIn_div" style="padding-bottom: 1em;">
        <h2 style="margin-top: 1em;" id="tituloLogIn">Loguearte</h2>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <input type="email" name="email" placeholder="E-Mail..." value="@isset($tempEmail) {{$tempEmail}} @endisset" class="login-input form-control" required autofocus>
            <div class="d-flex">
            <input type="password" name="password" pattern="[A-Za-z0-9_-]{1,50}" placeholder="Contraseña..." class="login-input form-control" id="input-passGenerada" required style="margin-left: 2em;">
            <button type="button" onclick="showPasswordInput()" class="btn-verPassLogin" title="Mostrar"></button>
            </div>
            <a href="{{ route('register') }}">¿No tienes una cuenta? ¡Regístrate!</a>
            <button type="submit" class="btn btn-primary" id="boton_repiola">Iniciar Sesión</button>
        </form>
        </div>
    </section>

    <!-- Authentication Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
@endsection
