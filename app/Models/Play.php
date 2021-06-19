<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Play extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'puntos',
        'asistencias',
        'rebotes',
        'tapones',
    ];


    public function comments(){
        return $this->hasMany(Comment::class);  //tiene una relacion de uno a muchos.Mirar en la documentacion
    }

    public function own(){
        return $this->belongsTo(Player::class); //One To Many (Inverse) / Belongs To, cogemos esto de la documentacion
    }

    public function ownGame(){
        return $this->belongsTo(Game::class); //One To Many (Inverse) / Belongs To, cogemos esto de la documentacion
    }

}
