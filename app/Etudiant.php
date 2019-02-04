<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    //
    protected $fillable = [
        'nom', 'prenom', 'genre', 'telephone', 'email', 'photo', 'niveau_id',
    ];

    public function niveau(){
        return $this->belongsTo(\App\Niveau::class,'niveau_id','id');
    }


}
