<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Inquire extends Model
{
    //
  use SoftDeletes;

     protected $fillable = [
        'inquireno', 'receiveno', 'name', 'gender', 'phone', 'installmentdate', 'installmentamount','status', 'knowledge',  'camp', 'education_id', 'acceptedyear', 'batch_id', 'township_id', 'user_id'
    ];

  public function batch()
  {
    return $this->belongsTo('App\Batch');
  }

  public function education()
  {
    return $this->belongsTo('App\Education');
  }

  public function township()
  {
    return $this->belongsTo('App\Township');
  }
}
