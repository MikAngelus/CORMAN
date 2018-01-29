<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pubblications(){
        return $this->belongsToMany('App\Pubblication','user_pubblication');
    }

    public function topics(){
        return $this->belongsToMany('App\Topic','user_topic');
    }

    public function groups(){
        return $this->belongsToMany('App\Group','user_group');
    }

    public function affiliation(){
        return $this->belongsTo('App\Affiliation');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }
}
