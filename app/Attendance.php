<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable = [
        'date', 'status', 'remark', 'student_id', 'user_id'
    ];

     public function student()
  {
    return $this->belongsTo('App\Student');
  }
}
