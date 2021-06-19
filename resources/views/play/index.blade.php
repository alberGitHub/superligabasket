<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MVPs') }}
        </h2>
    </x-slot>

    @section('content')
        <!--<a href="{{url('comment/index')}}" class="btn btn-primary">Ver todos los comentarios</a>-->
            @if(\Illuminate\Support\Facades\Auth::user())
        <div class="btn btn-light" style="color: white;">
            <x-nav-link :href="route('comment.index')">
                {{ __('Ver todos los comentarios') }}
            </x-nav-link>
        </div>
            @endif
        <div style="background-color: #2d3748; width: 1230px;">
            <table class="table" >
                <thead>
                <tr style="color: white; font-size: large">
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Puntos</th>
                    <th scope="col">Asistencias</th>
                    <th scope="col">Rebotes</th>
                    <th scope="col">Tapones</th>
                    <th scope="col">Fecha del Partido</th>
                </tr>
                </thead>
                <tbody>
                @foreach($plays as $play)
                    <tr style="color: white; font-size: large">
                        <th scope="row">{{$play->id}}</th>
                        <th scope="row">
                            @foreach($players as $player)
                                @if($player->id==$play->player_id)
                            <img class="rounded float-letf" width="80px" src="{{asset($url.$player->foto)}}">
                                @endif
                            @endforeach
                        </th>
                        <td scope="row">
                            @foreach($players as $player)
                                @if($player->id==$play->player_id)
                                    {{$player->nombre}}
                                @endif
                            @endforeach
                        </td>
                        <td scope="row">{{$play->puntos}}</td>
                        <td scope="row">{{$play->asistencias}}</td>
                        <td scope="row">{{$play->rebotes}}</td>
                        <td scope="row">{{$play->tapones}}</td>
                        <td scope="row">
                            @foreach($games as $game)
                                @if($game->id==$play->game_id)
                                    {{$game->fechaPartido}}
                                @endif
                            @endforeach
                        </td>

                        @if(\Illuminate\Support\Facades\Auth::user())
                            <!--<td><a href="{{url('play/'.$play->id)}}" class="btn btn-primary">Comentar</a> </td> -->
                        <td><a href="{{url('comment/'.$play->id.'/create')}}" class="btn btn-primary">Comentar</a> </td>
                        @endif
                        @if($admin==true)
                            <td><a href="{{url('play/'.$play->id.'/edit')}}" class="btn btn-warning">Editar</a> </td> {{-- GET|HEAD  | car/{car}/edit                  | car.edit            | App\Http\Controllers\CarController@edit La ruta url se pone asi porque en route:list sale asi y el {car se refiere al id del cocche} --}}


                            <td>
                                <form action="{{url('player/'.$play->id)}}" method="POST">
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
