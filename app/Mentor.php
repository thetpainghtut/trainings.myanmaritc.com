<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mentor extends Model
{
    use SoftDeletes;
    
    protected $fillable=['degree','portfolio','staff_id','course_id'];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function staff()
    {
        return $this->belongsTo('App\Staff');;
    }

    public function batches()
    {
        return $this->belongsToMany('App\Batch');
    }
}
