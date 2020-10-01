<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Inquire extends Model
{
    //
  use SoftDeletes;

    protected $fillable = [
<<<<<<< HEAD
        'inquireno', 'receiveno', 'name', 'gender', 'phone', 'installmentdate', 'installmentamount','status', 'knowledge',  'camp', 'acceptedyear', 'batch_id', 'education_id', 'user_id'
=======
        'inquireno', 'receiveno', 'name', 'gender', 'phone', 'installmentdate', 'installmentamount','status', 'knowledge',  'camp', 'acceptedyear', 'message', 'batch_id', 'education_id', 'user_id'
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
    ];

    public function batch()
    {
        return $this->belongsTo('App\Batch');
    }

    public function education()
    {
        return $this->belongsTo('App\Education');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function student()
    {
        return $this->hasOne('App\Student', 'inquire_no');
    }
}
