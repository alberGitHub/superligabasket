<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añade un nuevo equipo') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Esto hay que ponerlo en todos los formularios que no sean por GET --}}
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre"  id="nombre" placeholder="Nombre">
                @error('nombre')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" name="ciudad"  id="ciudad" placeholder="Ciudad">
                @error('ciudad')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="estadio">Estadio</label>
                <input type="text" class="form-control" name="estadio"  id="estadio" placeholder="Estadio">
                @error('estadio')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="year">Año de fundación</label>
                <input type="text" class="form-control" name="year"  id="year" placeholder="Año de fundación">
                @error('year')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="escudo">Escudo</label>
                <input type="file" class="form-control" name="escudo"  id="escudo" placeholder="Escudo">
                @error('escudo')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="victorias">Victorias</label>
                <input type="number" class="form-control" name="victorias"  id="victorias" placeholder="Victorias">
                @error('victorias')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="derrotas">Derrotas</label>
                <input type="number" class="form-control" name="derrotas"  id="derrotas" placeholder="Derrotas">
                @error('derrotas')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="entrenador">Entrenador</label>
                <input type="text" class="form-control" name="entrenador"  id="entrenador" placeholder="Entrenador">
                @error('entrenador')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>



        </form>
    @endsection

</x-app-layout>