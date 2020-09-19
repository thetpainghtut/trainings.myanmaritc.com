<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Unit extends Model
{
	use SoftDeletes;

  	protected $fillable = [
    	'description', 'course_id'
  	];

	public function students()
	{
	    return $this->belongsToMany('App\Student');	

	}

  	public function course()
	{
	  	return $this->belongsTo('App\Course');
	}
}
