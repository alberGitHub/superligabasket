<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'comentario',
        'valoracion',
    ];


    public function own(){
        return $this->belongsTo(User::class); //One To Many (Inverse) / Belongs To, cogemos esto de la documentacion
    }

    public function ownPlay(){
        return $this->belongsTo(Play::class); //One To Many (Inverse) / Belongs To, cogemos esto de la documentacion
    }

}
