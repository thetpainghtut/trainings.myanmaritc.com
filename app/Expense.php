<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'type','amount','description','date','attachment', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
