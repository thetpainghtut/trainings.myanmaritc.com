<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title','type','startdate','enddate','time','course_id', 'location_id'
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
        return $this->belongsToMany('App\Student')
                    ->withPivot('receiveno','status')
                    ->withTimestamps()
                    ->orderBy('batch_student.created_at', 'DESC');
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


    public function subjects()
    {
        return $this->belongsToMany('App\Subject')->withTimestamps();
    }

    public function projecttypes()
    {
        return $this->belongsToMany('App\Projecttype');
    }

    public function quizzes()
    {
        return $this->belongsToMany('App\Quizz')->withTimestamps();
    }

}
