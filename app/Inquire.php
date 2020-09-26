<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Inquire extends Model
{
    //
  use SoftDeletes;

    protected $fillable = [
        'inquireno', 'receiveno', 'name', 'gender', 'phone', 'installmentdate', 'installmentamount','status', 'knowledge',  'camp', 'acceptedyear', 'message', 'batch_id', 'education_id', 'user_id'
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
