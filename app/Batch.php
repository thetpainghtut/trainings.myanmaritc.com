<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
  protected $fillable = [
      'title','startdate','enddate','time','course_id'
    ];

  public function course()
  {
    return $this->belongsTo('App\Course');
  }

  public function inquires()
  {
  	return $this->hasMany('App\Inquire');
  }

}
