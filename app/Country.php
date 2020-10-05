<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'iso', 'name', 'nicename','iso3', 'numcode', 'phonecode', 'user_id'
    ];

    public function cities()
    {
    	return $this->hasMany('App\City');
    }
}
