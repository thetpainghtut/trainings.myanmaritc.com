<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['title','date_event','time_event','type', 'color', 'user_id', 'batch_id', 'subject_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function batch()
    {
    	return $this->belongsTo('App\Batch');
    }

    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function attendances($value='')
    {
        return $this->hasMany('App\Attendance');
    }

}
