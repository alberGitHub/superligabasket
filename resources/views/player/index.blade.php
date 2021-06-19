<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jugadores') }}
        </h2>
    </x-slot>

    @section('content')
        <input type="text" id="myInput" style="color: black;" onkeyup="myFunction()" placeholder="Buscar por equipo">
        <input type="text" id="myInput2" style="color: black;" onkeyup="myFunction2()" placeholder="Buscar por nombre">

        <div style="background-color: #2d3748; width: 1230px;">
        <table class="table" id="myTable" >
            <thead>
            <tr style="color: white; font-size: large">
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Dorsal</th>
                <th scope="col">Nacionalidad</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Posición</th>
                <th scope="col">Equipo</th>
                <th scope="col">Altura(cm)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($myplayers as $myplayer)
                <tr style="color: white; font-size: large">
                    <td scope="row">{{$myplayer->id}}</td>
                    <td scope="row"><img class="rounded float-letf" width="120px" src="{{asset($url.$myplayer->foto)}}"></td>
                    <td scope="row">{{$myplayer->nombre}}</td>
                    <td scope="row">{{$myplayer->dorsal}}</td>
                    <td scope="row">{{$myplayer->nacionalidad}}</td>
                    <td scope="row">{{$myplayer->fecha_nac}}</td>
                    <td scope="row">{{$myplayer->posicion}}</td>
                    <td scope="row">
                        @foreach($myteams as $myteam)
                            @if($myteam->id==$myplayer->team_id)
                                {{$myteam->nombre}}
                            @endif
                        @endforeach
                    </td>
                    <td scope="row">{{$myplayer->altura}}</td>
                    <!--
                    <td><a href="{{url('player/'.$myplayer->id)}}" class="btn btn-primary">Detalle</a> </td> {{--Se ponen asi los botones porque son por el metodo get, en cambio para el de borrar no podria ser asi porque es con el metodo DELETE --}}
                    -->
                    @if($admin==true)
                    <td><a href="{{url('player/'.$myplayer->id.'/edit')}}" class="btn btn-warning">Editar</a> </td> {{-- GET|HEAD  | car/{car}/edit                  | car.edit            | App\Http\Controllers\CarController@edit La ruta url se pone asi porque en route:list sale asi y el {car se refiere al id del cocche} --}}


                    <td>
                        <form action="{{url('player/'.$myplayer->id)}}" method="POST">
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
