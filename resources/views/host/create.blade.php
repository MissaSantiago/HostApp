@extends('layouts.menu')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/creed.css') }}">

    <img class="wave" src="{{ asset('img/wave.png') }}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('img/add_r.svg') }}">
		</div>

        <div class="home">
            <form class="formulario" action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4>Registrar nuevo hostal</h4>
                <input class="textbox" type="text" name="nombre" id="nombre" placeholder="Nombre del hostal" required autocomplete="off">
    
                <input class="textbox" type="text" name="descripcion" id="descripcion" placeholder="Descripción del hostal" required autocomplete="off">
                
                <input class="alinear" type="text" name="servicios" id="servicios" placeholder="Servicios del hostal" required autocomplete="off">
    
                <input class="telef" type="number" name="precio" id="precio" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" 
                    oninvalid="setCustomValidity('Ingrese un precio válido')" oninput="setCustomValidity('')" 
                    pattern="[0-9]{0,10}" minlength="1" required autocomplete="off" placeholder="Precio">
    
                <h4>Dirección</h4>
    
                <input class="textbox" type="text" name="direccion" id="direccion" placeholder="Dirección [Calle | No | Barrio]" required autocomplete="off">
    
                <input class="colonia" type="text" name="municipio" id="municipio" placeholder="Municipio" required autocomplete="off">
    
                <input class="ciudad" type="text" name="ciudad" id="ciudad" placeholder="Ciudad" required autocomplete="off">
    
                <input class="ciudad" type="text" name="estado" id="estado" placeholder="Estado" required autocomplete="off">
    
                {{-- <select class="seleccion" name="estado" id="estado" required>
                    <option hidden selected>Estado</option>
                </select> --}}
    
                <br>
                <label for="foto">Foto:</label>
                <input type="file" class="photo" name="foto" id="foto" required>
    
                <div class="btn-control">
                    <input class="boton" type="submit" value="Registrar">
                    <input class="boton" id="cancel" type="reset" value="Cancelar">
                    <a href="javascript:history.back()">Regresar <i class="fas fa-undo-alt"></i></a>
                </div>
            </form>
        </div>
    </div>
@endsection