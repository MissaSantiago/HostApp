@extends('layouts.menu_search')

@section('content')
    <div class="search-room">
        <div class="hello-user">
            <p>¡Bienvenido, {{ Auth::user()->name }}!</p>
        </div>
        <form action="{{ route('hostal.index') }}" method="GET">
            
            <div class="search-input caja-buscar_hab">
                <input class="barra" type="text" name="place" placeholder="¿A dónde deseas ir?" required>
                <button class="btn-buscar_hab" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
@endsection
