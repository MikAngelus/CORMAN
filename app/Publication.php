<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    //
    protected $fillable = ([
        'title'
    ]);

    public function users(){
        return $this->belongsToMany('App\User','user_publication');
    }

    public function topics(){
        return $this->belongsToMany('App\Topic','topic_publication');
    }

    public function journal(){
        return $this->$this->hasOne('App\Journal');
    }

    public function conference(){
        return $this->$this->hasOne('App\Conference');
    }

    public function editorship(){
        return $this->$this->hasOne('App\Editorship');
    }

    public function details(){
        /*
            Since we must join the publications table with one of the
            journals/conference/editorship table (based on type column' value)
            to retrieve publication'details,  we "aggregate" the 3 alternatives in this method.

            this method is useful for retrieving from db, 
            for insertions, the 3 methods above ( journal(),conference(),editorship())
            should be used
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

    public function authors(){
        return $this->belongsToMany('App\Author', 'author_publication');
    }

    public function shares(){
        return $this->hasMany('App\PublicationGroup');
    }
}
