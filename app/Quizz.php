<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{
	protected $table = 'quizzes';
    protected $fillable = ['title','photo','subject_id','user_id'];

    public function batches()
    {
        return $this->belongsToMany('App\Batch','batch_quiz','quiz_id')->withTimestamps();
    }

    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }

    public function questions($value='')
    {
        return $this->hasMany('App\Question','quiz_id');
    }

    public function user($value='')
    {
        return $this->belongsTo('App\User');
    }

    public function response($value='')
    {
        return $this->hasOne('App\Response','quiz_id');
       
    }
}
