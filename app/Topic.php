<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    public function users(){
        return $this->belongsToMany('App\User','user_topic');
    }
    
    public function pubblications(){
        return $this->belongsToMany('App\Pubblication','topic_pubblication');
    }

    public function groups(){
        return $this->belongsToMany('App\Group','topic_group');
    }

}
