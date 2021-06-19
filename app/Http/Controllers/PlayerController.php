<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=User::find(Auth::id());

        //$myteams=$user->teams()->get();

        $admin=false;
        if($user){
            if ($user->hasRole('admin')==true){
                $admin = true;
            }
        }

        $teams=Team::all();
        $url='storage/img/';
        $myplayers = [];
        foreach ($teams as $team){
            $teamsPlayer=$team->players()->get();
            foreach ($teamsPlayer as $player){
                array_push($myplayers, $player);
            }
        }
        //$myplayers=$team->players()->get(); //Del modelo User llamamos al metodo teams que creamos para recuperar los teams de ese usuario
        //$mycars=$user->cars()->where('color','blanco')->get(); //Asi se seria para recoger los que son de color blanco
        return view('player.index')->with('myplayers',$myplayers)->with('url',$url)->with('admin',$admin)->with('myteams',$teams); //Le paso a la vista ese array de teams con el with

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams=Team::all();
        return view('player.create')->with('myteams',$teams);
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
            'dorsal' => 'required',
            'nacionalidad' => 'required',
            'fecha_nac' => 'required',
            'posicion' => 'required',
            'equipo' => 'required',
            'altura' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $newplayer=new Player();
        $newplayer->nombre=$request->nombre;
        $newplayer->dorsal=$request->dorsal;
        $newplayer->nacionalidad=$request->nacionalidad;
        $newplayer->fecha_nac=$request->fecha_nac;
        $newplayer->posicion=$request->posicion;
        $newplayer->team_id=$request->equipo;
        $nombreFoto=time().'_'.$request->file('foto')->getClientOriginalName();
        $newplayer->foto=$nombreFoto;
        $newplayer->altura=$request->altura;

        $newplayer->save();

        $request->file('foto')->storeAs('public/img', $nombreFoto);   //storeAs es para guardarlo en, y la ruta que queramos
        //return view('car.index'); //Asi era antes de añadir otro coche que daba error y en vez de vista redirigimos a la ruta
        return redirect()->route('player.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $myplayer=Player::findOrFail($id);
        $url='storage/img/';
        return view('player.show')->with('myplayer',$myplayer)->with('url',$url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams=Team::all();
        $myplayer=Player::findOrFail($id);
        $url='storage/img/';
        return view('player.edit')->with('myplayer',$myplayer)->with('url',$url)->with('myteams',$teams);
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
            'dorsal' => 'required',
            'nacionalidad' => 'required',
            'fecha_nac' => 'required',
            'posicion' => 'required',
            'equipo' => 'required',
            'altura' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $newplayer=Player::findOrFail($id);
        $newplayer->nombre=$request->nombre;
        $newplayer->dorsal=$request->dorsal;
        $newplayer->nacionalidad=$request->nacionalidad;
        $newplayer->fecha_nac=$request->fecha_nac;
        $newplayer->posicion=$request->posicion;
        $newplayer->team_id=$request->equipo;

        if (is_uploaded_file($request->foto)){  //Esto solo si el usuario actualiza la foto
            $nombreFoto=time().'_'.$request->file('foto')->getClientOriginalName();
            $newplayer->foto=$nombreFoto;
            $request->file('foto')->storeAs('public/img', $nombreFoto);
        }

        $newplayer->altura=$request->altura;

        $newplayer->save();

        return redirect()->route('player.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $myplayer=Player::findOrFail($id);
        $myplayer->delete();
        return redirect()->route('player.index');
    }
}
