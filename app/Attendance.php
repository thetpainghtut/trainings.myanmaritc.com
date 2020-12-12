<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable = [
        'date', 'status', 'remark', 'student_id', 'user_id', 'schedule_id'
    ];

    public function student()
  	{
    	return $this->belongsTo('App\Student');
  	}

  	public function user()
  	{
    	return $this->belongsTo('App\User');
  	}

    public function schedule()
    {
      return $this->belongsTo('App\Schedule');
    }
}
