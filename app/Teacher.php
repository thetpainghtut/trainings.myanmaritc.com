<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

     protected $fillable = [
        'degree', 'staff_id', 'course_id'
    ];

    public function staff()
    {
    	return $this->belongsTo("App\Staff");
    }

    // public function user()
    // {
    // 	return $this->hasOneThrough("App\User","App\Staff");
    // }

    public function course()
    {
    	return $this->belongsTo("App\Course");
    }

    public function batches()
    {
        return $this->belongsToMany('App\Batch');
    }

    public function schedules()
    {
        return $this->belongsToMany('App\Schedule');
    }
}
