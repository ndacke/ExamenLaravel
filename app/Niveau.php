<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    //
    protected $fillable = ['libelle'];

    public function etudiants(){
        return $this->hasMany(\App\Etudiant::class,'niveau_id','id');
    }

}
