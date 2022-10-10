@extends('layouts.login')

@section('content')
<img class="wave" src="{{ asset('img/wave.png') }}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('img/login.svg') }}">
		</div>
		<div class="login-content">
			<form method="POST" action="{{ route('login') }}">
                @csrf
				<img src="{{ asset('img/avatar.svg') }}">
				<h2 class="title">Iniciar sesión</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="far fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="text" class="input @error('user') is-invalid @enderror" name="user" 
                              value="{{ old('user') }}" required autocomplete="off" autofocus placeholder="Usuario">
                        
                        @error('user')
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
           		    	<input type="password" class="input @error('password') is-invalid @enderror" name="password" 
                           required autocomplete="current-password" placeholder="Contraseña">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            	   </div>
            	</div>
                {{-- @if (Route::has('password.request'))
                    <a class="forgot-pass" href="{{ route('password.request') }}">
                        {{ __('¿Olvidó su contraseña?') }}
                    </a>
                @endif --}}
            	<input type="submit" class="btn" value="Ingresar">
            </form>
        </div>
    </div>

@endsection
