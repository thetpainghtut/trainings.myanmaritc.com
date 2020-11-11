<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $fillable = [
        'amount', 'type', 'symbol', 'paiddate', 'inquire_id', 'user_id'
    ];

    public function inquire()
    {
        return $this->belongsTo('App\Inquire');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
