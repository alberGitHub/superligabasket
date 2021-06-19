<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clasificacion') }}
        </h2>
    </x-slot>

    @section('content')

        <div  style="background-color: #2d3748; width: 700px; margin-left: 250px;">
            <table class="table">
                <thead>
                <tr style="color: white; font-size: large">
                    <th scope="col">Puesto</th>

                    <th scope="col">Escudo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Victorias</th>
                    <th scope="col">Derrotas</th>
                </tr>
                </thead>
                <tbody>
                <?php $puesto=1; ?>
                @foreach($myteams2 as $myteam)


                    <tr style="color: white; font-size: large">
                        <td scope="row" style="text-align: center">{{$puesto++}}º</td>
                        <th scope="row"><img class="rounded" width="80px" src="{{asset($url.$myteam->escudo)}}"></th>
                        <td scope="row" style="text-align: center">{{$myteam->nombre}}</td>
                        <td scope="row" style="text-align: center">{{$myteam->victoriasCount}}</td>
                        <td scope="row" style="text-align: center">{{$myteam->derrotasCount}}</td>

                    </tr>
                @endforeach


                </tbody>

            </table>
        </div>
    @endsection

</x-app-layout>
