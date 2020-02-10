<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    //
    protected $fillable = [
        'amount','description','date','location_id', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function location()
    {
        return $this->belongsTo('App\Location','location_id');
    }
}
