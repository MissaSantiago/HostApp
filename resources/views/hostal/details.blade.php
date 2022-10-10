@extends('layouts.menu')

@section('content')
<div class="view-details">
    <section class="container-details">
        <figure class="card-deta_va">
            <div class="top-deta">
                <div class="card-deta_hero">
                    <img class="card-deta_img" src="{{ asset('storage').'/'.$hostal->foto }}" alt="Foto del hostal">
                </div>
                <div class="reservar">
                    <div class="card-deta_name">
                        <p class="card-deta_name_text">{{ $hostal->nombre }}</p>
                    </div>
                    <form class="form-res" action="{{ route('hostal.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="" class="label-res">Fecha de llegada</label>
                        <input type="date" name="f_llegada" required>

                        <label for="" class="label-res">Fecha de salida</label>
                        <input type="date" name="f_salida" required>

                        <input type="hidden" name="precio" value="{{ $hostal->precio_noche }}">
                        
                        <input type="hidden" name="id_hostal" value="{{ $hostal->id }}">
                        
                        <input type="hidden" name="user_anfi" value="{{ $hostal->anfitrion_user }}">
                        
                        <div class="cont-btn">
                            <input type="submit" class="res-btn" value="Reservar ahora">
                        </div>
                    </form>
                </div>
            </div>
    
            <div class="card-deta_contenido">
                <div class="card-deta_info">
                    <p class="card-deta_detalles"><i class="fas fa-info-circle icn-dtl"></i> {{ $hostal->descripcion }} &middot; {{ $hostal->ciudad }}</p>
                    <p class="card-deta_direccion"><i class="fas fa-bed icn-dtl"></i> Agua caliente, TV por cable, Wi-Fi, estacionamiento gratuito.</p>
                    <p class="card-deta_direccion"><i class="fas fa-map-marker-alt icn-dtl"></i> {{ $hostal->direccion }}, {{ $hostal->municipio }}, {{ $hostal->estado }}.</p>
                    <div class="deta-row">
                        <h5 class="card-deta_precio"><i class="fas fa-dollar-sign"></i>{{ $hostal->precio_noche }}.00</h5>
                        <h5 class="card-deta_noche"> /noche</h5>
                    </div>
                </div>
            </div>
        </figure>
    </section>

    <section class="cont-map">
        <iframe
            style="border:0"
            loading="lazy"
            allowfullscreen
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBMpPAbr0EWhM55f2kGDF9VROVIF87aBVw
                &q={{ $dir = str_replace(' ', '+', $hostal->direccion.",+".$hostal->ciudad.",+".$hostal->municipio.",+".$hostal->estado) }}+Mexico">
        </iframe>
    </section>
</div>
@endsection