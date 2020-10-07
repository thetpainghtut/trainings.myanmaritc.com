<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{
	protected $table = 'quizzes';
    protected $fillable = ['title','photo','subject_id','user_id'];

    public function batches()
    {
        return $this->belongsToMany('App\Batch')->withTimestamps();
    }

    public function subjects()
    {
    	return $this->belongTo('App\Subject');
    }
}
