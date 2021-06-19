<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::find(Auth::id());
        $admin=false;
        if($user){
            if ($user->hasRole('admin')==true){
                $admin = true;
            }
        }

        $url='storage/img/';
        $myteams=Team::all();
        //$myteams=$user->teams()->get(); //Del modelo User llamamos al metodo teams que creamos para recuperar los teams de ese usuario
        //$mycars=$user->cars()->where('color','blanco')->get(); //Asi se seria para recoger los que son de color blanco
        return view('team.index')->with('myteams',$myteams)->with('url',$url)->with('admin', $admin); //Le paso a la vista ese array de teams con el with

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abort('404'); //Asi se lanza un error, aunque no se produzca.Lo redirigimos a las vistas de errores(resources/views/errors)(Creado con comando) y personalizamos como queramos
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'year' => 'required|',
            'estadio' => 'required',
            'escudo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'victorias' => 'required',
            'derrotas' => 'required',
            'entrenador' => 'required',
        ]);

        $newteam=new Team();
        $newteam->nombre=$request->nombre;
        $newteam->ciudad=$request->ciudad;
        $newteam->year=$request->year;
        $newteam->estadio=$request->estadio;
        $nombreEscudo=time().'_'.$request->file('escudo')->getClientOriginalName();
        $newteam->escudo=$nombreEscudo;
        $newteam->victorias=$request->victorias;
        $newteam->derrotas=$request->derrotas;
        $newteam->entrenador=$request->entrenador;

        $newteam->save();

        $request->file('escudo')->storeAs('public/img', $nombreEscudo);   //storeAs es para guardarlo en, y la ruta que queramos
        //return view('car.index'); //Asi era antes de añadir otro coche que daba error y en vez de vista redirigimos a la ruta
        return redirect()->route('team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $myteam=Team::findOrFail($id);
        $url='storage/img/';
        return view('team.show')->with('myteam',$myteam)->with('url',$url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $myteam=Team::findOrFail($id);
        $url='storage/img/';
        return view('team.edit')->with('myteam',$myteam)->with('url',$url);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate=$request->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'year' => 'required',
            'estadio' => 'required',
            'escudo' => 'image|mimes:jpeg,png,jpg,gif',
            'victorias' => 'required',
            'derrotas' => 'required',
            'entrenador' => 'required',
        ]);

        $newteam=Team::findOrFail($id);
        $newteam->nombre=$request->nombre;
        $newteam->ciudad=$request->ciudad;
        $newteam->year=$request->year;
        $newteam->estadio=$request->estadio;


        if (is_uploaded_file($request->escudo)){  //Esto solo si el usuario actualiza la foto
            $nombreEscudo=time().'_'.$request->file('escudo')->getClientOriginalName();
            $newteam->escudo=$nombreEscudo;
            $request->file('escudo')->storeAs('public/img', $nombreEscudo);
        }

        $newteam->victorias=$request->victorias;
        $newteam->derrotas=$request->derrotas;
        $newteam->entrenador=$request->entrenador;

        $newteam->save();

        return redirect()->route('team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $myteam=Team::findOrFail($id);
        $myteam->delete();
        return redirect()->route('team.index');
    }
}
