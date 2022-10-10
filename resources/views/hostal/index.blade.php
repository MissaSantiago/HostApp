@extends('layouts.menu_results')

@section('content')
<img class="wave" src="{{ asset('img/wave.png') }}">
    @if (count($hostales) > 0)
            @foreach ($hostales as $hostal)
            <section>
                <figure class="card-va">
                    <div class="card_hero">
                        <img class="card_img" src="{{ asset('storage').'/'.$hostal->foto }}" alt="Foto del hostal">
                        <div class="card_name">
                            <p class="card_name_text">{{ $hostal->nombre }}</p>
                        </div>
                    </div>
                    <div class="card_contenido">
                        <div class="card_info">
                            <p class="card_detalles">{{ $hostal->descripcion }} &middot; {{ $hostal->ciudad }}</p>
                            <p class="card_direccion">{{ $hostal->municipio }}, {{ $hostal->estado }}.</p>
                            <div class="row">
                                <h5 class="card_precio">${{ $hostal->precio_noche }}.00 </h5>
                                <h5 class="card_noche"> /noche</h5>
                            </div>
                        </div>
                        <div class="card_boton">
                            <a href="{{ route('hostal.show',$hostal->id) }}" class="card_btn">Ver más</a>
                        </div>
                    </div>
                </figure>
            </section>
            @endforeach
        
        @else
            <div class="container_noplace">
                <div class="img_noplace">
                    <img src="{{ asset('img/no_places.svg') }}">
                </div>
        
                <div class="msj_noplace">
                    <h1>Lo sentimos, no se encontraron resultados :(</h1>
                    <h2>Verifica que el nombre del lugar esté bien escrito</h2>
                    <p>O que se encuentre dentro de la república Mexicana.</p>
                </div>
            </div>
        @endif

@endsection