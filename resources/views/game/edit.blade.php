<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actualiza los datos del partido') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{url('game/'.$game->id)}}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Esto hay que ponerlo en todos los formularios que no sean por GET --}}
            @method('PUT') {{-- se pone porque es put de metodo --}}
            <div class="form-group">
                <label>Equipo Local actual</label>
                @foreach($myteams as $myteam)
                    @if($game->team_id_1==$myteam->id)
                        <input type="text" disabled class="form-control"  value="{{$myteam->nombre}}">
                    @endif
                @endforeach
            </div>
            <!--
            <div class="form-group">
                <label for="equipoLocal">Equipo Local</label>
                <select class="form-control" name="equipoLocal" id="equipoLocal">
                    <option value="">Selecciona el equipo</option>
                    @foreach($myteams as $myteam)
                        <option value="{{$myteam->id}}">{{$myteam->nombre}}</option>
                    @endforeach
                </select>
                @error('equipoLocal')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            -->
            <div class="form-group">
                <label for="puntosLocal">Puntos Local</label>
                <input type="number" class="form-control" name="puntosLocal" value="{{$game->puntosLocal}}"  id="puntosLocal">
                @error('puntosLocal')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label for="puntosVisitante">Puntos Visitante</label>
                <input type="number" class="form-control" name="puntosVisitante" value="{{$game->puntosVisitante}}"  id="puntosVisitante">
                @error('puntosVisitante')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label>Equipo Visitante actual</label>
                @foreach($myteams as $myteam)
                    @if($game->team_id_2==$myteam->id)
                        <input type="text" disabled class="form-control"  value="{{$myteam->nombre}}">
                    @endif
                @endforeach
            </div>
            <!--
            <div class="form-group">
                <label for="equipoVisitante">Equipo Local</label>
                <select class="form-control" name="equipoVisitante" id="equipoVisitante">
                    <option value="">Selecciona el equipo</option>
                    @foreach($myteams as $myteam)
                        <option value="{{$myteam->id}}">{{$myteam->nombre}}</option>
                    @endforeach
                </select>
                @error('equipoVisitante')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            -->

            <div class="form-group">
                <label for="fechaPartido">Fecha</label>
                <input type="date" class="form-control" disabled name="fechaPartido" value="{{$game->fechaPartido}}"  id="fechaPartido" placeholder="Fecha">
                @error('fechaPartido')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>


            <button type="submit" class="btn btn-primary">Actualizar</button>



        </form>
    @endsection

</x-app-layout>
