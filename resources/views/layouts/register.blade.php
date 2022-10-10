<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('img/icono.png') }}"/>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loader.css') }}" rel="stylesheet">

    <title>HostApp | REGISTRARSE</title>
</head>
<body>

    <div class="contenedor_loader">
        <div class="loader"></div>
    </div>
    
    <header>
        <div class="nav">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('img/icono.png') }}" alt="Logo"></a>
                <p>HostApp</p>
            </div>
            <ul class="menu">
                <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a></li>
                <li><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Registrarse</a></li>
                <li><a href="{{ route('aviso.index') }}"><i class="fas fa-exclamation-triangle"></i> Aviso de Privacidad</a></li>
            </ul>
        </div>
    </header>

    <div class="back-header"></div>

    <main>
        @yield('content')
    </main>

    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/d99d555e83.js" crossorigin="anonymous"></script>

    <!-- Script para ocultar la pantalla de carga cuando haya cargado todo -->
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>