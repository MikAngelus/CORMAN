<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable = ([
    'id'
    ]);

    public function users(){
        return $this->belongsToMany(
            'App\User',
            'user_group'
        );
    }

    public function topics(){
        return $this->belongsToMany(
            'App\Topic',
            'topic_group'
        );
    }

    public function shares(){
        return $this->hasMany(
            'App\PublicationGroup'
        );
    }
}

