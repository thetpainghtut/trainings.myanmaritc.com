<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
  protected $fillable = [
    'description',
  ];

  public function students()
  {
    return $this->belongsToMany('App\Student')
      ->withTimestamps();
  }
}
