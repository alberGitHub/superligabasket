<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añade un nuevo MVP') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{route('play.store')}}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Esto hay que ponerlo en todos los formularios que no sean por GET --}}
            <div class="form-group">
                <label for="puntos">Puntos</label>
                <input type="number" class="form-control" name="puntos"  id="puntos" placeholder="Puntos">
                @error('puntos')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="asistencias">Asistencias</label>
                <input type="number" class="form-control" name="asistencias"  id="asistencias" placeholder="Asistencias">
                @error('asistencias')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="rebotes">Rebotes</label>
                <input type="number" class="form-control" name="rebotes"  id="rebotes" placeholder="Rebotes">
                @error('rebotes')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="tapones">Tapones</label>
                <input type="number" class="form-control" name="tapones"  id="tapones" placeholder="Tapones">
                @error('tapones')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="jugador">Jugador</label>
                <select class="form-control" name="jugador" id="jugador">
                    <option value="">Selecciona el jugador</option>
                    @foreach($players as $player)
                        <option value="{{$player->id}}">{{$player->nombre}}</option>
                    @endforeach
                </select>
                @error('jugador')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="game_id">Fecha Partido</label>
                <select class="form-control" name="game_id" id="game_id">
                    <option value="">Selecciona la fecha del partido</option>
                    @foreach($games as $game)
                        <option value="{{$game->id}}">{{$game->fechaPartido}}</option>
                    @endforeach
                </select>
                @error('partido')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>

        </form>
    @endsection

</x-app-layout>
