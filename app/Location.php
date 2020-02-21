<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = [
        'name','city_id','user_id'
    ];

    public function city()
    {
    	return $this->belongsTo('App\City');
    }

    public function courses()
  	{
    	return $this->hasMany('App\Course');
  	}
}
