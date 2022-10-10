@extends('layouts.menu')

@section('content')

<img class="wave" src="{{ asset('img/wave.png') }}">
    <form class="form-buscar">
        <div class="container-buscar">
            {{-- <div class="titulo-buscar">
                <h3>Buscar</h3>
            </div> --}}
            <div class="caja-buscar alinear">
                <h3>Buscar</h3>
                <input type="text" name="buscar" placeholder="Ingresa el nombre" required>
                <button class="btn-buscar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div class="agregar alinear">
                <button>
                    <a href="{{ route('home.create') }}"><i class="fas fa-plus-circle"></i> Agregar</a>
                </button>
            </div>
        </div>
    </form>

    <div class="search-outcome">
            @if($buscar)
                <h5>Resultados de tu búsqueda <i>"{{ $buscar }}"</i></h5> 
            @endif
    </div>
    
    @if (count($hostales) > 0)
        <table class="list-host">
            <thead class="title-host">
                <tr><th>ID</th>
                    <th></th>
                    <th></th>
                    <th>Nombre</th>
                    <th></th>
                    <th>Descripción</th>
                    <th></th>
                    <th>Servicios</th>
                    <th></th>
                    <th>Precio</th>
                    <th></th>
                    <th>Dirección</th>
                    <th></th>
                    <th>Ciudad</th>
                    <th></th>
                    <th>Municipio</th>
                    <th></th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            
            <tbody class="info-host">
                @foreach ($hostales as $hostal)
                    <tr>
                        <td class="id">{{ $hostal->id }}</td>
                        <td><b>|</b></td>
                        <td>
                            <img src="{{ asset('storage').'/'.$hostal->foto }}" width="160" alt="Foto del hostal">
                        </td>
                        <td>{{ $hostal->nombre }}</td>
                        <td><b>|</b></td>
                        <td>{{ $hostal->descripcion }}</td>
                        <td><b>|</b></td>
                        <td>{{ $hostal->servicios }}</td>
                        <td><b>|</b></td>
                        <td>${{ $hostal->precio_noche }}.00</td>
                        <td><b>|</b></td>
                        <td>{{ $hostal->direccion }}</td>
                        <td><b>|</b></td>
                        <td>{{ $hostal->ciudad }}</td>
                        <td><b>|</b></td>
                        <td>{{ $hostal->municipio }}</td>
                        <td><b>|</b></td>
                        <td>{{ $hostal->estado }}</td>
                        <td id="actions"> 
                            <a href="{{ route('home.edit',$hostal->id) }}"><i class="fas fa-pen edit"></i>
                                {{-- <i class="fas fa-pencil-ruler edit"></i> --}}
                            </a>
                            <form action="{{ route('home.destroy',$hostal->id) }}" class="hostal-eliminar" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro que deseas eliminarlo?')" id="delete">
                                    <i class="fas fa-trash-alt delete"></i>
                                </button>
                            </form>    
                        </td>
                    </tr>
                    <hr/>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $hostales->links() }} --}}
    @else
    <div class="container_nores">
		<div class="img_nores">
			<img src="{{ asset('img/no_results.svg') }}">
		</div>

		<div class="msj_nores">
			<h1>¡Hola ANFITRIÓN, {{ Auth::user()->name }}!</h1>
			<h2>No se encontraron resultados o aún no has agregado algo</h2>
			<p>Pulsa en el botón 'Agregar' y comienza</p>
		</div>
    </div>
    @endif
    
    <!-- SeetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.hostal-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                    }
                })
            });
    </script>

@endsection