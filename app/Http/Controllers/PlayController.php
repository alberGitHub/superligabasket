<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Play;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayController extends Controller
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
        $players=Player::all();
        $plays=Play::all();
        return view('play.index')->with('myteams',$myteams)->with('url',$url)
            ->with('admin', $admin)->with('games',$games)->with('plays',$plays)
            ->with('players',$players);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams=Team::all();
        $games=Game::all();
        $players=Player::all();
        return view('play.create')->with('myteams',$teams)->with('games',$games)
            ->with('players',$players);
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
            'puntos' => 'required',
            'asistencias' => 'required',
            'rebotes' => 'required',
            'tapones' => 'required',
            'jugador' => 'required',
            'game_id' => 'required|unique:plays',
        ]);

        $newplay=new Play();
        $newplay->puntos=$request->puntos;
        $newplay->asistencias=$request->asistencias;
        $newplay->rebotes=$request->rebotes;
        $newplay->tapones=$request->tapones;
        $newplay->player_id=$request->jugador;
        $newplay->game_id=$request->game_id;

        $newplay->save();

        return redirect()->route('play.index');
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
        $play=Play::findOrFail($id);
        $games=Game::all();
        $players=Player::all();
        $url='storage/img/';
        return view('play.edit')->with('play',$play)->with('url',$url)->with('myteams',$teams)
            ->with('games',$games)->with('players',$players);
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
            'puntos' => 'required',
            'asistencias' => 'required',
            'rebotes' => 'required',
            'tapones' => 'required',
            //'jugador' => 'required',
            //'partido' => 'required|unique:plays',
        ]);

        $newplay=Play::findOrFail($id);
        $newplay->puntos=$request->puntos;
        $newplay->asistencias=$request->asistencias;
        $newplay->rebotes=$request->rebotes;
        $newplay->tapones=$request->tapones;
        //$newplay->player_id=$request->jugador;
        //$newplay->game_id=$request->partido;

        $newplay->save();

        return redirect()->route('play.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $play=Play::findOrFail($id);
        $play->delete();
        return redirect()->route('play.index');
    }
}
