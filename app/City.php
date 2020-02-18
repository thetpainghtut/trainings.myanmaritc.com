<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable = [
        'name','zipcode','user_id'
    ];

    public function locations()
    {
    	return $this->hasMany('App\Location');
    }

}
