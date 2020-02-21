<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    //
    protected $fillable = [
        'name','city_id','user_id'
    ];

    public function inquires()
    {
    	return $this->hasMany('App\Inquire');
    }
}
