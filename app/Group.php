<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  protected $fillable = ['name','batch_id'];

  public function students()
  {
    return $this->belongsToMany('App\Student')->withTimestamps();
  }

  
}
