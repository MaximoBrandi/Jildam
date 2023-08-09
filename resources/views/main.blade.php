@extends('layouts.app')

@section('scripts')
    <script src="assets/vendor/alertify/alertify.min.js"></script>
    <script src="js/inicio.js"></script>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="assets/vendor/alertify/alertify.min.css"/>
    <link rel="stylesheet" href="assets/vendor/alertify/alertify-theme-default.min.css"/>
@endsection

@section('bodyOnLoad', 'inicioEvent()')

@section('body')
    <section id="optionsMenu" class="flex-column">
        <div id="menuBase">
            <div class="opcionElegida w-100">
                <form class="MenuOpcions__base " id="bienvenida">
                    <h2>Bienvenido, {{ Auth::user()->username }}</h2>
                </form>
                <footer class="w-100" style="padding-bottom: 23em; margin-top: -3em;">
                    <x-footer/>
                </footer>
            </div>
            <div class="opcionMenu logged d-flex justify-content-around" id="logedOpcionMenu">
                <div class="opcionMenu logged d-flex justify-content-around" id="loged" style="border: none;">
                    <button class="btn btn-primary text-center managePasswords" onclick="window.location.href = '{{ route('passwords') }}'">Gestionar Contraseñas</button>
                    <button class="btn btn-primary text-center manageProfile" onclick="window.location.href = '{{ route('profile') }}'">Perfil</button>
                </div>
            </div>
        </div>
    </section>
@endsection
