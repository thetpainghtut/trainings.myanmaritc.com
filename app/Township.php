<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Township extends Model
{  
    use SoftDeletes;

    protected $fillable = [
        'name','city_id','user_id'
    ];

    public function inquires()
    {
    	return $this->hasMany('App\Inquire');
    }

    public function city()
    {
    	return $this->belongsTo('App\City');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function student()
    {
        return $this->hasOne('App\Student');
    }
}
