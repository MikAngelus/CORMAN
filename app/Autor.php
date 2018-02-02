<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{

    public function publications(){
        return $this->belongsTo('App\Publication');
    }
}
