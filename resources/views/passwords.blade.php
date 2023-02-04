@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="assets/vendor/vex/vex.css">
    <link rel="stylesheet" href="assets/vendor/vex/vex-theme-default.css">
    <link rel="stylesheet" href="assets/vendor/alertify/alertify.min.css"/>
    <link rel="stylesheet" href="assets/vendor/alertify/alertify-theme-default.min.css"/>
    <link rel="stylesheet" href="assets/vendor/sweetalert2/sweetalert2.min.css">
@endsection

@section('scripts')
    <script src="assets/vendor/alertify/alertify.min.js"></script>
    <script src="assets/vendor/vex/vex.js"></script>
    <script src="assets/vendor/vex/vex.combined.min.js"></script>
    <script src="assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="js/alerts.js"></script>
@endsection



@section('bodyOnLoad', 'alerts("passManagement")')

@section('body')
    <x-password-administrator :PostData :Passwords>
@endsection

@section('footerClass', 'w-100')

@section('footerStyle', 'position:static;bottom:0;')
