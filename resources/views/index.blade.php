@extends('layouts.app')

@section('bodyClass', 'index')

@section('stylesheets')
    <link rel="stylesheet" href="assets/vendor/sweetalert2/sweetalert2.min.css">
@endsection

@section('scripts')
    <script src="assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
@endsection

@section('body')
    <section id="logSec">
        <div id="LogedOut">
            <h2>¡Bienvenido/a!</h2>
            <p>¡Hola! Somos un gestor de contraseñas de código abierto, eso significa que cualquier persona puede encontrar y solucionar errores, aumentando la eficacia del sistema. Sumado a eso, contamos con un apartado de "Perfil" donde podrás modificar tu perfil a tu gusto, cambiando la imagen, el nombre y el usuario. ¿Qué esperas para ingresar?</p>
            <form>
                <div id="logInSec" class="LogedOut__Div">
                    <label>Puede ingresar a su cuenta</label>
                    <button type="button" class="btn btn-primary" id="boton" onclick="location.href='{{ route('login') }}'">Ingresar</button>
                </div>

                <div id="registerSec" class="LogedOut__Div">
                    <label>Puede crear una cuenta</label>
                    <button type="button" class="btn btn-primary" id="boton" onclick="location.href='{{ route('register') }}'">Registrarse</button>
                </div>
            </form>
        </div>
    </section>

    <script>
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Aceptas continuar sin ingresar contraseñas reales?',
                text: "ESTA PAGINA ES UNA DEMO PRUEBA DE UN PROYECTO ANTIGUO, ACTUALMENTE NO ES SEGURO ALMACENAR CONTRASEÑAS REALES AQUI!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Estoy seguro!',
                cancelButtonText: 'No lo estoy!',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                    'Aceptaste!',
                    'Recuerda no ingresar informacion real o confidencial aqui, queda bajo tu responsabilidad.',
                    'success'
                    )
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'No aceptaste',
                    'Queda bajo tu responsabiliad si sigues aqui',
                    'error'
                    )
                }
                })
    </script>
@endsection

@section('footerStyle', 'margin-top: 7.5em;')
