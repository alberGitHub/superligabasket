<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
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
        $games=Game::all();
        return view('game.index')->with('myteams',$myteams)->with('url',$url)->with('admin', $admin)->with('games',$games); //Le paso a la vista ese array de teams con el with

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams=Team::all();
        return view('game.create')->with('myteams',$teams);
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
            'puntosLocal' => 'different:puntosVisitante|nullable',
            'puntosVisitante' => 'different:puntosLocal|nullable',
            'fechaPartido' => 'required|unique:games',
            'equipoLocal' => 'required|different:equipoVisitante',
            'equipoVisitante' => 'required|different:equipoLocal',
        ]);

        $newgame=new Game();
        $newgame->puntosLocal=$request->puntosLocal;
        $newgame->puntosVisitante=$request->puntosVisitante;
        $newgame->fechaPartido=$request->fechaPartido;
        $newgame->team_id_1=$request->equipoLocal;
        $newgame->team_id_2=$request->equipoVisitante;

        $newgame->save();

        return redirect()->route('game.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $game=Game::findOrFail($id);
        $url='storage/img/';
        return view('game.edit')->with('game',$game)->with('url',$url)->with('myteams',$teams);
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
            'puntosLocal' => 'different:puntosVisitante|nullable',
            'puntosVisitante' => 'different:puntosLocal|nullable',
            'fechaPartido' => 'unique:games',
            'equipoLocal' => 'different:equipoVisitante',
            'equipoVisitante' => 'different:equipoLocal',
        ]);

        $newgame=Game::findOrFail($id);
        $newgame->puntosLocal=$request->puntosLocal;
        $newgame->puntosVisitante=$request->puntosVisitante;
        //$newgame->fechaPartido=$request->fechaPartido;
        //$newgame->team_id_1=$request->equipoLocal;
        //$newgame->team_id_2=$request->equipoVisitante;

        $newgame->save();

        return redirect()->route('game.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game=Game::findOrFail($id);
        $game->delete();
        return redirect()->route('game.index');
    }
}
