@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="assets/vendor/vex/vex.css">
    <link rel="stylesheet" href="assets/vendor/vex/vex-theme-default.css">
@endsection

@section('scripts')
    <script src="assets/vendor/vex/vex.js"></script>
    <script src="assets/vendor/vex/vex.combined.min.js"></script>
    <script src="assets/js/alerts.js"></script>
@endsection

@section('bodyOnLoad', 'profileEvents()')

@section('body')
    <center>
        <section id="seccionOpciones">
            <nav id="navPerfil">
                <img src="@if(isset($data->pfp)){{$data->pfp}}@endif" id="photoPerfil" alt="Perfil">
                <div id="opciones">
                    <button type="button" id="personalizarButton" onclick="window.history.replaceState('owo', 'uwu', '?sec=2');" class="btn btn-primary btn-lg botonOpcion">Personalizar</button>
                    <button type="button" id="PySButton" onclick="window.history.replaceState('owo', 'uwu', '?sec=1');" class="btn btn-secondary btn-lg botonOpcion">Privacidad y Seguridad</button>
                </div>
            </nav>
            <div id="contenido">
                                <!-- Authentication Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <section id="Personalizar">
                    <div id="PerfilCambiar">
                        <img id="photoPerfilCambiar" src="@if(isset($data->pfp)){{$data->pfp}}@endif">
                        <button id="linkPerfilCambiar" class="link" onclick="changeUserPic('{{ csrf_token() }}')">Cambiar</button>
                    </div>
                    <form id="formContenido" class="text-center" action="{{ route('profile') }}" method="post">
                        @csrf
                        <div class="input-group flex-column flex-nowrap w-75 mx-auto">
                            <label>Usuario</label>
                            <input type="text" class="form-control" value="{{$username}}" name="username" aria-describedby="addon-wrapping" autocomplete="off">
                        </div>
                        <div class="input-group flex-column flex-nowrap w-75 mx-auto">
                            <label class="espacio">Nombre</label>
                            <input type="text" class="form-control" value="@if(isset($data->name)){{$data->name}}@endif" name="name" aria-describedby="addon-wrapping" autocomplete="off">
                        </div>
                        <div class="input-group flex-column flex-nowrap w-75 mx-auto">
                            <label class="espacio">Apellido</label>
                            <input type="text" class="form-control" value="@if(isset($data->surname)){{$data->surname}}@endif" name="surname" aria-describedby="addon-wrapping" autocomplete="off">
                        </div>
                        <div class="mb-3 espacio w-75 mx-auto">
                            <label>Biografía</label>
                            <textarea class="form-control" name="biography" id="exampleFormControlTextarea1" rows="3">@if(isset($data->biography)){{$data->biography}}@endif</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-75 mx-auto" id="btn-guardarPerfil">Guardar</button>
                    </form>
                </section>
                <section id="PyS" class="vanish">
                    <form action="{{ route('profile') }}" method="post">
                        @csrf

                        <h2 class="espacio">Cambiar contraseña</h2>
                        <button type="button" onclick="alertChangePassword('{{ csrf_token() }}')" class="btn btn-danger">Cambiar contraseña</button>
                        <h2 class="espacio">Eliminar cuenta</h2>
                        <button type="button" onclick="alertDeleteAccount('{{ csrf_token() }}')" class="btn btn-danger">Eliminar cuenta</button>
                        <h2 class="espacio">Resetear contraseñas</h2>
                        <button type="button" onclick="alertDeletePasswords('{{ csrf_token() }}')" class="btn btn-danger">Resetear contraseñas</button>
                    </form>
                </section>
            </div>
        </section>
    </center>
@endsection

@section('footerId', 'footerPerfil')
