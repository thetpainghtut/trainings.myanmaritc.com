<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
     protected $fillable = [
        'staff_id','course_id','degree'
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
}
