<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{

    public function publications(){
        return $this->belongsToMany('App\Publication', 'autor_publication');
    }

    public function user(){
        return $this->hasOne('App\User');
    }
}
