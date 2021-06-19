<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del equipo') }}
        </h2>
    </x-slot>

    @section('content')
        <h1>{{$myteam->nombre}}</h1>
        <div class="row">
            <div class="col-sm-4">
                <img class="rounded float-left" width="80%" src="{{asset($url.$myteam->escudo)}}">
            </div>
            <div class="col-8">
                <h2>Ciudad:{{$myteam->ciudad}}</h2>
                <h2>Estadio:{{$myteam->estadio}}</h2>
                <h2>Año fundación:{{$myteam->year}}</h2>
                <h2>Entrenador:{{$myteam->entrenador}}</h2>
                <h2>Victorias:{{$myteam->victorias}}</h2>
                <h2>Derrotas:{{$myteam->derrotas}}</h2>
            </div>
        </div>


    @endsection

</x-app-layout>
