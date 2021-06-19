<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClasificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $url='storage/img/';
        $myteams=Team::all();
        $myteams2 = Team::orderBy('victorias', 'DESC')->get();



        foreach ($myteams2 as $myteam){

            $victoriasLocal = DB::select('select count(*) as victorias from games 
            where team_id_1 =? and puntosLocal > puntosVisitante', array($myteam->id));

            $victoriasVisitante = DB::select('select count(*) as victorias from games 
            where team_id_2 =? and puntosLocal < puntosVisitante', array($myteam->id));

            $derrotasLocal = DB::select('select count(*) as derrotas from games 
            where team_id_1 =? and puntosLocal < puntosVisitante', array($myteam->id));

            $derrotasVisitante = DB::select('select count(*) as derrotas from games 
            where team_id_2 =? and puntosLocal > puntosVisitante', array($myteam->id));

            $myteam->victoriasCount = $victoriasLocal[0]->victorias + $victoriasVisitante[0]->victorias;
            $myteam->derrotasCount = $derrotasLocal[0]->derrotas + $derrotasVisitante[0]->derrotas;
            //var_dump($myteam->nombre." ".$victoriasVisitante[0]->victorias);
            //var_dump($victoriasLocal[0]->victorias);
            //echo "<br><br><br>";
        }


        //exit();

        //$myteams=$user->teams()->get(); //Del modelo User llamamos al metodo teams que creamos para recuperar los teams de ese usuario
        //$mycars=$user->cars()->where('color','blanco')->get(); //Asi se seria para recoger los que son de color blanco
        return view('clasificacion.index')->with('myteams2',$myteams2)->with('url',$url); //Le paso a la vista ese array de teams con el with

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
