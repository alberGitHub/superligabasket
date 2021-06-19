<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añade un nuevo partido') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{route('game.store')}}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Esto hay que ponerlo en todos los formularios que no sean por GET --}}
            <div class="form-group">
                <label for="equipoLocal">Equipo Local</label>
                <select class="form-control" name="equipoLocal" id="equipoLocal">
                    <option value="">Selecciona el equipo local</option>
                    @foreach($myteams as $myteam)
                        <option value="{{$myteam->id}}">{{$myteam->nombre}}</option>
                    @endforeach
                </select>
                @error('equipoLocal')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="puntosLocal">Puntos Local</label>
                <input type="number" class="form-control" name="puntosLocal"  id="puntosLocal" placeholder="Puntos Local">
                @error('puntosLocal')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="puntosVisitante">Puntos Visitante</label>
                <input type="number" class="form-control" name="puntosVisitante"  id="puntosVisitante" placeholder="Puntos Visitante">
                @error('puntosVisitante')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="equipoVisitante">Equipo Visitante</label>
                <select class="form-control" name="equipoVisitante" id="equipoVisitante">
                    <option value="">Selecciona el equipo visitante</option>
                    @foreach($myteams as $myteam)
                        <option value="{{$myteam->id}}">{{$myteam->nombre}}</option>
                    @endforeach
                </select>
                @error('equipoVisitante')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="fechaPartido">Fecha</label>
                <input type="date" class="form-control" name="fechaPartido"  id="fechaPartido" placeholder="Fecha">
                @error('fechaPartido')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Guardar</button>


        </form>
    @endsection

</x-app-layout>
