@extends('layouts.menu')

@section('content')
<img class="wave" src="{{ asset('img/wave.png') }}">
@if (count($reservaciones) > 0)
        @foreach ($reservaciones as $reservacion)
        
        <div class="container_reserv">
            <div class="course">
                <div class="preview">
                    <h6>ID del Hostal</h6>
                    <h2>{{ $reservacion->id_hostal }}</h2>
                </div>
    
                <div class="info">
                    <div class="progress-wrapper">
                        <div class="progress"></div>
                    </div>
                    <h6>Información de la reservación</h6>
                    <h2>Fecha de llegada: {{ $reservacion->fecha_llegada }} &middot; Fecha de salida: {{ $reservacion->fecha_salida }}</h2>
                    <p class="p-trunc">Precio / noche: ${{ $reservacion->precio_noche }}.00 &middot; Noches: {{ $reservacion->noches }}</p>
                    <p class="reservaciones">Total: ${{ $reservacion->total }}.00</p>
                </div>
            </div>
        </div>

        @endforeach
{{-- {{ $hostales->links() }} --}}
@else
<div class="container_noplace">
    <div class="img_noplace">
        <img src="{{ asset('img/no_places.svg') }}">
    </div>

    <div class="msj_noplace">
        <h1>¡Hola, {{ Auth::user()->name }}!</h1>
        <h2>Aún no cuentas con reservaciones</h2>
        <p><i class="fas fa-calendar"></i></p>
    </div>
</div>
@endif
@endsection