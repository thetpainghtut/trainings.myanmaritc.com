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
	  	return $this->belongsToMany('App\Lesson');
	}

	public function journals()
    {
        return $this->belongsToMany('App\Journal');
    }
}
