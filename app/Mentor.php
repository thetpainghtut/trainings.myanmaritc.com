<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
  protected $fillable=['staff_id','course_id','degree','portfolio'];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

   public function course()
  {
    return $this->belongsTo('App\Course');
  }

  public function staff()
  {
	return $this->belongsTo('App\Staff');;
  }

}
