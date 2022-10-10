@extends('layouts.register')

@section('content')

<img class="wave" src="{{ asset('img/wave.png') }}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('img/register_user.svg') }}">
		</div>
		<div class="login-content">
			<form method="POST" action="{{ route('register') }}">
                @csrf
				<!-- <img src="avatar.svg"> -->
				<h2 class="title">Registrarse</h2>

           		<div class="input-div one">
           		   <div class="i">
						<i class="fas fa-user-alt"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="text" class="input @error('name') is-invalid @enderror" 
                            name="name" value="{{ old('name') }}" required autocomplete="off" placeholder="Nombre completo" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
           		   </div>
           		</div>

           		<div class="input-div one">
           		   <div class="i"> 
						<!-- <i class="fas fa-at"></i> -->
						<i class="fas fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="email" class="input @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="off" placeholder="Correo electrónico / Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            	   </div>
            	</div>

				<div class="input-div one">
					<div class="i"> 
						<i class="fas fa-phone-alt"></i>
					</div>
					<div class="div">
						<input type="text" class="input @error('telefono') is-invalid @enderror" 
                            name="telefono" value="{{ old('telefono') }}" required autocomplete="off" 
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" 
                            oninvalid="setCustomValidity('Sólo ingresar 10 digitos')" oninput="setCustomValidity('')" 
                            pattern="[0-9]{0,10}" minlength="10" maxlength="10" placeholder="Teléfono">

                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				 	</div>
				</div>

				<div class="input-div one">
					<div class="i"> 
						<i class="far fa-user"></i>
					</div>
					<div class="div">
						<input type="text" class="input @error('user') is-invalid @enderror"
                        name="user" value="{{ old('user') }}" required autocomplete="off" placeholder="Usuario">

                        @error('user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				 	</div>
				</div>

				<div class="input-div one">
					<div class="i"> 
                        <i class="fas fa-people-arrows"></i>
                        {{-- <i class="fas fa-user-friends"></i> --}}
					</div>
					<div class="div sel">
						<label>¿Qué desea ser?</label>
                        
                        <select id="tipo" class="form-control @error('tipo_usuario') is-invalid @enderror" name="tipo_usuario" required>
                            <option hidden selected>Seleccionar</option>
                            <option value="anfitrion">Anfitrión</option>
                            <option value="huesped">Huésped</option>
                        </select>

                        @error('tipo_usuario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
				</div>
				
				<div class="input-div pass">
					<div class="i"> 
						<i class="fas fa-key"></i>
					</div>
					<div class="div">
						<input type="password" class="input @error('password') is-invalid @enderror" 
                        name="password" required placeholder="Contraseña" autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
				</div>

				<div class="input-div pass">
					<div class="i"> 
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<input type="password" class="input" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Confirmar contraseña">
					</div>
				</div>

            	<input type="submit" class="btn" value="Registrar">
            </form>
        </div>
    </div>
@endsection
