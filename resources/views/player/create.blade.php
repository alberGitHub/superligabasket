<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añade un nuevo jugador') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{route('player.store')}}" method="POST" enctype="multipart/form-data">
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
                <label for="dorsal">Dorsal</label>
                <input type="number" class="form-control" name="dorsal"  id="dorsal" placeholder="Dorsal">
                @error('dorsal')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="nacionalidad">Nacionalidad</label>
                <input type="text" class="form-control" name="nacionalidad"  id="nacionalidad" placeholder="Nacionalidad">
                @error('nacionalidad')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="fecha_nac">Fecha nacimiento</label>
                <input type="date" class="form-control" name="fecha_nac"  id="fecha_nac" placeholder="Fecha nacimiento">
                @error('fecha_nac')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="posicion">Posicion</label>
                <input type="text" class="form-control" name="posicion"  id="posicion" placeholder="Posicion">
                @error('posicion')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>

            <div class="form-group">
                <label for="equipo">Equipo</label>
                <select class="form-control" name="equipo" id="equipo">
                    <option value="">Selecciona el equipo</option>
                    @foreach($myteams as $myteam)
                        <option value="{{$myteam->id}}">{{$myteam->nombre}}</option>
                    @endforeach
                </select>
                @error('equipo')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="altura">Altura(cm)</label>
                <input type="number" class="form-control" name="altura"  id="altura" placeholder="Altura(cm)">
                @error('altura')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>


            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" name="foto"  id="foto" placeholder="Foto">
                @error('foto')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>


        </form>
    @endsection

</x-app-layout>
