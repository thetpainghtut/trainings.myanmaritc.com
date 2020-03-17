<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Unit extends Model
{

  	protected $fillable = [
    	'description', 'course_id'
  	];

	public function students()
	{
	    return $this->belongsToMany('App\Student')
	      ->withTimestamps();	

	  }

  	public function course()
	{
	  	return $this->belongsTo('App\Course');
	}
}
