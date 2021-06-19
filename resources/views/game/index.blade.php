<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Partidos') }}
        </h2>
    </x-slot>

    @section('content')
        <input type="text" id="myInput3" style="color: black;" onkeyup="myFunction3()" placeholder="Buscar por equipo local">
        <input type="text" id="myInput4" style="color: black;" onkeyup="myFunction4()" placeholder="Buscar por equipo visitante">
        <input type="text" id="myInput5" style="color: black;" onkeyup="myFunction5()" placeholder="Buscar por fecha">(Nº Jornada sería el mes -> 2021-04 es la jornada 4)

        <div style="background-color: #2d3748; width: 1150px;">
            <table class="table" id="myTable2">
                <thead>
                <tr style="color: white; font-size: large">
                    <th scope="col">#</th>
                    <th scope="col">Escudo Local</th>
                    <th scope="col">Equipo Local</th>
                    <th scope="col">Puntos Local</th>
                    <th scope="col">Puntos Visitante</th>
                    <th scope="col">Equipo Visitante</th>
                    <th scope="col">Escudo Visitante</th>
                    <th scope="col">Fecha</th>
                </tr>
                </thead>
                <tbody>
                @foreach($games as $game)
                    <tr style="color: white; font-size: large">
                        <th scope="row">{{$game->id}}</th>
                        <td scope="row">

                            @foreach($myteams as $myteam)
                                @if($myteam->id==$game->team_id_1)
                                    <img class="rounded float-letf" width="80px" src="{{asset($url.$myteam->escudo)}}">
                                @endif
                            @endforeach
                        </td>
                        <td scope="row">
                            @foreach($myteams as $myteam)
                                @if($myteam->id==$game->team_id_1)
                                    {{$myteam->nombre}}
                                @endif
                            @endforeach
                        </td>
                        <td scope="row">{{$game->puntosLocal}}</td>
                        <td scope="row">{{$game->puntosVisitante}}</td>
                        <td scope="row">
                            @foreach($myteams as $myteam)
                                @if($myteam->id==$game->team_id_2)
                                    {{$myteam->nombre}}
                                @endif
                            @endforeach
                        </td>
                        <td scope="row">
                            @foreach($myteams as $myteam)
                                @if($myteam->id==$game->team_id_2)
                                    <img class="rounded float-left" width="80px" src="{{asset($url.$myteam->escudo)}}">
                                @endif
                            @endforeach
                        </td>
                        <td scope="row">{{$game->fechaPartido}}</td>

                        @if($admin==true)
                            <td><a href="{{url('game/'.$game->id.'/edit')}}" class="btn btn-warning">Editar</a> </td>


                            <td>
                                <form action="{{url('game/'.$game->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" name="borrar">Borrar</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    @endsection

</x-app-layout>
