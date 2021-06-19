<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añade un nuevo usuario') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
            @csrf {{-- Esto hay que ponerlo en todos los formularios que no sean por GET --}}
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name"  id="name" placeholder="Nombre">
                @error('name')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="apell">Apellidos</label>
                <input type="text" class="form-control" name="apell"  id="apell" placeholder="Apellidos">
                @error('apell')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" class="form-control" name="address"  id="address" placeholder="Dirección">
                @error('address')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" class="form-control" name="dni"  id="dni" placeholder="DNI">
                @error('dni')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email"  id="email" placeholder="Email">
                @error('email')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" required autocomplete="new-password" name="password"  id="password" placeholder="Password">
                @error('password')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Password confirmation</label>
                <input type="password" class="form-control" required name="password_confirmation"  id="password_confirmation" placeholder="Password confirmation">
                @error('password_confirmation')
                <small style="color: red">*{{$message}}</small>
                <br>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary">Guardar</button>


        </form>
    @endsection

</x-app-layout>

