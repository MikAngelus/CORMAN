<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    public function publications(){
        return $this->belongsToMany('App\Publication', 'author_publication');
    }

    public function user(){
        return $this->hasOne('App\User');
    }
}
