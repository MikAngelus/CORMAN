<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationGroup extends Model
{

    protected $fillable = [
        'publication_id','user_id', 'group_id'
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function groups(){
        return $this->belongsTo('App\Group');
    }

    public function publications(){
        return $this->belongsTo('App\Publication');
    }
/*
    public function shares(){
        return $this->hasManyThrough();
    }
*/
}
