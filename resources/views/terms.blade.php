@extends('layouts.app')

@section('bodyOnLoad', 'alerts("register")')

@section('bodyStyle', 'padding-bottom:3em;')

@section('body')
    <section id="LogIn" style="height: auto; padding-bottom: 1em; padding-top: 1em; padding-left: 2em; padding-right: 2em;">
        <h1>Términos y Condiciones de Uso</h1>
        <h3>Última actualización: 9 de Agosto de 2023</h3>
        <p>
            Bienvenido/a a Jildam. Te invitamos a leer detenidamente los siguientes Términos y Condiciones de Uso
            antes de utilizar nuestra aplicación y sus servicios. Al acceder y utilizar nuestra aplicación, aceptas cumplir con estos Términos y todas las leyes y regulaciones aplicables.
            Si no estás de acuerdo con estos Términos, por favor, no utilices nuestra aplicación.
        </p>
        <h2>1. Definiciones</h2>
        <p>En estos Términos, los siguientes términos tendrán los siguientes significados:</p>
        <p style="white-space: pre-line">
            "Aplicación": Hace referencia a Jildam, una aplicación web desarrollada y proporcionada por nosotros.
            "Usuario": Se refiere a cualquier persona que acceda y utilice la Aplicación.
            "Datos Personales": Se refiere a la información personal y confidencial proporcionada por el Usuario en el proceso de registro y uso de la Aplicación,
            incluyendo, entre otros, nombre de usuario, contraseña y otros datos relacionados.
        </p>
        <h2>2. Privacidad y Protección de Datos</h2>
        <p>
            Cumplimos con las disposiciones de la Ley de Protección de Datos Personales y Hábeas Data. Tus Datos Personales serán tratados con estricta confidencialidad y solo serán utilizados
            para los fines previstos en la Aplicación. Utilizamos medidas de seguridad y encriptación (AES256-cbc + HMAC-SHA256) para proteger tus contrseñas y Bcrypt (10 rounds) para tu contraseña de acceso.
        </p>
        <h2>4. Uso de la Aplicación</h2>
        <p>
            La Aplicación está destinada únicamente para uso personal. No está permitido utilizar la Aplicación para fines ilegales o fraudulentos. Los Usuarios son responsables de mantener la
            confidencialidad de su información de acceso y contraseña.
        </p>
        <h2>5. Responsabilidad y Garantías</h2>
        <p>
            No nos responsabilizamos por el uso indebido o acceso no autorizado a los Datos Personales almacenados en la Aplicación por culpa de mal uso de la aplicacion. Los Usuarios son responsables
            de la seguridad de su información de acceso. Nos esforzamos por mantener la disponibilidad y seguridad de la Aplicación, pero no garantizamos que esté libre de errores o interrupciones no relacionadas
            con la seguridad y integridad de la aplicacion.
        </p>
        <h2>6. Modificaciones y Actualizaciones</h2>
        <p>
            Nos reservamos el derecho de modificar o actualizar estos Términos en cualquier momento. Te recomendamos revisar periódicamente los Términos para estar al tanto de cualquier cambio.
            El uso continuado de la Aplicación después de cualquier modificación constituye tu aceptación de los Términos modificados.
        </p>
        <h2>7. Contrato</h2>
        <p>
            Si estas accediendo a esta hoja de terminos desde https://jildam.maximoprandi.tech/terms estas aceptando que esta es solo una demostracion tecnologica, recomendamos encarecidamente no
            utlizarla para almacenar contraseñas sensibles.
        </p>
        <h2>8. Contacto</h2>
        <p>
            Si tienes preguntas, comentarios o inquietudes sobre estos Términos, por favor contáctanos a través de contact@maximoprandi.me
        </p>
        <p>
            Al utilizar nuestra Aplicación, aceptas cumplir con estos Términos. Si no estás de acuerdo con alguno de los términos, por favor no utilices nuestra Aplicación.
        </p>
    </section>

@endsection
