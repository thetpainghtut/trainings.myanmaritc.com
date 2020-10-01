<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
	use SoftDeletes;

	protected $fillable = ['name','logo','status'];

	public function courses()
	{
	  	return $this->belongsToMany('App\Course');
	}

	public function students()
	{
	  	return $this->belongsToMany('App\Student');
	}

	public function lessons()
	{
	  	return $this->hasMany('App\Lesson');
	}

	public function journals()
    {
        return $this->belongsToMany('App\Journal');
    }
<<<<<<< HEAD
=======

    public function batches()
    {
    	return $this->belongsToMany('App\Batch');
    }
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
}
