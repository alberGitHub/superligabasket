<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Game extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'puntosLocal',
        'puntosVisitante',
        'fechaPartido',
    ];

    public function plays(){
        return $this->hasMany(Play::class);  //tiene una relacion de uno a muchos.Mirar en la documentacion
    }

    public function own(){
        return $this->belongsTo(Team::class); //One To Many (Inverse) / Belongs To, cogemos esto de la documentacion
    }

    public function own2(){
        return $this->belongsTo(Team::class); //One To Many (Inverse) / Belongs To, cogemos esto de la documentacion
    }

}
