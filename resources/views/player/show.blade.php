<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del jugador') }}
        </h2>
    </x-slot>

    @section('content')
        <div style="background-color: #2d3748; width: 1150px;">
        <h1>{{$myplayer->nombre}}</h1>
        <div class="row">
            <div class="col-sm-4">
                <img class="rounded float-left" width="80%" src="{{asset($url.$myplayer->foto)}}">
            </div>
            <div class="col-8">
                <h2>Dorsal:{{$myplayer->dorsal}}</h2>
                <h2>Nacionalidad:{{$myplayer->Nacionalidad}}</h2>
                <h2>Fecha nacimiento:{{$myplayer->fecha_nac}}</h2>
                <h2>Posición:{{$myplayer->posicion}}</h2>
                <h2>Altura(cm):{{$myplayer->altura}}</h2>
            </div>
        </div>
        </div>


    @endsection

</x-app-layout>
