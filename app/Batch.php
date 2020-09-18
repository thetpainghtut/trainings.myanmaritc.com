<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title','startdate','enddate','time','course_id', 'location_id'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function inquires()
    {
        return $this->hasMany('App\Inquire');
    }


    public function teachers()
    {
        return $this->belongsToMany('App\Teacher');
    }

    public function mentors()
    {
        return $this->belongsToMany('App\Mentor');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

     public function groups()
    {
        return $this->hasMany('App\Group');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }
}
