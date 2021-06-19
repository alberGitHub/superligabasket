<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Equipos') }}
        </h2>
    </x-slot>

    @section('content')
        <div style="background-color: #2d3748; width: 1150px;">
        <table class="table">
            <thead>
            <tr style="color: white; font-size: large">
                <th scope="col">#</th>
                <th scope="col">Escudo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Estadio</th>
                <th scope="col">Entrenador</th>
                <th scope="col">Victorias</th>
                <th scope="col">Derrotas</th>
            </tr>
            </thead>
            <tbody>
            @foreach($myteams as $myteam)
                <tr style="color: white; font-size: large">
                    <th scope="row">{{$myteam->id}}</th>
                    <th scope="row"><img class="rounded float-letf" width="100px" src="{{asset($url.$myteam->escudo)}}"></th>
                    <td scope="row">{{$myteam->nombre}}</td>
                    <td scope="row">{{$myteam->ciudad}}</td>
                    <td scope="row">{{$myteam->estadio}}</td>
                    <td scope="row">{{$myteam->entrenador}}</td>
                    <td scope="row">{{$myteam->victorias}}</td>
                    <td scope="row">{{$myteam->derrotas}}</td>

                    @if($admin==true)
                        <!--
                        <td><a href="{{url('team/'.$myteam->id)}}" class="btn btn-primary">Detalle</a> </td> {{--Se ponen asi los botones porque son por el metodo get, en cambio para el de borrar no podria ser asi porque es con el metodo DELETE --}}
                        -->
                        <td><a href="{{url('team/'.$myteam->id.'/edit')}}" class="btn btn-warning">Editar</a> </td> {{-- GET|HEAD  | car/{car}/edit                  | car.edit            | App\Http\Controllers\CarController@edit La ruta url se pone asi porque en route:list sale asi y el {car se refiere al id del cocche} --}}


                        <td>
                            <form action="{{url('team/'.$myteam->id)}}" method="POST">
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

