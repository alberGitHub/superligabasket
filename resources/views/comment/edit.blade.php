<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actualiza los datos del comentario') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{url('comment/'.$comment->id)}}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Esto hay que ponerlo en todos los formularios que no sean por GET --}}
            @method('PUT') {{-- se pone porque es put de metodo --}}
            <div class="form-group">
                <label for="comentario">Comentario</label>
                <textarea class="form-control" rows="4" cols="40" name="comentario"  id="comentario">{{$comment->comentario}}</textarea>
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


            <button type="submit" class="btn btn-primary">Actualizar</button>


        </form>
    @endsection

</x-app-layout>
