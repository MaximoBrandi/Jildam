@extends('layouts.app')

@section('bodyOnLoad', 'alerts("register")')

@section('bodyStyle', 'padding-bottom:3em;')

@section('body')
    <section id="LogIn" style="height: auto; padding-bottom: 1em;">
        <div id='errorAlert' class='vanish'></div>
        <div id="LogIn_div" style="margin-top: 1.75em;">
            <h2>Regístrate</h2>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <input type="email" name="email" placeholder="Correo electrónico..." class="login-input form-control" autocomplete="off" required>
                <div>
                    <input type="text" name="name" pattern="[A-Za-z0-9_-]{1,50}" placeholder="Nombre de usuario..." class="login-input form-control" autocomplete="off" required>
                </div>
                <input type="password" pattern="[A-Za-z0-9_-]{1,50}" name="password" placeholder="Contraseña..." class="login-input form-control inputPasswordRegister" id="pswrd" onkeyup='confirmPswrd()' required>
                <input type="password" pattern="[A-Za-z0-9_-]{1,50}" name="password_confirmation" placeholder="Confirmar contraseña..." class="login-input form-control inputPasswordRegister" id="pswrd_confirm" onkeyup='confirmPswrd()' required>
                <div class="d-flex justify-content-around align-items-center mt-2">
                    <input type="checkbox" id="seePasswordInputs" class="btn-check align-middle" onclick="seeRegisterPasswords()" style="width: 40%;"><label class="btn btn-outline-primary pt-1" for="seePasswordInputs">Ver contraseñas</label>
                    <button type="button" onclick="generatePassMultipleInputs()" class="btn btn-primary" style="width: 40%;">Genera una contraseña</button>
                </div>
                <div id="alertgenerate" class="d-flex justify-content-around align-items-center mt-2 vanish" >
                    <a>Al generar la contraseña tienes que copiarla y guardarla en un lugar seguro</a>
                </div>
                <div class="" id='message'></div>
                <a id="loginregister" class="" href="{{ route('login') }}">¿Tienes una cuenta? ¡Inicia sesión!</a>
                <button type="submit" onclick="isTheSame()" class="btn btn-primary" id="boton_repiola" style="background-color: #f85d09; margin-bottom: 2em;">Aceptar</button>
            </form>
        </div>
        <button class="btn tooltipButton-characters" data-bs-toggle="tooltip" data-bs-placement="top" title="Solo caracteres alfanuméricos y guiones"></button>
    </section>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

@endsection
