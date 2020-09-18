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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function batches()
  	{
    	return $this->hasMany('App\Batch');
  	}

    public function incomes()
    {
        return $this->hasMany('App\Income');
    }
}
