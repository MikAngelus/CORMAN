<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    //
    protected $fillable = ([
        'id'
    ]);

    public function users(){
        return $this->belongsToMany('App\User','user_publication');
    }

    public function topics(){
        return $this->belongsToMany('App\Topic','topic_publication');
    }

    public function details(){
        /*
            Since we must join the publications table with one of the
            journals/conference/editorship table (based on type column' value)
            to retrieve publication'details,  we "aggregate" the 3 alternatives in this method.
        */
        switch ($this->type){
            case 'journal':
                return $this->hasOne('App\Journal');
                break;

            case 'conference':
                return $this->hasOne('App\Conference');
                break;

            case 'editorship':
                return $this->hasOne('App\Editorship');
                break;

        }
    }
}
