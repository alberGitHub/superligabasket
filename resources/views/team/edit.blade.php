<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actualiza los datos del equipo') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{url('team/'.$myteam->id)}}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Esto hay que ponerlo en todos los formularios que no sean por GET --}}
            @method('PUT') {{-- se pone porque es put de metodo --}}
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{$myteam->nombre}}"  id="nombre" placeholder="Nombre">
                @error('nombre')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="{{$myteam->ciudad}}"  id="ciudad" placeholder="Ciudad">
                @error('ciudad')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label for="estadio">Estadio</label>
                <input type="text" class="form-control" name="estadio" value="{{$myteam->estadio}}"  id="estadio" placeholder="Estadio">
                @error('estadio')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label for="year">Año de fundación</label>
                <input type="text" class="form-control" name="year" value="{{$myteam->year}}"  id="year" placeholder="Año de fundación">
                @error('year')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label for="escudo">Escudo del equipo</label>
                <img class="rounded float-letf" width="10%" src="{{asset(url($url.$myteam->escudo))}}">
                <input type="file" class="form-control" name="escudo" id="escudo" placeholder="Escudo">
                @error('escudo')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label for="entrenador">Entrenador</label>
                <input type="text" class="form-control" name="entrenador" value="{{$myteam->entrenador}}"  id="entrenador" placeholder="Entrenador">
                @error('entrenador')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label for="victorias">Victorias</label>
                <input type="number" class="form-control" name="victorias" value="{{$myteam->victorias}}"  id="victorias" placeholder="Victorias">
                @error('victorias')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label for="derrotas">Derrotas</label>
                <input type="number" class="form-control" name="derrotas" value="{{$myteam->derrotas}}"  id="derrotas" placeholder="Derrotas">
                @error('derrotas')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>



        </form>
    @endsection

</x-app-layout>