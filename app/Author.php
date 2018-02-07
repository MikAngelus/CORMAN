<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['first_name','last_name'];
    public function publications(){
        return $this->belongsToMany('App\Publication', 'author_publication');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
