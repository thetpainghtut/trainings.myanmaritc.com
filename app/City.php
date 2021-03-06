<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name', 'mmr_name', 'zipcode', 'country_id', 'user_id'
    ];

    public function locations()
    {
    	return $this->hasMany('App\Location');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function townships()
    {
        return $this->hasMany('App\Township');
    }

}
