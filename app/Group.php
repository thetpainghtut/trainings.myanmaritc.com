<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
	use SoftDeletes;
  	protected $fillable = ['name','batch_id'];

  	public function students()
  	{
    	return $this->belongsToMany('App\Student');
  	}

  	public function batch()
  	{
    	return $this->belongsTo('App\Batch');
  	}

  
}
