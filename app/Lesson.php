<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title','file', 'duration', 'subject_id', 'user_id'
    ];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
<<<<<<< HEAD
=======

    public function students()
    {
        return $this->belongsToMany('App\Student')->withTimestamps();
    }
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
}
