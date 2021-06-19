<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comentarios') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="btn btn-light" style="color: white;">
            <x-nav-link :href="route('play.index')">
                {{ __('MVPs') }}
            </x-nav-link>
        </div>
        <div style="background-color: #2d3748; width: 1230px;">
            <table class="table" >
                <thead>
                <tr style="color: white; font-size: large">
                    <th scope="col">#</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Jugador valorado</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Valoración</th>
                    <th scope="col">Fecha del partido</th>

                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr style="color: white; font-size: large">
                        <th scope="row">{{$comment->id}}</th>
                        <td scope="row">
                            @foreach($users as $user)
                                @if($user->id==$comment->user_id)
                                    {{$user->name}}
                                @endif
                            @endforeach
                        </td>
                        <td scope="row">
                            @foreach($plays as $play)
                                @foreach($players as $player)
                                    @if($play->id==$comment->play_id)
                                        @if($player->id==$play->player_id)
                                            {{$player->nombre}}
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </td>
                        <td scope="row">{{$comment->comentario}}</td>
                        <td scope="row">{{$comment->valoracion}}</td>
                        <td scope="row">
                            @foreach($plays as $play)
                                @foreach($games as $game)
                                    @if($play->id==$comment->play_id)
                                        @if($game->id==$play->game_id)
                                            {{$game->fechaPartido}}
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </td>

                        @if($comment->user_id==\Illuminate\Support\Facades\Auth::user()->id || $admin==true)
                            <td><a href="{{url('comment/'.$comment->id.'/edit')}}" class="btn btn-warning">Editar</a> </td> {{-- GET|HEAD  | car/{car}/edit                  | car.edit            | App\Http\Controllers\CarController@edit La ruta url se pone asi porque en route:list sale asi y el {car se refiere al id del cocche} --}}


                            <td>
                                <form action="{{url('comment/'.$comment->id)}}" method="POST">
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
