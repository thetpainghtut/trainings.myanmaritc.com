<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['questiontext','photo','type','timer','quiz_id','user_id',];

    public function checks($value='')
    {
    	return $this->hasMany('App\Check');
    }

    public function quiz($value='')
    {
    	return $this->belongsTo('App\Quizz');
    }
}
