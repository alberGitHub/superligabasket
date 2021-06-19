<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'ciudad',
        'year',
        'estadio',
        'escudo',
        'victorias',
        'derrotas',
        'entrenador',
    ];

    public function players(){
        return $this->hasMany(Player::class);  //tiene una relacion de uno a muchos.Mirar en la documentacion
    }

    public function games(){
        return $this->hasMany(Game::class);  //tiene una relacion de uno a muchos.Mirar en la documentacion
    }

    public function games2(){
        return $this->hasMany(Game::class);  //tiene una relacion de uno a muchos.Mirar en la documentacion
    }

}
