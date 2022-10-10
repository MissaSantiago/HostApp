@extends('layouts.menu')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/creed.css') }}">

    <img class="wave" src="{{ asset('img/wave.png') }}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('img/edit.svg') }}">
		</div>

        <div class="home">
            <form class="formulario" action="{{ route('home.update', $hostal['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h4>Editar hostal</h4>
                <input class="textbox" type="text" name="nombre" id="nombre" placeholder="Nombre del hostal" required autocomplete="off" value="{{ $hostal['nombre'] }}">
    
                <input class="textbox" type="text" name="descripcion" id="descripcion" placeholder="Descripción del hostal" required autocomplete="off"
                    value="{{ $hostal['descripcion'] }}">
                
                <input class="alinear" type="text" name="servicios" id="servicios" placeholder="Servicios del hostal" required autocomplete="off"
                    value="{{ $hostal['servicios'] }}">
    
                <input class="telef" type="number" name="precio" id="precio" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" 
                    oninvalid="setCustomValidity('Ingrese un precio válido')" oninput="setCustomValidity('')" 
                    pattern="[0-9]{0,10}" minlength="1" required autocomplete="off" placeholder="Precio" value="{{ $hostal['precio_noche'] }}">
    
                <h4>Dirección</h4>
    
                <input class="textbox" type="text" name="direccion" id="direccion" placeholder="Dirección [Calle | No | Barrio]" required autocomplete="off"
                    value="{{ $hostal['direccion'] }}">
    
                <input class="colonia" type="text" name="municipio" id="municipio" placeholder="Municipio" required autocomplete="off" 
                    value="{{ $hostal['municipio'] }}">
    
                <input class="ciudad" type="text" name="ciudad" id="ciudad" placeholder="Ciudad" required autocomplete="off" 
                    value="{{ $hostal['ciudad'] }}">
    
                <input class="ciudad" type="text" name="estado" id="estado" placeholder="Estado" required autocomplete="off" 
                    value="{{ $hostal['estado'] }}">
    
                {{-- <select class="seleccion" name="estado" id="estado" required>
                    <option hidden selected>Estado</option>
                </select> --}}
    
                <br>
                <label for="foto">Foto:</label>
                <input type="file" class="photo" name="foto" id="foto" value="{{ $hostal['foto'] }}" required>
    
                <div class="btn-control">
                    <input class="boton" type="submit" value="Guardar">
                    <input class="boton" id="cancel" type="reset" value="Cancelar">
                    <a href="javascript:history.back()">Regresar <i class="fas fa-undo-alt"></i></a>
                </div>
            </form>
        </div>
    </div>
    @endsection