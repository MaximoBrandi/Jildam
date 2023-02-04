@extends('layouts.app')

@section('bodyClass', 'index')

@section('body')
    <section id="logSec">
        <div id="LogedOut">
            <h2>¡Bienvenido/a!</h2>
            <p>¡Hola! Somos un gestor de contraseñas de código abierto, eso significa que cualquier persona puede encontrar y solucionar errores, aumentando la eficacia del sistema. Sumado a eso, contamos con un apartado de "Perfil" donde podrás modificar tu perfil a tu gusto, cambiando la imagen, el nombre y el usuario. ¿Qué esperas para ingresar?</p>
            <form>
                <div id="logInSec" class="LogedOut__Div">
                    <label>Puede ingresar a su cuenta</label>
                    <button type="button" class="btn btn-primary" id="boton" onclick="location.href='login.php'">Ingresar</button>
                </div>

                <div id="registerSec" class="LogedOut__Div">
                    <label>Puede crear una cuenta</label>
                    <button type="button" class="btn btn-primary" id="boton" onclick="location.href='register.php'">Registrarse</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('footerStyle', 'margin-top: 7.5em;')
