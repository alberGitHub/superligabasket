<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actualiza los datos del usuario') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{url('user/'.$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Esto hay que ponerlo en todos los formularios que no sean por GET --}}
            @method('PUT') {{-- se pone porque es put de metodo --}}
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}"  id="name" placeholder="Nombre">
                @error('name')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label for="apell">Apellidos</label>
                <input type="text" class="form-control" name="apell" value="{{$user->apell}}"  id="apell" placeholder="Apellidos">
                @error('apell')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text" class="form-control" name="address" value="{{$user->address}}"  id="address" placeholder="Direccion">
                @error('address')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" disabled="true" name="email" value="{{$user->email}}"  id="email" placeholder="Email">
                @error('email')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror

            </div>


            <button type="submit" class="btn btn-primary">Actualizar</button>



        </form>
    @endsection

</x-app-layout>
