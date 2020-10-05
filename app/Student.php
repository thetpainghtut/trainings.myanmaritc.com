<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
  use SoftDeletes;
  
    protected $fillable = ['photo','namee','namem','email','phone','address','degree','city','accepted_year','dob','gender','p1','p1_phone','p1_relationship','p2','p2_phone','p2_relationship','because', 'status','township_id', 'user_id'];

    public function batches()
    {
        return $this->belongsToMany('App\Batch')
                    ->withPivot('receiveno','status')
                    ->withTimestamps()
                    ->orderBy('batch_student.created_at', 'DESC');
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

    public function inquire()
    {
        return $this->belongsTo('App\Inquire', 'inquireno');
    }

    public function lessons()
    {
        return $this->belongsToMany('App\Lesson')->withPivot('status')->withTimestamps();

    }
}
