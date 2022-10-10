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

	<script src="https://kit.fontawesome.com/d99d555e83.js" crossorigin="anonymous"></script>
    
    <title>HostApp | CONFIRMACIÓN DE RESERVACIÓN</title>
</head>
<body>
    <img class="wave" src="{{ asset('img/wave.png') }}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('img/confirm.svg') }}">
		</div>

		<div class="msj-confirm">
			<h1>¡Reservación exitosa! <i class="far fa-calendar-check"></i></h1>
			<h2>Gracias por confiar en nosotros, {{ Auth::user()->name }}.</h2>
			<p>Puedes verificar tu correo, en donde te enviamos un mensaje de confirmación.</p>
			<button class="confir-btn">
				<a href="{{ url('/guest') }}"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
			</button>
		</div>
    </div>
</body>
</html>