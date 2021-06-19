<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'dorsal',
        'nacionalidad',
        'fecha_nac',
        'posicion',
        'altura',
        'foto',
    ];

    public function own(){
        return $this->belongsTo(Team::class); //One To Many (Inverse) / Belongs To, cogemos esto de la documentacion
    }
}
