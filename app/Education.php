<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
     protected $fillable = [
        'name','user_id'
    ];

    public function inquires()
    {
    	return $this->hasMany('App\Inquire');
    }
}
