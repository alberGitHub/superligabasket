<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actualiza los datos del MVP') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{url('play/'.$play->id)}}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Esto hay que ponerlo en todos los formularios que no sean por GET --}}
            @method('PUT') {{-- se pone porque es put de metodo --}}
            <div class="form-group">
                <label for="puntos">Puntos</label>
                <input type="number" class="form-control" name="puntos" value="{{$play->puntos}}"  id="puntos">
                @error('puntos')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label for="asistencias">Asistencias</label>
                <input type="number" class="form-control" name="asistencias" value="{{$play->asistencias}}"  id="asistencias">
                @error('asistencias')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label for="rebotes">Rebotes</label>
                <input type="number" class="form-control" name="rebotes" value="{{$play->rebotes}}"  id="rebotes">
                @error('rebotes')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label for="tapones">Tapones</label>
                <input type="number" class="form-control" name="tapones" value="{{$play->tapones}}"  id="tapones">
                @error('posicion')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label>Jugador actual</label>
                @foreach($players as $player)
                    @if($play->player_id==$player->id)
                        <input type="text" disabled class="form-control"  value="{{$player->nombre}}">
                    @endif
                @endforeach
            </div>

            <div class="form-group">
                <label>Fecha del partido actual</label>
                @foreach($games as $game)
                    @if($play->game_id==$game->id)
                        <input type="text" disabled class="form-control"  value="{{$game->fechaPartido}}">
                    @endif
                @endforeach
            </div>


            <button type="submit" class="btn btn-primary">Actualizar</button>


        </form>
    @endsection

</x-app-layout>
