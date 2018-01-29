<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorship extends Model
{
    protected $primaryKey='pubblication_id';
    
    public function pubblication(){
        return $this->belongsTo('App\Pubblication');
    }
}
