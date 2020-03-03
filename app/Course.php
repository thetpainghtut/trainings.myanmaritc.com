<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  	use SoftDeletes;

  	protected $fillable=['name','code_no','location_id','logo','outline','fees','during','duration'];

  	public function batches()
  	{
    	return $this->hasMany('App\Batch');
  	}

    public function location()
    {
      return $this->belongsTo('App\Location');
    }

  	public function course()
  	{
    	return $this->hasMany('App\Course');
  	}
}
