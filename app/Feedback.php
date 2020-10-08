<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use SoftDeletes;
     protected $table = 'feedbacks';
    protected $fillable = [
        'trouble','benefit','teaching','mentoring','favourite', 'speed', 'maintain', 'quote', 'recommend', 'stars', 'student_id', 'batch_id'
    ];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function batch()
    {
        return $this->belongsTo('App\Batch');
    }
}
