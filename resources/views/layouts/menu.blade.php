<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('img/icono.png') }}"/>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loader.css') }}" rel="stylesheet">

    <title>HostApp</title>
</head>

<div class="contenedor_loader">
    <div class="loader"></div>
</div>

<body>
    <header>
        <div class="nav">
            <div class="logo">
                <a href="{{ url('/home') }}"><img src="{{ asset('img/icono.png') }}" alt="Logo"></a>
                <p>HostApp</p>
            </div>
            <ul class="menu">
                <li><a href="{{ route('home.index') }}" role="button">
                    <i class="fas fa-home"></i> Inicio</a>
                </li>

                <li><a href="#" 
                    role="button">@if (Auth::user()->tipo_usuario == 'anfitrion')
                    <i class="fas fa-house-user user"></i> 
                @else
                    <i class="fas fa-user-circle user"></i> 
                @endif {{ Auth::user()->user }}</a></li>

                <li><a href="{{ route('reservacion.index') }}" role="button">
                    <i class="fas fa-calendar-alt"></i> Reservaciones</a>
                </li>
                
                <li><a href="{{ route('logout') }}" role="button"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
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