<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Game;
use App\Models\Play;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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
        $users=User::all();
        $comments=Comment::all();
        return view('comment.index')->with('myteams',$myteams)->with('url',$url)
            ->with('admin', $admin)->with('games',$games)->with('plays',$plays)
            ->with('players',$players)->with('users',$users)->with('comments',$comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($play_id = null)
    {
        $teams=Team::all();
        $games=Game::all();
        $players=Player::all();
        $plays=Play::all();
        $users=User::all();
        $play_id;
        return view('comment.create')->with('myteams',$teams)->with('games',$games)
            ->with('players',$players)->with('plays',$plays)->with('users',$users)->with('play_id',$play_id);
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
            'comentario' => 'required',
            'valoracion' => 'required',
        ]);

        $newcomment=new Comment();
        $newcomment->comentario=$request->comentario;
        $newcomment->valoracion=$request->valoracion;
        $newcomment->user_id=Auth::user()->id;
        $newcomment->play_id=$request->play_id;

        $newcomment->save();

        return redirect()->route('comment.index');
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
        $comment=Comment::findOrFail($id);
        $games=Game::all();
        $players=Player::all();
        $plays=Play::all();
        $users=User::all();
        $url='storage/img/';
        return view('comment.edit')->with('comment',$comment)->with('url',$url)->with('myteams',$teams)
            ->with('games',$games)->with('players',$players)->with('plays',$plays)->with('users',$users);
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
            'comentario' => 'required',
            'valoracion' => 'required',
        ]);

        $newcomment=Comment::findOrFail($id);
        $newcomment->comentario=$request->comentario;
        $newcomment->valoracion=$request->valoracion;

        $newcomment->save();

        return redirect()->route('comment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('comment.index');
    }
}
