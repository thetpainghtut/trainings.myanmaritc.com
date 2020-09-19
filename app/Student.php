<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
  use SoftDeletes;
  
    protected $fillable = ['inquire_no','namee','namem','email','phone','address','degree','city','accepted_year','dob','gender','batch_id','p1','p1_phone','p1_relationship','p2','p2_phone','p2_relationship','because', 'status', 'batch_id','township_id', 'user_id'];

    public function batch()
    {
        return $this->belongsTo('App\Batch');
    }

    public function township()
    {
        return $this->belongsTo('App\Township');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group');
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

    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }

    public function feedback()
    {
        return $this->hasOne('App\Feedback');
    }
}
