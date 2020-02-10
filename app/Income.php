<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    //
    protected $fillable = [
        'amount','description','date','location_id', 'user_id'
    ];
}
