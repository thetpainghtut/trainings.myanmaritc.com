<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = ['score','status','student_id','quiz_id'];

    public function responsedetail($value='')
    {
    	return $this->hasMany('App\Responsedetail');
    }

    public function quiz($value='')
    {
    	return $this->belongsTo('App\Quizz','quiz_id');
    }
}
