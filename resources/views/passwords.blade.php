@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="assets/vendor/vex/vex.css">
    <link rel="stylesheet" href="assets/vendor/vex/vex-theme-default.css">
    <link rel="stylesheet" href="assets/vendor/alertify/alertify.min.css"/>
    <link rel="stylesheet" href="assets/vendor/alertify/alertify-theme-default.min.css"/>
@endsection

@section('scripts')
    <script src="assets/vendor/alertify/alertify.min.js"></script>
    <script src="assets/vendor/vex/vex.js"></script>
    <script src="assets/vendor/vex/vex.combined.min.js"></script>
    <script src="assets/js/alerts.js"></script>
@endsection



@section('bodyOnLoad', 'alerts("passManagement")')

@section('body')

    <section id="gestionarPass">
        <h2>Gestionar contraseñas</h2>
        <hr><br><br>
        <h3 class="text-start">Buscar contraseñas</h3>
        <form action="{{ route('search') }}"  method="post">
            @csrf
            <div class="buscador-container text-center">
                <div class="inputSearch-container">
                    <input type="text" class="inputSearch" value="@if(isset($search)){{$search}}@endif" name="search" placeholder="Buscar" autocomplete="off">
                </div>
                <div class="searchButton-container">
                    <button type="submit" class="btn btn-primary searchButton">Buscar</button>
                </div>
            </div>
        </form>
        <table class="table-accounts mx-auto" id="table-accounts">
            <thead id="table-head">
                <tr style="border-top: none;">
                    <th align="center" style="border-top-left-radius: inherit;">Sitio</th>
                    <th align="center">Nombre</th>
                    <th align="center">Contraseña</th>
                    <th align="center" colspan="3" style="border-top-right-radius: inherit;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @isset($Passwords[0])
                    @foreach ($Passwords as $data)
                        <tr>
                            <td> <a target="_blank" href="@if(isset($data->web)){{$data->web}}@endif">@if(isset($data->web)){{$data->web}}@endif</a></td>
                            <td align="center">{{$data->name}}</td>
                            <td align="center">
                                <input type="password" class="td-password" id="pass{{$data->id}}" value="{{$data->password}}" readonly>
                                <button id="ver" class="btn-showPass" class="btn-opcion" onclick="clickedView('pass{{$data->id}}')" title="Mostrar"></button>
                            </td>
                            <td class="opciones desktopButtons" align="center">
                                <button type="button" onclick="alertDeletePass('{{$data->id}}', '{{ csrf_token() }}')" class="btn-opcion btn-delPass" title="Eliminar"></button>
                            </td>
                            <td class="opciones desktopButtons" align="center">
                                <button class="btn-opcion btn-editPass" onclick="alertEditPass('{{$data->id}}', '{{ csrf_token() }}', '@if(isset($data->web)){{$data->web}}@endif', '{{$data->name}}', '{{$data->password}}')" title="Editar"></button>
                            </td>
                            <td class="opciones desktopButtons" align="center">
                                    <button class="btn-opcion btn-copyPass" onclick="copyPassword('pass{{$data->id}}')"></button>
                            </td>
                            <td id="mobileButton">
                                <div class="btn-group mt-3">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><div class="dropdown-item" onclick="clickedView('pass{{$data->id}}')">Ver</div></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><div class="dropdown-item" onclick="alertDeletePass('{{$data->id}}', '{{ csrf_token() }}')">Eliminar</div></li>
                                        <li><div class="dropdown-item" onclick="alertEditPass('{{$data->id}}', '{{ csrf_token() }}', '@if(isset($data->web)){{$data->web}}@endif', '{{$data->name}}', '{{$data->password}}')">Editar</div></li>
                                        <li><div class="dropdown-item" onclick="copyPassword('pass{{$data->id}}')">Copiar</div></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endisset

                <!-- Authentication Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <tr id="filaAddPass" style="border-bottom-left-radius: inherit;border-bottom-right-radius: inherit;">
                    <td align="center" colspan="6" id="Agregar"><button onclick="alertAddPass('{{ csrf_token() }}')" class="btn-addPass">+ Añadir</button></td>
                </tr>
            </tbody>
        </table>
    </section>



@endsection

@section('footerClass', 'w-100')

@section('footerStyle', 'position:static;bottom:0;')
