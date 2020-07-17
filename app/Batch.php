<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
      use SoftDeletes;

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


  public function teachers()
  {
    return $this->belongsToMany('App\Teacher')->withTimestamps();
  }

  public function mentors()
  {
    return $this->belongsToMany('App\Mentor')->withTimestamps();
  }

  public function students()
  {
    return $this->hasMany('App\Student');
  }


}
