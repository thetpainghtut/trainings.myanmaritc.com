<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Topic extends Model
{
  	use SoftDeletes;

    protected $fillable = [
        'name', 'status', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
