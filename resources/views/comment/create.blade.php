<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Haga su comentario y valoración') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{route('comment.store')}}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Esto hay que ponerlo en todos los formularios que no sean por GET --}}
            <div class="form-group">
                <label for="comentario">Comentario</label>
                <textarea class="form-control" rows="4" cols="40" name="comentario"  id="comentario" placeholder="Escriba su comentario"></textarea>
                @error('comentario')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="valoracion">Valoracion</label>
                <select name="valoracion" id="valoracion" style="color: black;">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                @error('valoracion')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <!--
            <div class="form-group">
                <label for="mvp">MVP</label>
                <select class="form-control" name="mvp" id="mvp">
                    <option value="">Selecciona el id del mvp</option>
                    @foreach($plays as $play)
                        <option value="{{$play->id}}">{{$play->game_id}}</option>
                    @endforeach
                </select>
                @error('mvp')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            -->
            <input type="hidden" name="play_id" id="play_id" value="{{$play_id}}">

            <button type="submit" class="btn btn-primary">Guardar</button>

        </form>
    @endsection

</x-app-layout>