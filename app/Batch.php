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

  public function teachers()
  {
    return $this->belongsToMany('App\Teacher')->withPivot('mentor_id')->withTimestamps();
  }


}
