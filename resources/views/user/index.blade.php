<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    @section('content')
        <h3 style="font-weight: bold">USUARIOS</h3>
        <a href="{{url('user/create')}}" class="btn btn-primary">Añadir usuario</a>
        <div style="background-color: #2d3748; width: 1150px;">
        <table class="table">
            <thead>
            <tr style="color: white; font-size: large">
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Direccion</th>
                <th scope="col">Dni</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr style="color: white; font-size: large">
                    <th scope="row">{{$user->id}}</th>
                    <td scope="row">{{$user->name}}</td>
                    <td scope="row">{{$user->apell}}</td>
                    <td scope="row">{{$user->address}}</td>
                    <td scope="row">{{$user->dni}}</td>
                    <td scope="row">{{$user->email}}</td>

                    <td><a href="{{url('user/'.$user->id.'/edit')}}" class="btn btn-warning">Editar</a> </td> {{-- GET|HEAD  | car/{car}/edit                  | car.edit            | App\Http\Controllers\CarController@edit La ruta url se pone asi porque en route:list sale asi y el {car se refiere al id del cocche} --}}


                    <td>
                        <form action="{{url('user/'.$user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" name="borrar">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        </div>
    @endsection

</x-app-layout>
