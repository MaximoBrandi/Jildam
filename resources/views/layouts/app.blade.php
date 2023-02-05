<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

?>

<!DOCTYPE html>
<html lang="es-AR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="assets/img/jildam_icon.svg">

        <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="assets/css/globalStyles.css">
        <link rel="stylesheet" href="assets/css/normalize.css">
        @yield('stylesheets', '')

        <script src="assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
        @yield('scripts', '')

        <title>Jildam</title>
    </head>

    <body id="@yield('bodyId', '')" class="@yield('bodyClass', '')" style="@yield('bodyStyle', '')" onload="@yield('bodyOnLoad', '')">
        <x-menu/>

        @yield('body', '')

        @unless (Route::currentRouteName() == 'main')
            <footer id="@yield('footerId', '')" class="@yield('footerClass', '')" style="@yield('footerStyle', '')">
                <x-footer/>
            </footer>
        @endunless

        <script src="assets/js/theme.js"></script>
        <script src="assets/js/globalFunctions.js"></script>
    </body>
</html>
