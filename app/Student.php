<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
  use SoftDeletes;
  
  protected $fillable = ['inquire_no','namee','namem','email','phone','address','education','city','accepted_year','dob','gender','batch_id','p1','p1_phone','p1_relationship','p2','p2_phone','p2_relationship','because','education_id'];

  public function subjects()
  {
    return $this->belongsToMany('App\Subject')->withTimestamps();
  }

  public function batch()
  {
    return $this->belongsTo('App\Batch');
  }

  public function education()
  {
    return $this->belongsTo('App\Edcation');
  }

  public function groups()
  {
    return $this->belongsToMany('App\Group')->withTimestamps();
  }

  public function units()
  {
    return $this->belongsToMany('App\Unit')
                ->withPivot('symbol')
                ->withTimestamps();
  }

  public function attendance()
  {
    return $this->hasMany('App\Attendance');
  }
}
